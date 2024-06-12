<?php

namespace App\Http\Requests\Referral;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'agency_id' => 'required|integer',
            'package_id' => 'required|integer',
            'employer' => 'required|string|max:255',
            'agency_address' => 'required|string|max:255',
            'country_destination' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'birthplace' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'age' => 'required|integer',
            'civil_status' => 'nullable|string|max:50',
            'nationality' => 'nullable|string|max:100',
            'gender' => 'nullable|string|max:10',
            'position_applied' => 'required|string|max:255',
            'vessel' => 'nullable|string|max:255',
            'principal' => 'nullable|string|max:255',
            'passport' => 'required|string|max:50',
            'ssrb' => 'required|string|max:50',
            'passport_expdate' => 'required|date',
            'ssrb_expdate' => 'required|date',
            'payment_type' => 'required|string|max:50',
            'employment_type' => 'required|string|max:50',
            'admission_type' => 'required|string|max:50',
            'custom_request' => 'nullable|string|max:255',
            'requestor' => 'required|string|max:255',
            'certificate' => 'nullable|array',
            'certificate.*' => 'string|max:255',
            'skuld_qty' => 'nullable|integer',
            'woe_qty' => 'nullable|integer',
            'cayman_qty' => 'nullable|integer',
            'liberian_qty' => 'nullable|integer',
            'croatian_qty' => 'nullable|integer',
            'danish_qty' => 'nullable|integer',
            'diamlemos_qty' => 'nullable|integer',
            'marshall_qty' => 'nullable|integer',
            'malta_qty' => 'nullable|integer',
            'dominican_qty' => 'nullable|integer',
            'bahamas_qty' => 'nullable|integer',
            'bermuda_qty' => 'nullable|integer',
            'mlc_qty' => 'nullable|integer',
            'mer_qty' => 'nullable|integer',
            'bahia_qty' => 'nullable|integer',
            'panama_qty' => 'nullable|integer',
            'signature' => 'required|string',
            'email_employee' => 'required|email|max:255',
            'schedule_date' => 'required|date',
        ];
    }
}
