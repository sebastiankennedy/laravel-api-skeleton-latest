<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Class In.
 */
class In implements Rule
{
    /**
     * @var array
     */
    private $options = [];
    /**
     * @var string
     */
    private $message;

    /**
     * Create a new rule instance.
     *
     * @param $options
     * @param null $message
     */
    public function __construct($options, $message = null)
    {
        $this->options = $options;
        $this->message = $message;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return in_array($value, $this->options, true);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message ?: ':attribute不在允许范围之内。';
    }
}
