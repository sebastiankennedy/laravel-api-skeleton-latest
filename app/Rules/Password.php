<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Class Password
 *
 * @package App\Rules
 */
class Password implements Rule
{
    /**
     * @var
     */
    private $minLength;
    /**
     * @var
     */
    private $maxLength;
    /**
     * @var
     */
    private $min_complexity;

    /**
     * Password constructor.
     *
     * @param  int  $minLength
     * @param  int  $maxLength
     */
    public function __construct($minLength = 8, $maxLength = 24, $min_complexity = 2)
    {
        $this->minLength = $minLength;
        $this->maxLength = $maxLength;
        $this->min_complexity = $min_complexity;
    }

    /**
     * @param  string  $attribute
     * @param  mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (strlen($value) < $this->minLength || strlen($value > $this->maxLength)) {
            return false;
        }

        $password_score = 0;
        preg_match('/[0-9]+/', $value) === 1 && $password_score++;
        preg_match('/[a-z]+/', $value) === 1 && $password_score++;
        preg_match('/[A-Z]+/', $value) === 1 && $password_score++;
        preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $value) === 1 && $password_score++;

        return $password_score >= $this->min_complexity;
    }

    /**
     * @return array|string
     */
    public function message()
    {
        return '请输入 8-24 位的密码，包含以下 2 种组合：数字、小写字母、大写字母、标点符号';
    }
}
