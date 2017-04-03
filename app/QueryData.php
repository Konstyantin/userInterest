<?php
/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 03.04.17
 * Time: 0:48
 */

namespace App;

use App\QueryBuilder;

/**
 * Class QueryData
 * Component which use for get form data for build sql query to database
 * @package App
 */
class QueryData
{
    /**
     * @var FormData data which was send form
     */
    private $formData;

    /**
     * @var \App\QueryBuilder object use to build sql query to database
     */
    private $builder;

    /**
     * QueryData constructor.
     * @param FormData $formData
     */
    public function __construct(FormData $formData)
    {
        $this->formData = $formData;
        $this->builder = new QueryBuilder();
    }

    /**
     * Check send first name value
     */
    protected function checkSendFirstName()
    {
        // get first name from form if data is sent
        $firstName = $this->formData->getData('first-name');

        // if data is send
        if ($firstName) {
            // add sent data in build sql query
            $this->builder->getFirstName($firstName);
        }
    }

    /**
     * Check send last name value
     */
    protected function checkSendLastName()
    {
        // get first name from form if data is sent
        $lastName = $this->formData->getData('last-name');

        // if data is send
        if ($lastName) {
            // add sent data in build sql query
            $this->builder->getLastName($lastName);
        }
    }

    /**
     * Check send email value
     */
    protected function checkSendEmail()
    {
        // get email field from form if data is sent
        $email = $this->formData->getData('email');

        // if data is send
        if ($email) {
            // add sent data in build sql query
            $this->builder->getEmail($email);
        }
    }

    /**
     * Check send age value
     */
    protected function checkSendAge()
    {
        // get age field from form if data is sent
        $age = $this->formData->getAgeData();

        // if data is send
        if ($age) {
            // add sent data in build sql query
            $this->builder->getAge($age);
        }
    }

    /**
     * Check send created data value
     */
    protected function checkSendCreated()
    {
        // get email from form if data is sent
        $created = $this->formData->getCreatedData();

        // if data is send
        if ($created) {
            // add sent data in build sql query
            $this->builder->getCreated($created);
        }
    }

    /**
     * Check send interest data value
     */
    protected function checkSendInterest()
    {
        // if interest data form form is sent
        if ($this->formData->getInterestData()) {

            // add sent data in build sql query
            $this->builder->getInterest($this->formData->getInterest());
        }
    }

    /**
     * Get query data
     *
     * @return string
     */
    public function getQueryData()
    {
        $this->checkSendFirstName();        // check send first name field
        $this->checkSendLastName();         // check send last name field
        $this->checkSendEmail();            // check send email field
        $this->checkSendAge();              // check send age field
        $this->checkSendCreated();          // check send created field
        $this->checkSendInterest();         // check send interest field
        $this->builder->checkGroup();       // check use GROUP in query add GROUP if sql query do not have GROUP
        return $this->builder->getQuery();  // get result building sql query
    }
}