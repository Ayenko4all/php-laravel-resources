<?php

namespace DMO\SavingsBond\Requests\API;

use DMO\SavingsBond\Models\Offer;

use Hasob\FoundationCore\Requests\AppBaseFormRequest;


class UpdateOfferAPIRequest extends AppBaseFormRequest
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
        /*
        
        */
        return [
            'organization_id' => 'required',
        'display_ordinal' => 'nullable|min:0|max:365',
        'wf_status' => 'max:100',
        'wf_meta_data' => 'max:1000',
        'offer_title' => 'required|email',
        'price_per_unit' => 'required|min:0|max:100000000',
        'max_units_per_investor' => 'required|min:1|max:1000000000',
        'interest_rate_pct' => 'required|min:0|max:100',
        'offer_start_date' => 'required',
        'offer_end_date' => 'required',
        'offer_settlement_date' => 'required',
        'offer_maturity_date' => 'required'
        ];
    }

    /**
    * @OA\Property(
    *     title="organization_id",
    *     description="organization_id",
    *     type="string"
    * )
    */
    public $organization_id;

    /**
    * @OA\Property(
    *     title="display_ordinal",
    *     description="display_ordinal",
    *     type="integer"
    * )
    */
    public $display_ordinal;

    /**
    * @OA\Property(
    *     title="status",
    *     description="status",
    *     type="string"
    * )
    */
    public $status;

    /**
    * @OA\Property(
    *     title="wf_status",
    *     description="wf_status",
    *     type="string"
    * )
    */
    public $wf_status;

    /**
    * @OA\Property(
    *     title="wf_meta_data",
    *     description="wf_meta_data",
    *     type="string"
    * )
    */
    public $wf_meta_data;

    /**
    * @OA\Property(
    *     title="offer_title",
    *     description="offer_title",
    *     type="string"
    * )
    */
    public $offer_title;

    /**
    * @OA\Property(
    *     title="price_per_unit",
    *     description="price_per_unit",
    *     type="number"
    * )
    */
    public $price_per_unit;

    /**
    * @OA\Property(
    *     title="max_units_per_investor",
    *     description="max_units_per_investor",
    *     type="integer"
    * )
    */
    public $max_units_per_investor;

    /**
    * @OA\Property(
    *     title="interest_rate_pct",
    *     description="interest_rate_pct",
    *     type="number"
    * )
    */
    public $interest_rate_pct;

    /**
    * @OA\Property(
    *     title="offer_start_date",
    *     description="offer_start_date",
    *     type="string"
    * )
    */
    public $offer_start_date;

    /**
    * @OA\Property(
    *     title="offer_end_date",
    *     description="offer_end_date",
    *     type="string"
    * )
    */
    public $offer_end_date;

    /**
    * @OA\Property(
    *     title="offer_settlement_date",
    *     description="offer_settlement_date",
    *     type="string"
    * )
    */
    public $offer_settlement_date;

    /**
    * @OA\Property(
    *     title="offer_maturity_date",
    *     description="offer_maturity_date",
    *     type="string"
    * )
    */
    public $offer_maturity_date;

    /**
    * @OA\Property(
    *     title="tenor_years",
    *     description="tenor_years",
    *     type="integer"
    * )
    */
    public $tenor_years;


}
