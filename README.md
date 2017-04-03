User Interest
===============

This project is a simple example User Interest 
that you can use as the skeleton for your new User interest.

Installation
============
User Interest work with PHP 5.6 or later and MySQL 5.4 or later (please check requirements)

### From repository

Get User Interest source files from GitHub repository:
```````````````````````````````````````````````````````````
git clone https://github.com/Konstyantin/userInterest %path%
```````````````````````````````````````````````````````````

Download `composer.phar` to the project folder:
```````````````````````````````````````````````
cd %path%
curl -s https://getcomposer.org/installer | php
```````````````````````````````````````````````

Install composer dependencies with the following command:
`````````````````````````
php composer.phar install
`````````````````````````

Build database connect
======================
Create file which store database connect parameters
 
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
touch app/config/db_params.php
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

After set your params 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
return [
    'host'      => 'host name',     // localhost
    'dbname'    => 'database name', // test
    'user'      => 'root_name',     // root
    'password'  => 'root_password', // 1
];
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Routes 
======================

Path to file route:
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
app/config/routes.php
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Routes list:
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
[
    'search'        => 'user/search',       
    'register'      => 'user/register',
    'user/'         => 'user/view/$1',
    'interest/add'  => 'interest/add',
    'interest/list' => 'interest/list',
];
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Main SQL query
======================
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
SELECT user.id, user.first_name, user.last_name, user.age, user.email FROM user     # define table column 
  LEFT JOIN user_interest ON user.id=user_interest.user_id                          # join user_interest table
  LEFT JOIN interest ON interest.id=user_interest.interest_id                       # join interest table
WHERE user.first_name LIKE '%ko%'                                                   # search user first_name by specified pattern in a column '%ko%'
      AND user.last_name LIKE '%na%'                                                # search user last_name by specified pattern in a column '%na%'
      AND user.email = 'kostya@mail'                                                # search only those records that fulfill a specified condition 'kostya@mail'
      AND user.age BETWEEN 20 AND 100                                               # select record age values within a given range 20 and 100
      AND user.created_at BETWEEN 1490562000 AND 2147483647                         # select record created_at values within a given range 1490562000 and 12147483647
      AND user_interest.interest_id IN(1,6)                                         # select record by specify multiple values (1,6)
GROUP BY user.id HAVING COUNT(user_interest.interest_id) = 2                        # group by user.id with count interest equally select interest
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
