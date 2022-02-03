<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        $request['id'] = collect(request()->segments())->last();
        return [
            'name'=>['required','max:255',Rule::unique('products','name')->where(function ($query) use ($request) {
                return $query->where('id','!=',$request->id);
            })],
            'detail'=>'required',
            'price'=>'required|max:10',
            'stock'=>'required|max:6',
            'discount'=>'required|max:2'
        ];
    }
}
