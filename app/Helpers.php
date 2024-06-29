<?php
if (!function_exists('generateHashWithPrefix')) {
    function generateHashWithPrefix($prefix, $length = 32) {
        do {
            $hash = $prefix . bin2hex(random_bytes($length / 2 - strlen($prefix) / 2));
        } while (strpos($hash, $prefix) !== 0);
        return $hash;
    }
}