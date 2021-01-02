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
     * @param  string  $attribute
     * @param  mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (strlen($value) < 8 || $value > 24) {
            return false;
        }

        $password_score = 0;
        $min_complexity = 2;
        preg_match('/[0-9]+/', $value) === 1 && $password_score++;
        preg_match('/[a-z]+/', $value) === 1 && $password_score++;
        preg_match('/[A-Z]+/', $value) === 1 && $password_score++;
        preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $value) === 1 && $password_score++;

        return $password_score >= $min_complexity;
    }

    /**
     * @return array|string
     */
    public function message()
    {
        return '请输入 8-24 位的密码，包含以下 2 种组合：数字、小写字母、大写字母、标点符号';
    }
}
