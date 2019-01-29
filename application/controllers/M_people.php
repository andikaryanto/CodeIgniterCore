<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_people extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->model(array('M_peoples','M_villages','M_enums', 'M_groupusers')); 
        $this->paging->is_session_set();
    }

    public function index()
    {
        $form = $this->paging->get_form_name_id();
        if($this->M_groupusers->is_permitted($_SESSION['userdata']['M_Groupuser_Id'],$form['m_people'],'Read'))
        {
            $params = array(
                'order' => array('Created' => 'ASC')
            );

            $datapages = $this->M_peoples->get_list(null, null, $params);
            $data['model'] = $datapages;
            load_view('m_people/index', $data);
        }
        else
        {   
            $this->load->view('forbidden/forbidden');
        }
    }
    
    function add()
    {
        $form = $this->paging->get_form_name_id();
        if($this->M_groupusers->is_permitted($_SESSION['userdata']['M_Groupuser_Id'],$form['m_people'],'Write'))
        {
            $model = $this->M_peoples->new_object(); 
            
            $data =  $this->paging->set_data_page_add($model);
            load_view('m_people/add', $data);  
        }
        else
        {
            $this->load->view('forbidden/forbidden');
        }
    }

    public function addsave()
    {
        $name = $this->input->post('named');
        $nik = $this->input->post('nik');
        $villageid = $this->input->post('villageid');
        $placeofbirth = $this->input->post('placeofbirth');
        $dateofbirth = get_formated_date($this->input->post('dateofbirth'));
        $rt = $this->input->post('rt');
        $rw = $this->input->post('rw');
        $address = $this->input->post('address');
        $postcode = $this->input->post('postcode');
        $job = $this->input->post('job');
        $religion = $this->input->post('religion');
        $gender = $this->input->post('gender');
        
        $model = $this->M_peoples->new_object();
        $model->CompleteName = setisnull($name);
        $model->Nik = setisnull($nik);
        $model->M_Village_Id = setisnull($villageid);
        $model->Address = setisnull($address);
        $model->PlaceOfBirth = setisnull($placeofbirth);
        $model->DateOfBirth = setisnull($dateofbirth);
        $model->Rt = setisnull($rt);
        $model->Rw =setisnull( $rw);
        $model->PostCode = setisnull($postcode);
        $model->Job = setisnull($job);
        $model->Religion = setisnull($religion);
        $model->Gender = setisnull($gender);
        $model->CreatedBy = $_SESSION['userdata']['Username'];

        //print_r($model);
        $validate = $this->M_peoples->validate($model);
 
        if($validate)
        {
            $this->session->set_flashdata('add_warning_msg',$validate);
            
            $data =  $this->paging->set_data_page_add($model);
            load_view('m_people/add', $data);   
        }
        else{
    
            $model->save();
            $successmsg = $this->paging->get_success_message();
            $this->session->set_flashdata('success_msg', $successmsg);
            redirect('mpeople/add');
        }
    }

    public function edit($id)
    {
        $form = $this->paging->get_form_name_id();
        if($this->M_groupusers->is_permitted($_SESSION['userdata']['M_Groupuser_Id'],$form['m_people'],'Write'))
        {
            $model = $this->M_peoples->get($id);
            $data =  $this->paging->set_data_page_edit($model);
            load_view('m_people/edit', $data);  
        }
        else
        {
            $this->load->view('forbidden/forbidden');
        } 
    }

    public function editsave()
    {
        
        $id = $this->input->post('idpeople');
        $name = $this->input->post('named');
        $nik = $this->input->post('nik');
        $villageid = $this->input->post('villageid');
        $placeofbirth = $this->input->post('placeofbirth');
        $dateofbirth = get_formated_date($this->input->post('dateofbirth'));
        $rt = $this->input->post('rt');
        $rw = $this->input->post('rw');
        $address = $this->input->post('address');
        $postcode = $this->input->post('postcode');
        $job = $this->input->post('job');
        $religion = $this->input->post('religion');
        $gender = $this->input->post('gender');
        
        $model = $this->M_peoples->get($id);
        $oldmodel = clone $model;

        $model->CompleteName = setisnull($name);
        $model->Nik = setisnull($nik);
        $model->M_Village_Id = setisnull($villageid);
        $model->Address = setisnull($address);
        $model->PlaceOfBirth = setisnull($placeofbirth);
        $model->DateOfBirth = setisnull($dateofbirth);
        $model->Rt = setisnull($rt);
        $model->Rw =setisnull( $rw);
        $model->PostCode = setisnull($postcode);
        $model->Job = setisnull($job);
        $model->Religion = setisnull($religion);
        $model->Gender = setisnull($gender);
        $model->ModifiedBy = $_SESSION['userdata']['Username'];

        $validate = $this->M_peoples->validate($model, $oldmodel);
        if($validate)
        {
            $this->session->set_flashdata('edit_warning_msg',$validate);

           
            $data =  $this->paging->set_data_page_edit($model);
            load_view('m_people/edit', $data);   
        }
        else
        {
            $model->save();
            $successmsg = $this->paging->get_success_message();
            $this->session->set_flashdata('success_msg', $successmsg);
            redirect('mpeople');
        }
    }

    public function delete(){
        $id = $this->input->post("id");
        $form = $this->paging->get_form_name_id();
        if($this->M_groupusers->is_permitted($_SESSION['userdata']['M_Groupuser_Id'],$form['m_people'],'Delete'))
        {   
            $deleteData = $this->M_peoples->get($id);
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