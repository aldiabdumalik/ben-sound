<?php

use Illuminate\Support\Facades\Config;

if (!function_exists('thisSuccess')) {
    function thisSuccess($msg, $content=null, $code=200) {
        return response()->json([
            'status' => true,
            'content' => $content,
            'message' => $msg
        ], $code);
    }
}

if (!function_exists('thisError')) {
    function thisError($msg, $content=null, $code=400) {
        return response()->json([
            'status' => false,
            'content' => $content,
            'message' => $msg
        ], $code);
    }
}

if (!function_exists('monthName')) {
    function monthName($month) {
        $mth = [
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
        ];

        return $mth[$month];
    }
}