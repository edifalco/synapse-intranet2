<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMediaRequest extends FormRequest
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
    public function rules()
    {
        return [
            
            'model_id' => 'max:2147483647|nullable|numeric',
            'size' => 'max:2147483647|nullable|numeric',
            'order_column' => 'max:2147483647|nullable|numeric',
        ];
    }
}
