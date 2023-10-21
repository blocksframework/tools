<?php

namespace Blocks\Tools;

class Randomness {

    const NUMERIC = '0123456789';
    const ALPHANUMERIC = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    const ALPHANUMERIC_WITHOUT_SIMILARLY_LOOKING_CHARACTERS = 'ABCDEFGHJKLMNPQRTUVWXY346789';
    const ALPHANUMERIC_SPECIAL_CHARACTERS = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789~!@#$%^&*()_-+={}[]\|:;,./';

    static function generateString($length, $custom_chars = false) {
        if ($custom_chars) {
            $chars = $custom_chars;
        } else {
            $chars = Randomness::ALPHANUMERIC_SPECIAL_CHARACTERS;
        }

        $string = '';

        $clen = mb_strlen($chars) - 1;

        for ($i = 0; $i < $length; $i++) {
            $string .= $chars[ random_int(0, $clen) ];
        }

        return $string;
    }

    static function generateToken($length) {
        if ( $length%2 ) {
            $adjusted_length = $length+1;
        } else {
            $adjusted_length = $length;
        }

        $half_length = $adjusted_length/2;

        $token = bin2hex( random_bytes($half_length) );

        $token = mb_substr($token, 0, $length);

        return $token;
    }

}

