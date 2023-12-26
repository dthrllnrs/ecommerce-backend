<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Traits\ResponseTrait;

class GetProductsController extends Controller
{
    use ResponseTrait;

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        try {
            $products = Product::all();
            return $this->successResponse('All products', $products, 200);
        } catch (\Throwable $th) {
            return $this->failureResponse($th->getMessage(), [], 500);
        }
    }
}
