<?php
/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 02.04.17
 * Time: 8:08
 */

namespace App;

use App\FormConst;

/**
 * Class FormData
 * Component for work with form data
 * @package App
 */
class FormData
{
    /**
     * @var array $data send form data
     */
    public $data;

    /**
     * @var array $interest interest user data
     */
    private $interest;

    /**
     * @var array $created created user data
     */
    private $created;

    /**
     * @var array $age age user data
     */
    private $age;

    /**
     * FormData constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get user by interest
     *
     * @return array
     */
    public function getInterestData()
    {
        foreach ($this->data as $key => $value) {
            if ($this->checkIndexData($key, 'interest')) {
                $this->interest[] = $value;
            }
        }

        return $this->interest;
    }

    /**
     * Get user by created date
     *
     * @return array
     */
    public function getCreatedData()
    {
        foreach ($this->data as $key => $value) {
            if ($this->checkIndexData($key, 'created')) {
                $this->created[$key] = $value;
            }
        }

        // call valid values
        if ($this->created) {
            $this->validCreatedData();
        }

        return $this->created;
    }

    /**
     * Get user by age
     *
     * @return array
     */
    public function getAgeData()
    {
        foreach ($this->data as $key => $value) {
            if ($this->checkIndexData($key, 'age')) {
                $this->age[$key] = $value;
            }
        }

        // call valid values
        if ($this->age) {
            $this->validAgeData();
        }

        return $this->age;
    }

    /**
     * Check data by index
     *
     * @param string $key
     * @param string $index
     * @return bool|int
     */
    public function checkIndexData(string $key, string $index)
    {
        return strpos($key, $index);
    }


    /**
     * Check validate age data
     *
     */
    public function validAgeData()
    {
        $this->age['min-age'] = $this->age['min-age'] ?? FormConst::MIN_AGE;
        $this->age['max-age'] = $this->age['max-age'] ?? FormConst::MAX_AGE;

        $this->checkValidMinAge();
        $this->checkValidMaxAge();
    }

    /**
     * Check valid Min Age value
     *
     * @return bool|int
     */
    public function checkValidMinAge()
    {
        if ($this->age['min-age'] < FormConst::MIN_AGE) {
            return $this->age['min-age'] = FormConst::MIN_AGE;
        }

        return true;
    }

    /**
     * Check valid Max Age value
     *
     * @return bool|int
     */
    public function checkValidMaxAge()
    {
        if ($this->age['max-age'] > FormConst::MAX_AGE) {
            return $this->age['max-age'] = FormConst::MAX_AGE;
        }

        return true;
    }

    /**
     * Check valid create date values
     */
    public function validCreatedData()
    {
        $this->created['min-created'] = $this->created['min-created'] ?? FormConst::MIN_DATE;
        $this->created['max-created'] = $this->created['max-created'] ?? FormConst::MAX_DATE;

        $this->checkValidMinCreated();
        $this->checkValidMaxCreated();
    }

    /**
     * Check valid min created date value
     *
     * @return int
     */
    public function checkValidMinCreated()
    {
        if ($this->created['min-created'] < FormConst::MIN_DATE) {
            return $this->created['min-created'] = FormConst::MIN_DATE;
        }
    }

    /**
     * Check valid max created date value
     *
     * @return int
     */
    public function checkValidMaxCreated()
    {
        if ($this->created['max-created'] > FormConst::MAX_DATE) {
            return $this->created['max-created'] = FormConst::MAX_DATE;
        }
    }
}