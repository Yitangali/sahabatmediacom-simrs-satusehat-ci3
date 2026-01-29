<?php defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('loadJsonPayload')) {
    function loadJsonPayload($path) {
        if(!file_exists($path)) {
            throw new SatusehatException(
                'Payload JSON tidak ditemukan',
                ['path' => $path]
            );
        }

        $json = file_get_contents($path);

        if($json === false) {
            throw new SatusehatException(
                'Gagal membaca file JSON',
                ['path' => $path]
            );
        }

        $data = json_decode($json, true);

        if(json_last_error() !== JSON_ERROR_NONE) {
            throw new SatusehatException(
                'JSON tidak valid',
                [
                    'error' => json_last_error_msg(),
                    'path'  => $path
                ]
            );
        }

        return $data;
    }

    return null;
}
