<?php defined('BASEPATH') OR exit('No direct script access allowed');
class SatusehatLogger {
    protected static $file = APPPATH . 'logs/satusehat.log';

    public static function info($message, $context = []) {
        self::write('INFO', $message, $context);
    }

    public static function error($message, $context = []) {
        self::write('ERROR', $message, $context);
    }

    protected static function write($level, $message, $context) {
        $log = sprintf (
            "[%s] %s: %s %s\n",
            date('Y-m-d H:i:s'),
            $level,
            $message,
            json_encode($context)
        );

        file_put_contents(self::$file, $log, FILE_APPEND);
    }
    
    
}