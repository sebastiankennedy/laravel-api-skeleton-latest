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
    private $minComplexity;

    /**
     * Password constructor.
     *
     * @param int $minLength
     * @param int $maxLength
     * @param int $minComplexity
     */
    public function __construct($minLength = 8, $maxLength = 24, $minComplexity = 2)
    {
        $this->minLength = $minLength;
        $this->maxLength = $maxLength;
        $this->minComplexity = $minComplexity;
    }

    /**
     * @param string $attribute
     * @param mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($this->minLength >= $this->maxLength) {
            return false;
        }

        if (mb_strlen($value) < $this->minLength || mb_strlen($value > $this->maxLength)) {
            return false;
        }

        $passwordScore = 0;
        1 === preg_match('/[0-9]+/', $value) && $passwordScore++;
        1 === preg_match('/[a-z]+/', $value) && $passwordScore++;
        1 === preg_match('/[A-Z]+/', $value) && $passwordScore++;
        1 === preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $value) && $passwordScore++;

        return $passwordScore >= $this->minComplexity;
    }

    /**
     * @return array|string
     */
    public function message()
    {
        return sprintf('请输入 %d-%d 位的密码，包含以下 2 种组合：数字、小写字母、大写字母、标点符号', $this->minLength, $this->maxLength);
    }
}
