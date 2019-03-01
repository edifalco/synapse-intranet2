<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoicesRequest extends FormRequest
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
            'invoice_subtotal' => 'numeric',
            'invoice_taxes' => 'numeric',
            'invoice_total' => 'numeric',
            'budget_subtotal' => 'numeric',
            'budget_taxes' => 'numeric',
            'budget_total' => 'numeric',
            'date' => 'nullable|date_format:'.config('app.date_format'),
            'due_date' => 'nullable|date_format:'.config('app.date_format'),
            'pm_approval_date' => 'nullable|date_format:H:i:s',
            'finance_approval_date' => 'nullable|date_format:H:i:s',
        ];
    }
}
