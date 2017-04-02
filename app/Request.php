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
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
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
     * Set unix format for date
     */
    public function setUnixFormat()
    {
        $_POST['min-created'] = $this->convertToUnix($_POST['min-created']);
        $_POST['max-created'] = $this->convertToUnix($_POST['max-created']);
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
}