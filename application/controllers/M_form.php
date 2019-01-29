<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_form extends CI_Controller
{
    private $Form;
    public function __construct()
    {
        parent::__construct();
        $this->paging->is_session_set();
        $this->Form = $this->paging->get_form_name_id();
    }

    public function index()
    {
        $form = $this->paging->get_form_name_id();
        if($this->M_groupusers->is_permitted($_SESSION['userdata']['M_Groupuser_Id'],$form['m_form'],'Read'))
        {

            $membermodellist = $this->M_formsettings->get_formsetting_by_id($this->M_forms->get_data_by_formname($this->Form['m_member'])->Id);
            $submissionmodellist = $this->M_formsettings->get_formsetting_by_id($this->M_forms->get_data_by_formname($this->Form['t_submission'])->Id);
            $submissionpaymentmodellist = $this->M_formsettings->get_formsetting_by_id($this->M_forms->get_data_by_formname($this->Form['t_submissionpayment'])->Id);


            $data['membermodel'] = $membermodellist;
            $data['submissionmodel'] = $submissionmodellist;
            $data['submissionpaymentmodel'] = $submissionpaymentmodellist;
            load_view('m_form/add', $data);
        }
        else
        {   
            $this->load->view('forbidden/forbidden');
        }
    }

    public function savemember()
    {   
        
        $formatnumber = $this->input->post('formatnumber');

        $membermodel = $this->M_formsettings->get_form_member_numbering_format();
        $membermodel->StringValue = $formatnumber;
        $membermodel->save();

        $arrmemnumber = explode("/",$formatnumber);
        $sequence = "";
        for($i = 0; $i < $arrmemnumber[2] ; $i++){
            $sequence = $sequence."#";
        }

        $newnumber = $arrmemnumber[0]."/".$arrmemnumber[1]."/".$sequence;
        echo $newnumber;

        $transnumber = $this->G_transactionnumbers->get_data_by_form_id($membermodel->M_Form_Id);
        if(empty($transnumber)){
            $newtransnumber = $this->G_transactionnumbers->new_object();
            $newtransnumber->Format = $newnumber;
            $newtransnumber->Year = date("Y");
            $newtransnumber->Month = date("n");
            $newtransnumber->LastNumber = 0;
            $newtransnumber->M_Form_Id = $membermodel->M_Form_Id;
            $newtransnumber->save();
        } else {
            $transnumber[0]->Format = $newnumber;
            $transnumber[0]->save();
        }       
        
        $successmsg = $this->paging->get_success_message();
        $this->session->set_flashdata('success_msg', $successmsg);
        redirect('mainsetup');
    }  

    public function savesubmission()
    {   
        
        $formatnumber = $this->input->post('formatnumber');

        $submissionmodel = $this->M_formsettings->get_form_submission_numbering_format();
        $submissionmodel->StringValue = $formatnumber;
        $submissionmodel->save();

        $arrmemnumber = explode("/",$formatnumber);
        $sequence = "";
        for($i = 0; $i < $arrmemnumber[2] ; $i++){
            $sequence = $sequence."#";
        }

        $newnumber = $arrmemnumber[0]."/".$arrmemnumber[1]."/".$sequence;
        //echo $newnumber;

        $transnumber = $this->G_transactionnumbers->get_data_by_form_id($submissionmodel->M_Form_Id);
        //echo json_encode($transnumber);
        if(empty($transnumber)){
            $newtransnumber = $this->G_transactionnumbers->new_object();
            $newtransnumber->Format = $newnumber;
            $newtransnumber->Year = date("Y");
            $newtransnumber->Month = date("n");
            $newtransnumber->LastNumber = 0;
            $newtransnumber->M_Form_Id = $submissionmodel->M_Form_Id;
            $newtransnumber->save();
        } else {
            $transnumber[0]->Format = $newnumber;
            $transnumber[0]->save();
        }       
        
        $successmsg = $this->paging->get_success_message();
        $this->session->set_flashdata('success_msg', $successmsg);
        redirect('mainsetup');
    }  

    public function savesubmissionpayment()
    {   
        
        $formatnumber = $this->input->post('formatnumber');
        $paymentcoaid = $this->input->post('paymentcoaid');
        $paymentcoaname = $this->input->post('paymentcoaname');
        $onemonth = $this->input->post('onemonth');
        $standalonefinepayment = $this->input->post('standalonefinepayment');
       
        $submissionpaymentmodel = $this->M_formsettings->get_form_submissionpayment_numbering_format();
        $submissionpaymentmodel->StringValue = $formatnumber;
        $submissionpaymentmodel->save();

        $arrmemnumber = explode("/",$formatnumber);
        $sequence = "";
        for($i = 0; $i < $arrmemnumber[2] ; $i++){
            $sequence = $sequence."#";
        }

        $newnumber = $arrmemnumber[0]."/".$arrmemnumber[1]."/".$sequence;
        //echo $newnumber;

        $transnumber = $this->G_transactionnumbers->get_data_by_form_id($submissionmodel->M_Form_Id);
        //echo json_encode($transnumber);
        if(empty($transnumber)){
            $newtransnumber = $this->G_transactionnumbers->new_object();
            $newtransnumber->Format = $newnumber;
            $newtransnumber->Year = date("Y");
            $newtransnumber->Month = date("n");
            $newtransnumber->LastNumber = 0;
            $newtransnumber->M_Form_Id = $submissionpaymentmodel->M_Form_Id;
            $newtransnumber->save();
        } else {
            $transnumber[0]->Format = $newnumber;
            $transnumber[0]->save();
        }    
        
        $accountcode = $this->M_formsettings->get_form_submissionpayment_account();
        $accountcode->StringValue = setisnull($paymentcoaname);
        $accountcode->IntValue = setisnull($paymentcoaid);
        $accountcode->save();

        
        $monthpayment = $this->M_formsettings->get_form_submissionpayment_one_month_only();
        $monthpayment->BooleanValue = !empty($onemonth) ? 1 : 0;
        $monthpayment->save();
        
        $finepayment = $this->M_formsettings->get_form_submissionpayment_standalone_fine_payment();
        $finepayment->BooleanValue = !empty($standalonefinepayment) ? 1 : 0;
        $finepayment->save();
        
        $successmsg = $this->paging->get_success_message();
        $this->session->set_flashdata('success_msg', $successmsg);
        redirect('mainsetup');
    }  
    
}