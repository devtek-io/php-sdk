<?php

namespace devtek\sdk\models;

/**
 * Lead model
 *
 * @property-read integer $id Devtek lead ID
 * @property string|null $last_name Last name
 * @property string|null $first_name First name
 * @property string|null $middle_name Middle name
 * @property string|null $birthday Birthday
 * @property string $phone Phone
 * @property string|null $email Email
 * @property string|null $region Actual region
 * @property string|null $city Actual city
 * @property integer|null $region_id Actual region ID
 * @property integer|null $city_id Actual city ID
 * @property integer|null $amount Amount
 * @property integer|null $credit_history Credit history
 * @property string|null $sub_id1 Sub 1
 * @property string|null $sub_id2 Sub 2
 * @property string|null $sub_id3 Sub 3
 * @property string|null $sub_id4 Sub 4
 * @property string|null $sub_id5 Sub 5
 * @property string|null $passport_series Passport series
 * @property string|null $passport_number Passport number
 * @property string|null $passport_issued_date Passport issue date
 * @property string|null $passport_issued Name of organization that issued passport
 * @property string|null $passport_issued_code Passport issue code
 * @property string|null $registration_region Registration region
 * @property string|null $registration_city Registration city
 * @property string|null $registration_index Registration zip
 * @property string|null $registration_street Registration street
 * @property string|null $registration_street_kladr Registration street KLADR code
 * @property string|null $registration_city_kladr Registration city KLADR code
 * @property string|null $registration_region_kladr Registration region KLADR code
 * @property string|null $registration_house Registration house
 * @property string|null $registration_house_kladr Registration house KLADR code
 * @property string|null $registration_housing Registration housing
 * @property string|null $registration_housing_kladr Registration housing KLADR code
 * @property string|null $registration_apartment Registration apartment
 * @property integer|null $deposit Deposit
 * @version 1.0.0
 */
class Lead extends Base
{
    /**
     * Keyword that will be used to store short form data
     */
    protected const SHORT_KEYWORD = 'main';

    /**
     * Short form fields list
     */
    protected const SHORT_FIELDS = [
        'id',
        'last_name',
        'first_name',
        'middle_name',
        'birthday',
        'phone',
        'email',
        'registration_region',
        'registration_city',
        'amount',
        'credit_history',
        'sub_id1',
        'sub_id2',
        'sub_id3',
        'sub_id4',
        'sub_id5'
    ];

    /**
     * Keyword that will be used to store detailed form data
     */
    protected const DETAILED_KEYWORD = 'detailed';

    /**
     * Detailed form fields list
     */
    protected const DETAILED_FIELDS = [
        'passport_series',
        'passport_number',
        'passport_issued_date',
        'passport_issued',
        'passport_issued_code',
        'registration_region',
        'registration_city',
        'registration_index',
        'registration_street',
        'registration_street_kladr',
        'registration_city_kladr',
        'registration_region_kladr',
        'registration_house',
        'registration_house_kladr',
        'registration_housing',
        'registration_housing_kladr',
        'registration_apartment',
        'deposit'
    ];

    /**
     * Keyword that will be used to store job form data
     */
    protected const JOB_KEYWORD = 'job';

    /**
     * Job form fields list
     */
    protected const JOB_FIELDS = [];

    /**
     * Returns lead data
     *
     * @return array
     */
    public function data(): array
    {
        $data = [];

        foreach ($this->fields as $name => $value) {
            $keyword = static::SHORT_KEYWORD;
            if (in_array($name, static::DETAILED_FIELDS)) {
                $keyword = static::DETAILED_KEYWORD;
            } else if (in_array($name, static::JOB_FIELDS)) {
                $keyword = static::JOB_KEYWORD;
            }

            if (in_array($name, ['region', 'region_id'])) {
                $name = 'registration_region';
            } else if (in_array($name, ['city', 'city_id'])) {
                $name = 'registration_city';
            }

            if (!isset($data[$keyword])) {
                $data[$keyword] = [];
            }
            $data[$keyword][$name] = $value;
        }
        return $data;
    }
}
