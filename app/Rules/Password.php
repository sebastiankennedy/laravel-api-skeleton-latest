<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Class Password.
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
     * @param int $minLength
     * @param int $maxLength
     * @param int $min_complexity
     */
    public function __construct($minLength = 8, $maxLength = 24, $min_complexity = 2)
    {
        $this->minLength = $minLength;
        $this->maxLength = $maxLength;
        $this->min_complexity = $min_complexity;
    }

    /**
     * @param string $attribute
     * @param mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (mb_strlen($value) < $this->minLength || mb_strlen($value > $this->maxLength)) {
            return false;
        }

        $password_score = 0;
        1 === preg_match('/[0-9]+/', $value) && $password_score++;
        1 === preg_match('/[a-z]+/', $value) && $password_score++;
        1 === preg_match('/[A-Z]+/', $value) && $password_score++;
        1 === preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $value) && $password_score++;

        return $password_score >= $this->min_complexity;
    }

    /**
     * @return array|string
     */
    public function message()
    {
        return sprintf('请输入 %d-%d 位的密码，包含以下 2 种组合：数字、小写字母、大写字母、标点符号', $this->minLength, $this->maxLength);
    }
}
