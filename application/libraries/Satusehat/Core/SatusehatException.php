<?php defined('BASEPATH') OR exit('No direct script access allowed');
class SatusehatException extends Exception {
    protected $context;

    public function __construct($message = "",  $context = [], $code = 0) {
        parent::__construct($message, $code);
        $this->context = $context;
    }

    public function getContext() {
        return $this->context;
    }
}