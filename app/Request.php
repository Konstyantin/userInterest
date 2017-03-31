<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 30.03.2017
 * Time: 16:46
 */

namespace App;

/**
 * Class Request
 * @package App
 */
class Request
{
    /**
     * @var array $data sent data
     */
    private $data = [];

    /**
     * @var array $interest interest data
     */
    private $interest = [];

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Get interest
     *
     * @return array
     */
    public function getInterest()
    {
        return $this->interest;
    }

    /**
     * Get data which store $_POST
     *
     * @return mixed
     */
    protected function getPost()
    {
        return $_POST;
    }

    /**
     * Check data is empty
     *
     * @param mixed $data
     * @return bool
     */
    private function isEmpty($data)
    {
        return empty($data) ? true : false;
    }

    /**
     * Check is submit form
     *
     * @return bool
     */
    public function isSubmit()
    {
        return isset($_POST['submit']) ? true : false;
    }

    /**
     * Get send data form
     *
     * @return array
     */
    public function getSendData()
    {
        // get sent data
        if ($this->isSubmit()) {

            $this->setUnixFormat();

            $data = $this->getPost();

            foreach ($data as $key => $value) {
                // check retrieved data is empty
                if (!$this->isEmpty($value)) {
                    $this->data[$key] = $value; // write data in store
                }
            }
            // return array data or null
            return $this->data;
        }
    }

    /**
     * Get interest data inside sent data
     *
     * @return array
     */
    public function getInterestData()
    {
        // get sent data
        $data = $this->getSendData();

        // check data is empty
        if ($data) {
            foreach ($data as $key => $value) {

                // check sent data is store interest user
                if ($this->checkIsInterest($key)) {
                    $this->interest[$key] = $value; // set interest
                }
            }
        }
        // return array data or null
        return $this->interest;
    }

    /**
     * Set unix format for date
     */
    public function setUnixFormat()
    {
        $_POST['min-created'] = $this->convertToUnix(isset($_POST['min-created']));
        $_POST['max-created'] = $this->convertToUnix(isset($_POST['max-created']));
    }

    /**
     * Convert date string unix format date
     *
     * @param string $date
     * @return false|int|null
     */
    public function convertToUnix(string $date)
    {
        return strtotime($date) ?? null;
    }

    /**
     * @param string $string
     * @return bool|int
     */
    public function checkIsInterest(string $string)
    {
        return strpos($string, 'interest');
    }
}