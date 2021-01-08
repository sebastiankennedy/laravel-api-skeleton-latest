<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Class UnifiedSocialCreditCode.
 */
class UnifiedSocialCreditCode implements Rule
{
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
        /*
         * 统一社会信用代码为18位，统一社会信用代码由十八位的数字或大写英文字母（不适用 I、O、Z、S、V ）组成，由五个部分组成：
         * 第一部分（第 1 位）为登记管理部门代码，9 表示工商部门；（数字或大写英文字母）
         * 第二部分（第 2 位）为机构类别代码；（数字或大写英文字母）
         * 第三部分（第 3-8 位）为登记管理机关行政区划码；（数字）
         * 第四部分（第 9-17 位）为全国组织机构代码；（数字或大写英文字母）
         * 第五部分（第 18 位）为校验码（数字或大写英文字母）
         * */
        return preg_match('/^([0-9A-HJ-NPQRTUWXY]{2}\d{6}[0-9A-HJ-NPQRTUWXY]{10}|[1-9]\d{14})$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '请输入正确的统一社会信用代码。';
    }
}
