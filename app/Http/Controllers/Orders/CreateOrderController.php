<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrderRequest;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Customer;

class CreateOrderController extends Controller
{
    use ResponseTrait;

    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateOrderRequest $request)
    {
        DB::beginTransaction();
        try {
            $validated = $request->validated();

            $products = $this->formatProducts($validated['products']);

            $order = new Order;
            $order->total = $validated['total'];
            $customer = Customer::create($validated['customer']);
            $order->customer()->associate($customer);

            $order->save();
            
            $order->products()->sync($products);
            

            $order->save();

            DB::commit();

            return $this->successResponse('Order created successfuly', $order, 201);
        } catch (\Throwable $th) {
            DB::rollback();
            return $this->failureResponse($th->getMessage(), [], 500);
        }
    }

    /**
     * Format products from request to easily sync
     * @param array $products
     * @return array
     */
    private function formatProducts($products): array
    {
        // extract ids
        $ids = array_column($products, 'id');

        // remove id from each product
        $productsWithoutIds = array_map(function ($product) {
            unset($product['id']);
            return $product;
        }, $products);

        // set id to be the new index of the products
        $result = array_combine($ids, $productsWithoutIds);

        return $result;
    }
}
