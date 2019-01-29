<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_formsettings_model extends MY_Model {

    private $Form;
    public function __construct(){
        parent::__construct();
        
        $this->Form = $this->paging->get_form_name_id();
    }

    public function validate($model, $oldmodel = null){
        //validate goes here
    }


    //MEMBER AREA
    public function get_form_member_numbering_format(){
        $forms = $this->M_forms->get_data_by_formname($this->Form['m_member']);
        $params = array(
            'where' => array(
                'M_Form_Id' => $forms->Id,
                'Name' => 'NUMBERING_FORMAT'
            )
        );

        return $this->get_list(null, null, $params)[0];
    }

    //SUBMISSION  AREA
    public function get_form_submission_numbering_format(){
        $forms = $this->M_forms->get_data_by_formname($this->Form['t_submission']);
        $params = array(
            'where' => array(
                'M_Form_Id' => $forms->Id,
                'Name' => 'NUMBERING_FORMAT'
            )
        );

        return $this->get_list(null, null, $params)[0];
    }

    //SUBMISSION PAYMENT AREA
    public function get_form_submissionpayment_numbering_format(){
        $forms = $this->M_forms->get_data_by_formname($this->Form['t_submissionpayment']);
        $params = array(
            'where' => array(
                'M_Form_Id' => $forms->Id,
                'Name' => 'NUMBERING_FORMAT'
            )
        );

        return $this->get_list(null, null, $params)[0];
    }

    public function get_form_submissionpayment_account(){
        $forms = $this->M_forms->get_data_by_formname($this->Form['t_submissionpayment']);
        $params = array(
            'where' => array(
                'M_Form_Id' => $forms->Id,
                'Name' => 'SUBMISSION_PAYMENT_ACCOUNT_CODE'
            )
        );

        return $this->get_list(null, null, $params)[0];
    }

    public function get_form_submissionpayment_one_month_only(){
        $forms = $this->M_forms->get_data_by_formname($this->Form['t_submissionpayment']);
        $params = array(
            'where' => array(
                'M_Form_Id' => $forms->Id,
                'Name' => 'SUBMISSION_PAYMENT_ONE_MONTH_ONLY'
            )
        );

        return $this->get_list(null, null, $params)[0];
    }

    

    public function get_form_submissionpayment_standalone_fine_payment(){
        $forms = $this->M_forms->get_data_by_formname($this->Form['t_submissionpayment']);
        $params = array(
            'where' => array(
                'M_Form_Id' => $forms->Id,
                'Name' => 'SUBMISSION_PAYMENT_STANDALONE_FINE_PAYMENT'
            )
        );

        return $this->get_list(null, null, $params)[0];
    }


    /** END*/
    public function get_formsetting_by_id($id){
        $params = array(
            'where' => array(
                'M_Form_Id' => $id
            )
        );

        return $this->get_list(null, null, $params);
    }
}

class M_formsetting_object extends Model_object {
   
}