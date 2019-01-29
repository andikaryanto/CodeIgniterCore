<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function submission_upload_config($filename = null){
    $config['upload_path']          = './uploads/submission_files/';
    $config['allowed_types']        = 'jpg|png|pdf|doc|docx';
    $config['max_size']             = 1000;
    $config['max_width']            = 10240;
    $config['max_height']           = 7680;
    $config['file_name']            = $filename;
    return $config;
}

function userprofile_upload_config($filename = null){
    $config['upload_path']          = './assets/user_profile/';
    $config['allowed_types']        = 'jpg|png';
    $config['max_size']             = 1000;
    $config['max_width']            = 10240;
    $config['max_height']           = 7680;
    $config['file_name']            = $filename;
    return $config;
}