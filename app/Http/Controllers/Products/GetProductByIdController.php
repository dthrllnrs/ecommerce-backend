<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Traits\ResponseTrait;

class GetProductByIdController extends Controller
{
    use ResponseTrait;

    /**
     * Handle the incoming request.
     */
    public function __invoke(Product $product)
    {
        try {
            return $this->successResponse('Success', $product);
        } catch (\Throwable $th) {
            return $this->failureResponse($th->getMessage(), [], 500);
        }
    }
}
