<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Product;

class CreateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'total' => 'required|numeric',
            'customer.firstname'=> 'required',
            'customer.lastname' => 'required',
            'customer.email' => 'required|email',
            'products' => 'required',
            'products.*.unit_price' => 'required',
            'products.*.total' => 'required|numeric',
            'products.*.quantity' => 'required|gt:0|integer',
            'products.*.id' => ['required', Rule::exists(Product::class, 'id')],
        ];
    }
}
