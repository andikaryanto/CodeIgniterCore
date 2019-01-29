<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelLoader {
    private $CI;
    function __construct()
    {
        $this->CI =& get_instance();
    }

    function Initialize() {
        $CI =& get_instance();
        $CI->load->model(array('G_colors', 'G_languages', 'G_transactionnumbers','M_accessroles','M_cities',
                            'M_enums', 'M_forms', 'M_groupusers', 'M_instances', 'M_loans', 'M_members', 'M_peoples',
                            'M_provinces', 'M_subcities', 'M_users', 'M_usersettings','M_villages', 'M_workers', 'T_submissions', 
                            'T_submissiondetails', 'M_chartofaccounts', 'T_submissionpayments', 'T_submissionpaymentdetails',
                            'M_companies', 'M_formsettings', 'R_reports','T_submissionfiles','M_userprofiles'));
    }
}