<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_company extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->paging->is_session_set();
    }

    public function index()
    {
        $form = $this->paging->get_form_name_id();
        if($this->M_groupusers->is_permitted($_SESSION['userdata']['M_Groupuser_Id'],$form['m_company'],'Read'))
        {
            $model;
            $params = array(
                'order' => array('Created' => 'ASC')
            );
            $datapages = $this->M_companies->get_list(null, null, $params);
            if($datapages)
                $model = $datapages[0];
            else 
                $model = $this->M_companies->new_object();

            $data =  $this->paging->set_data_page_add($model);
            load_view('m_company/add', $data);
        }
        else
        {   
            $this->load->view('forbidden/forbidden');
        }
    }
    
    function add()
    {
        $form = $this->paging->get_form_name_id();
        if($this->M_groupusers->is_permitted($_SESSION['userdata']['M_Groupuser_Id'],$form['m_company'],'Write'))
        {
            $model = $this->M_companies->new_object();
            $data =  $this->paging->set_data_page_add($model);
            load_view('m_company/add', $data);  
        }
        else
        {
            $this->load->view('forbidden/forbidden');
        }
    }

    public function addsave()
    {   
        $model;
        $id = $this->input->post('companyid');
        $name = $this->input->post('named');
        $address = $this->input->post('address');
        $postcode = $this->input->post('postcode');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $fax = $this->input->post('fax');
        
        if($id)
            $model = $this->M_companies->get($id);
        else 
            $model = $this->M_companies->new_object();

        $model->CompanyName = setisnull($name);
        $model->Address = setisnull($address);
        $model->PostCode = setisnull($postcode);
        $model->Email = setisnull($email);
        $model->Phone = setisnull($phone);
        $model->Fax = setisnull($fax);
        $model->CreatedBy = $_SESSION['userdata']['Username'];
        //print_r($model);
        $validate = $this->M_companies->validate($model);
 
        if($validate)
        {
            $this->session->set_flashdata('add_warning_msg',$validate);
            $data =  $this->paging->set_data_page_add($model);
            load_view('m_company/add', $data);   
        }
        else{
    
            $model->save();
            $successmsg = $this->paging->get_success_message();
            $this->session->set_flashdata('success_msg', $successmsg);
            redirect('mcompany');
        }
    }

    
    
}