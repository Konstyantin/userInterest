<?php
/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 02.04.17
 * Time: 11:03
 */

namespace App;

/**
 * Class QueryBuilder
 * Component for build query to database
 * @package App
 */
class QueryBuilder
{
    /**
     * @var string $query sql query to database
     */
    private $query = "SELECT user.id, user.first_name, user.last_name, user.age, user.email FROM user
                      INNER JOIN user_interest ON user.id=user_interest.user_id
                      INNER JOIN interest ON interest.id=user_interest.interest_id";

    /**
     * Get by first name
     *
     * @param string $firstName
     * @return string
     */
    public function getFirstName(string $firstName)
    {
        if ($this->checkWhere()) {
            return $this->query = $this->query . " AND first_name LIKE '%$firstName%'";
        }
        return $this->query = $this->query . " WHERE first_name LIKE '%$firstName%'";
    }

    /**
     * Get by last name
     *
     * @param string $lastName
     * @return string
     */
    public function getLastName(string $lastName)
    {
        if ($this->checkWhere()) {
            return $this->query = $this->query . " AND last_name LIKE '%$lastName%'";
        }

        return $this->query = $this->query . " WHERE last_name LIKE '%$lastName%'";
    }

    /**
     * Get by email
     *
     * @param string $email
     * @return string
     */
    public function getEmail(string $email)
    {
        if ($this->checkWhere()) {
            return $this->query = $this->query . " AND email = '$email'";
        }

        return $this->query = $this->query . " WHERE email = '$email'";
    }

    /**
     * Get by age
     *
     * @param array $age
     * @return string
     */
    public function getAge(array $age)
    {
        $min = $age['min-age'];
        $max = $age['max-age'];

        if ($this->checkWhere()) {
            return $this->query = $this->query . " AND age BETWEEN $min AND $max";
        }

        return $this->query = $this->query . " WHERE age BETWEEN $min AND $max";
    }

    /**
     * Get by created date
     *
     * @param array $age
     * @return string
     */
    public function getCreated(array $age)
    {
        $min = $age['min-created'];
        $max = $age['max-created'];

        if ($this->checkWhere()) {
            return $this->query = $this->query . " AND created_at BETWEEN $min AND $max";
        }

        return $this->query = $this->query . " WHERE created_at BETWEEN $min AND $max";
    }

    /**
     * Get by interest
     *
     * @param array $interest
     * @return string
     */
    public function getInterest(array $interest)
    {
        $interestList = implode(',', $interest);
        $countInterest = count($interest);

        if ($this->checkWhere()) {
            return $this->query = $this->query . " AND user_interest.interest_id IN($interestList) GROUP BY user.id HAVING COUNT(user_interest.interest_id) = $countInterest";
        }

        return $this->query = $this->query . " WHERE user_interest.interest_id IN($interestList) GROUP BY user.id HAVING COUNT(user_interest.interest_id) = $countInterest";
    }

    /**
     * Check use GROUP in sql query
     *
     * @return bool|string
     */
    public function checkGroup()
    {
        if (strpos($this->query, 'GROUP')) {
            return true;
        }

        return $this->query = $this->query . " GROUP BY user.id";
    }

    /**
     * Check use WHERE in query
     *
     * @return bool
     */
    public function checkWhere()
    {
        if (strpos($this->query, 'WHERE')) {
            return true;
        }
        return false;
    }

    /**
     * Return Query to database
     *
     * @return string
     */
    public function getQuery()
    {
        return $this->query;
    }
}