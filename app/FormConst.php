<?php
/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 02.04.17
 * Time: 8:00
 */

namespace App;

/**
 * Class FormConst
 *
 * Component which store max and mix age lifetime and min and max unix time
 *
 * @package App
 */
final class FormConst
{
    const MAX_AGE = 100;            // max user lifetime years
    const MIN_AGE = 0;              // min user lifetime years
    const MAX_DATE = 2147483647;    // max unix time date
    const MIN_DATE = -2147483648;   // min unix time date
}