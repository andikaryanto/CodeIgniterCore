<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_worker extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->model(array('M_workers','M_peoples','M_enums', 'M_groupusers', 'G_transactionnumbers', 'M_forms')); 
        $this->paging->is_session_set();
    }

    public function index()
    {
        $form = $this->paging->get_form_name_id();
        if($this->M_groupusers->is_permitted($_SESSION['userdata']['M_Groupuser_Id'],$form['m_worker'],'Read'))
        {
            $params = array(
                'order' => array('Created' => 'ASC')
            );

            $datapages = $this->M_workers->get_list(null, null, $params);
            $data['model'] = $datapages;
            load_view('m_worker/index', $data);
        }
        else
        {   
            $this->load->view('forbidden/forbidden');
        }
    }
    
    function add()
    {
        $form = $this->paging->get_form_name_id();
        if($this->M_groupusers->is_permitted($_SESSION['userdata']['M_Groupuser_Id'],$form['m_worker'],'Write'))
        {
            $model = $this->M_workers->new_object(); 
            $data =  $this->paging->set_data_page_add($model);
            load_view('m_worker/add', $data);  
        }
        else
        {
            $this->load->view('forbidden/forbidden');
        }
    }

    public function addsave()
    {
        $form = $this->paging->get_form_name_id();

        $peopleid = $this->input->post('peopleid');
        $phone = $this->input->post('telephone');
        $email = $this->input->post('email');
        $workertype = $this->input->post('workertype');
        
        $model = $this->M_workers->new_object();
        $model->M_People_Id = $peopleid;
        $model->Phone = $phone;
        $model->Email = $email;
        $model->IsActive = 1;
        $model->WorkerType = $workertype;
        $model->CreatedBy = $_SESSION['userdata']['Username'];

        print_r($model);
        $validate = $this->M_workers->validate($model);
 
        if($validate)
        {
            $this->session->set_flashdata('add_warning_msg',$validate);
            $data =  $this->paging->set_data_page_add($model);
            load_view('m_worker/add', $data);   
        }
        else{
            $mforms = $this->M_forms->get_data_by_formname($form['m_worker']);
            $model->NoWorker = $this->G_transactionnumbers->getLastNumberByFormId($mforms->Id, date("Y"), date("m"));
            $model->save();
            $this->G_transactionnumbers->updateLastNumber($mforms->Id, date("Y"), date("m"));
            $successmsg = $this->paging->get_success_message();
            $this->session->set_flashdata('success_msg', $successmsg);
            redirect('mworker/add');
        }
    }

    public function edit($id)
    {
        $form = $this->paging->get_form_name_id();
        if($this->M_groupusers->is_permitted($_SESSION['userdata']['M_Groupuser_Id'],$form['m_worker'],'Write'))
        {
            $model = $this->M_workers->get($id);
            $data =  $this->paging->set_data_page_edit($model);
            load_view('m_worker/edit', $data);  
        }
        else
        {
            $this->load->view('forbidden/forbidden');
        } 
    }

    public function editsave()
    {
        
        $id = $this->input->post('idworker');
        $peopleid = $this->input->post('peopleid');
        $phone = $this->input->post('telephone');
        $email = $this->input->post('email');
        $workertype = $this->input->post('workertype');
        
        $model = $this->M_workers->get($id);
        $oldmodel = clone $model;

        $model->M_People_Id = $peopleid;
        $model->Phone = $phone;
        $model->Email = $email;
        $model->IsActive = 1;
        $model->WorkerType = $workertype;
        $model->ModifiedBy = $_SESSION['userdata']['Username'];

        $validate = $this->M_workers->validate($model, $oldmodel);
        if($validate)
        {
            $this->session->set_flashdata('edit_warning_msg',$validate);
            $data =  $this->paging->set_data_page_edit($model);
            load_view('m_worker/edit', $data);   
        }
        else
        {
            $model->save();
            $successmsg = $this->paging->get_success_message();
            $this->session->set_flashdata('success_msg', $successmsg);
            redirect('mworker');
        }
    }

    public function delete(){
        $id = $this->input->post("id");
        $form = $this->paging->get_form_name_id();
        if($this->M_groupusers->is_permitted($_SESSION['userdata']['M_Groupuser_Id'],$form['m_worker'],'Delete'))
        {   
            $deleteData = $this->M_workers->get($id);
            $delete = $deleteData->delete();
            if(isset($delete)){
                $deletemsg = $this->helpers->get_query_error_message($delete['code']);
                //$this->session->set_flashdata('warning_msg', $deletemsg);
                echo json_encode(delete_status($deletemsg, FALSE));
            } else {
                $deletemsg = $this->paging->get_delete_message();
                //$this->session->set_flashdata('delete_msg', $deletemsg);
                echo json_encode(delete_status($deletemsg));
            }
        } else {
            echo json_encode(delete_status("", FALSE, TRUE));
        }
    }
    
}