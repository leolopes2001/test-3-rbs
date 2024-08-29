<?php

if (!function_exists('check_valid_id')) {
    function check_valid_id($id)
    {
        if (!$id || !is_numeric($id)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Invalid ID");
        }
    }
}