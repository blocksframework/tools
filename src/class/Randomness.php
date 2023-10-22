<?php

namespace Blocks\Tools;

class Randomness {
    public const NUMERIC = '0123456789';
    public const ALPHANUMERIC = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    public const ALPHANUMERIC_WITHOUT_SIMILARLY_LOOKING_CHARACTERS = 'ABCDEFGHJKLMNPQRTUVWXY346789';
    public const ALPHANUMERIC_SPECIAL_CHARACTERS = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789~!@#$%^&*()_-+={}[]\|:;,./';

    public static function generateString( $length, $custom_chars = false ) {
        if ( $custom_chars ) {
            $chars = $custom_chars;
        }
        else {
            $chars = Randomness::ALPHANUMERIC_SPECIAL_CHARACTERS;
        }

        $string = '';

        $clen = mb_strlen( $chars ) - 1;

        for ( $i = 0; $i < $length; ++$i ) {
            $string .= $chars[random_int( 0, $clen )];
        }

        return $string;
    }

    public static function generateToken( $length ) {
        if ( $length % 2 ) {
            $adjusted_length = $length + 1;
        }
        else {
            $adjusted_length = $length;
        }

        $half_length = $adjusted_length / 2;

        $token = bin2hex( random_bytes( $half_length ) );

        return mb_substr( $token, 0, $length );
    }
}
