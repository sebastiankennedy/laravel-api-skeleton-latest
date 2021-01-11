<?php

if ( ! function_exists('hash_equals')) {
    function hash_equals($a, $b)
    {
        if ( ! is_string($a) || ! is_string($b)) {
            return false;
        }

        $length = mb_strlen($a);
        if ($length !== mb_strlen($b)) {
            return false;
        }

        $status = 0;
        for ($i = 0; $i < $length; ++$i) {
            $status |= ord($a[$i]) ^ ord($b[$i]);
        }

        return 0 === $status;
    }
}
