<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once APPPATH . "third_party/PHPExcel.php";

class Reports extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        //$this->load->model(array('M_villages','M_subcities','M_groupusers')); 
        $this->paging->is_session_set();
        //$this->load->model('Export', 'export');
    }

    public function index(){
        $form = $this->paging->get_form_name_id();
        if($this->M_groupusers->is_permitted($_SESSION['userdata']['M_Groupuser_Id'],$form['r_report'],'Read'))
        {

            $datapages = $this->R_reports->get_list();
            $data['model'] = $datapages;
            load_view('report/index', $data);
        }
       else
        {   
            $this->load->view('forbidden/forbidden');
        }
    }

    public function submission_payment_view(){
        $form = $this->paging->get_report_name_id();
        if($this->M_groupusers->is_reportpermitted($_SESSION['userdata']['M_Groupuser_Id'],$form['submissionpayment'],'Read'))
        {
            load_view('report/submission_payment');
        } else {   
            $this->load->view('forbidden/forbidden');
        }
    }

    
    //end view region

    public function submission_payment_pdf(){
        $status = $this->input->post('type');
        $datefrom = get_formated_date($this->input->post('datefrom'));
        $dateto = get_formated_date($this->input->post('dateto'));

        if($status == 1) {
            $this->submission_payment_summary_pdf($datefrom, $dateto);
        } else {
            $this->submission_payment_detail_pdf($datefrom, $dateto);
        }
    }

    public function submission_payment_receipt_pdf($id){
        $CI =& get_instance();
        $mpdf = new \Mpdf\Mpdf([
            'default_font_size' => 11,
            'default_font' => 'helvetica'
        ]);
        
        $company = $this->M_companies->get_list()[0];
        $people;
        $instance;
        $submissionfrom;
        $address;
        $submissionpayment = $this->T_submissionpayments->get($id);
        $submission = $submissionpayment->get_T_Submission();
        $member = $submission->get_M_Member();
        if($member->MemberType == 1){
            $people = $member->get_M_People();
            $submissionfrom = $people->CompleteName;
            $address = $people->Address;
        }
        else {
            $instance = $member->get_M_Instance();
            $submissionfrom = $instance->Owner." / ".$instance->InstanceName;
            $address = $instance->Address;
        }

        $data['company'] = $company;
        $data['submissionfrom'] = $submissionfrom;
        $data['submissionpayment'] = $submissionpayment;
        $data['address'] = $address;

        $html = $this->load->view('reports/submission_payment_receipt',$data, true);
        $mpdf->SetHTMLHeader('
            <div style="text-align: right;">
                '.$company->CompanyName.'
            </div>');
        
        $mpdf->WriteHTML($html);
        $mpdf->Output();
                      
    }

    public function submission_payment_detail_pdf($datefrom = null, $dateto = null){

        $CI =& get_instance();
        $mpdf = new \Mpdf\Mpdf([
            'default_font_size' => 11,
            'default_font' => 'helvetica'
        ]);

        $company = $this->M_companies->get_list()[0];

        $param = array(
            'where' => array(
                'ApplyDate >=' => date(get_formated_date($datefrom, 'Y-m-d')." 00:00:00"),
                'ApplyDate <=' => date(get_formated_date($dateto, 'Y-m-d')." 23:59:59")
            )
        );

        $submissions = $this->T_submissions->get_list(null, null, $param);

        $data['company'] = $company;
        $data['submissions'] = $submissions;
        $data['datefrom'] =  get_formated_date($datefrom, 'd F Y');
        $data['dateto'] =  get_formated_date($dateto, 'd F Y');

        $html = $this->load->view('reports/submission_payment_detail',$data, true);
        $mpdf->SetHTMLHeader('
            <div style="text-align: right;">
                '.$company->CompanyName.'
            </div>');
        
        $mpdf->WriteHTML($html);
        $mpdf->Output();
                      
    }

    public function submission_payment_summary_pdf($datefrom = null, $dateto = null){

        $CI =& get_instance();
        $mpdf = new \Mpdf\Mpdf([
            'default_font_size' => 11,
            'default_font' => 'helvetica'
        ]);
        $company = $this->M_companies->get_list()[0];
        $people;
        $instance;
        $submissionfrom;
        $address;

        $param = array(
            'where' => array(
                'ApplyDate >=' => date(get_formated_date($datefrom, 'Y-m-d')." 00:00:00"),
                'ApplyDate <=' => date(get_formated_date($dateto, 'Y-m-d')." 23:59:59")
            )
        );

        $submission = $this->T_submissions->get_list(null, null, $param);

        $data['company'] = $company;
        $data['submission'] = $submission;
        $data['datefrom'] =  get_formated_date($this->input->post('datefrom'), 'd F Y');
        $data['dateto'] =  get_formated_date($this->input->post('dateto'), 'd F Y');

        $html = $this->load->view('reports/submission_payment_summary',$data, true);
        $mpdf->SetHTMLHeader('
            <div style="text-align: right;">
                '.$company->CompanyName.'
            </div>');
        
        $mpdf->WriteHTML($html);
        $mpdf->Output();
                      
    }	

}