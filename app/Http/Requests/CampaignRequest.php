<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampaignRequest extends FormRequest
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
            'name' => 'required|unique:campaigns|string|max:255',
            'startDate' => 'required|date|after:today',
            'endDate' => 'required|date|after:startDate',
            'totalBudget' => 'required|numeric',
            'dailyBudget' => 'required|numeric',
        ];
    }
}
