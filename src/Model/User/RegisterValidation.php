<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 03.04.2017
 * Time: 15:23
 */
namespace Acme\Model\User;

/**
 * Class RegisterValidation
 * Component for valid user registration
 * @package Acme\Model\User
 */
class RegisterValidation
{
    /**
     * @var array $validateData send form data
     */
    private $validateData;

    /**
     * @var array $validateFormError error validation form
     */
    private $validateFormError;

    /**
     * @var int $min min length form field data
     */
    private $min = 3;

    /**
     * @var int $max max length form field data
     */
    private $max = 45;

    /**
     * RegisterValidation constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->validateData = $data;
    }

    /**
     * Call validation all form fields
     *
     * @return array|bool
     */
    public function formValidate()
    {
        $this->checkValidFirstName();
        $this->checkValidLastName();
        $this->checkValidEmail();
        $this->checkValidAge();

        if (!$this->validateFormError) {
            return true;
        }
        return $this->validateFormError;
    }

    /**
     * Check validate form field first name
     *
     * @return bool|void
     */
    protected function checkValidFirstName()
    {
        if ($this->checkExistKey('first-name')) {
            $firstName = $this->validateData['first-name'];

            if ($this->checkDataLength($firstName)) {
                return true;
            }

            return $this->setErrorMessage('Field first name length invalid');
        }

        $this->setErrorMessage('Field first name is empty');
    }

    /**
     * Check validate form field last name
     *
     * @return bool|void
     */
    protected function checkValidLastName()
    {
        if ($this->checkExistKey('last-name')) {
            $lastName = $this->validateData['last-name'];

            if ($this->checkDataLength($lastName)) {
                return true;
            }

            return $this->setErrorMessage('Field last name length invalid');
        }

        $this->setErrorMessage('Field last name is empty');
    }

    /**
     * Check validate form field email
     *
     * @return bool|void
     */
    protected function checkValidEmail()
    {
        if ($this->checkExistKey('email')) {
            $email = $this->validateData['email'];

            if ($this->checkDataLength($email)) {
                return true;
            }

            return $this->setErrorMessage('Field email length invalid');
        }

        $this->setErrorMessage('Field email is empty');
    }

    /**
     * Check validate form field age
     *
     * @return bool|void
     */
    protected function checkValidAge()
    {
        if ($this->checkExistKey('age')) {
            $age = (int)$this->validateData['age'];

            if ($this->getLen($age) > 2 && $this->getLen($age) < 1) {
                return $this->setErrorMessage('Field age length invalid');
            }

            return true;
        }

        $this->setErrorMessage('Field first name is empty');
    }

    /**
     * Check exists data key
     *
     * @param string $key
     * @return bool
     */
    private function checkExistKey(string $key)
    {
        return isset($this->validateData[$key]) ? true : false;
    }

    /**
     * Check length data
     *
     * @param string $data
     * @return bool
     */
    protected function checkDataLength(string $data)
    {
        $length = $this->getLen($data);

        if ($length >= $this->min && $length <= $this->max) {
            return true;
        }
        return false;
    }

    /**
     * Get length data
     *
     * @param string $data
     * @return int
     */
    protected function getLen(string $data)
    {
        return strlen($data);
    }

    /**
     * Set error validate message
     *
     * @param string $message
     */
    protected function setErrorMessage(string $message)
    {
        $this->validateFormError[] = $message;
    }
}