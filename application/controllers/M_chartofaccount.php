<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_chartofaccount extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->database('naturedisaster', TRUE);
        //$this->load->model(array('M_chartofaccounts','M_groupusers')); 
        $this->paging->is_session_set();
    }

    public function index()
    {
        $form = $this->paging->get_form_name_id();
        if($this->M_groupusers->is_permitted($_SESSION['userdata']['M_Groupuser_Id'],$form['m_chartofaccount'],'Read'))
        {

            $params = array(
                'order' => array('Created' => 'ASC')
            );

            $datapages = $this->M_chartofaccounts->get_list(null, null, $params);
            $data['model'] = $datapages;
            load_view('m_chartofaccount/index', $data);
        }
        else
        {   
            $this->load->view('forbidden/forbidden');
        }
    }
    
    function add()
    {
        $form = $this->paging->get_form_name_id();
        if($this->M_groupusers->is_permitted($_SESSION['userdata']['M_Groupuser_Id'],$form['m_chartofaccount'],'Write'))
        {
            $model = $this->M_chartofaccounts->new_object();
            $data =  $this->paging->set_data_page_add($model);
            load_view('m_chartofaccount/add', $data);  
        }
        else
        {
            $this->load->view('forbidden/forbidden');
        }
    }

    public function addsave()
    {
        //$date = new DateTime();
        $warning = array();
        $err_exist = false;
        $code = $this->input->post('code');
        $name = $this->input->post('named');
        $parentid = $this->input->post('parentid');
        
        $parent = $this->M_chartofaccounts->get($parentid);

        $model = $this->M_chartofaccounts->new_object();
        $model->Code = $code;
        $model->Name = $name;
        $model->Parent = $parentid;
        $model->Level = $parent->Level + 1;
        $model->Type = $parent->Type;
        $model->CreatedBy = $_SESSION['userdata']['Username'];

        $validate = $this->M_chartofaccounts->validate($model);
 
        if($validate)
        {
            $this->session->set_flashdata('add_warning_msg',$validate);
            $data =  $this->paging->set_data_page_add($model);
            load_view('m_chartofaccount/add', $data);   
        }
        else{
    
            $model->save();
            $successmsg = $this->paging->get_success_message();
            $this->session->set_flashdata('success_msg', $successmsg);
            redirect('mchartofaccount/add');
        }
    }

    public function edit($id)
    {
        $form = $this->paging->get_form_name_id();
        if($this->M_groupusers->is_permitted($_SESSION['userdata']['M_Groupuser_Id'],$form['m_chartofaccount'],'Write'))
        {
            $model = $this->M_chartofaccounts->get($id);
            $data =  $this->paging->set_data_page_edit($model);
            load_view('m_chartofaccount/edit', $data);  
        }
        else
        {
            $this->load->view('forbidden/forbidden');
        } 
    }

    public function editsave()
    {
        
        $id = $this->input->post('idchartofaccount');
        $code = $this->input->post('code');
        $name = $this->input->post('named');
        $parentid = $this->input->post('parentid');
        
        $parent = $this->M_chartofaccounts->get($parentid);

        $model = $this->M_chartofaccounts->get($id);
        $oldmodel = clone $model;
        //print_r($oldmodel);
        
        $model->Code = $code;
        $model->Name = $name;
        $model->Parent = $parentid;
        $model->Level = $parent->Level + 1;
        $model->Type = $parent->Type;
        $model->ModifiedBy = $_SESSION['userdata']['Username'];


        $validate = $this->M_chartofaccounts->validate($model, $oldmodel);
        if($validate)
        {
            $this->session->set_flashdata('edit_warning_msg',$validate);
            $data =  $this->paging->set_data_page_edit($model);
            load_view('m_chartofaccount/edit', $data);   
        }
        else
        {
            $model->save();
            $successmsg = $this->paging->get_success_message();
            $this->session->set_flashdata('success_msg', $successmsg);
            redirect('mchartofaccount');
        }
    }

    public function delete(){
        $id = $this->input->post("id");
        $form = $this->paging->get_form_name_id();
        if($this->M_groupusers->is_permitted($_SESSION['userdata']['M_Groupuser_Id'],$form['m_chartofaccount'],'Delete'))
        {   
            $deleteData = $this->M_chartofaccounts->get($id);
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