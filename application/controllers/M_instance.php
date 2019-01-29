<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_instance extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->model(array('M_instances','M_villages','M_enums', 'M_groupusers', 'M_members', 'M_instances')); 
        $this->paging->is_session_set();
    }

    public function index()
    {
        $form = $this->paging->get_form_name_id();
        if($this->M_groupusers->is_permitted($_SESSION['userdata']['M_Groupuser_Id'],$form['m_instance'],'Read'))
        {
            $params = array(
                'order' => array('Created' => 'ASC')
            );

            $datapages = $this->M_instances->get_list(null, null, $params);
            $data['model'] = $datapages;
            load_view('m_instance/index', $data);
        }
        else
        {   
            $this->load->view('forbidden/forbidden');
        }
    }
    
    function add()
    {
        $form = $this->paging->get_form_name_id();
        if($this->M_groupusers->is_permitted($_SESSION['userdata']['M_Groupuser_Id'],$form['m_instance'],'Write'))
        {
            $model = $this->M_instances->new_object(); 
            $modal_village = $this->M_villages->get_list();
            $data_modal = array(
                'modal_village' => $modal_village
            );
            $data =  $this->paging->set_data_page_add($model,null, $data_modal);
            load_view('m_instance/add', $data);  
        }
        else
        {
            $this->load->view('forbidden/forbidden');
        }
    }

    public function addsave()
    {
        $owner = $this->input->post('owner');
        $instancename = $this->input->post('instancename');
        $noinstance = $this->input->post('noinstance');
        $instancetype = $this->input->post('instancetype');
        $villageid = $this->input->post('villageid');
        $rt = $this->input->post('rt');
        $rw = $this->input->post('rw');
        $address = $this->input->post('address');
        $postcode = $this->input->post('postcode');
        
        $model = $this->M_instances->new_object();
        $model->Owner = setisnull($owner);
        $model->InstanceName = setisnull($instancename);
        $model->NoInstance = setisnull($noinstance);
        $model->InstanceType = setisnull($instancetype);
        $model->M_Village_Id = setisnull($villageid);
        $model->Address = setisnull($address);
        $model->Rt = setisnull($rt);
        $model->Rw = setisnull($rw);
        $model->PostCode = setisnull($postcode);
        $model->CreatedBy = $_SESSION['userdata']['Username'];

        //print_r($model);
        $validate = $this->M_instances->validate($model);
 
        if($validate)
        {
            $this->session->set_flashdata('add_warning_msg',$validate);
            $modal_village = $this->M_villages->get_list();
            $data_modal = array(
                'modal_village' => $modal_village
            );
            $data =  $this->paging->set_data_page_add($model, null, $data_modal);
            load_view('m_instance/add', $data);   
        }
        else{
    
            $id = $model->save();
            $successmsg = $this->paging->get_success_message();
            $this->session->set_flashdata('success_msg', $successmsg);
            redirect('m_instance/add');
        }
    }

    public function edit($id)
    {
        $form = $this->paging->get_form_name_id();
        if($this->M_groupusers->is_permitted($_SESSION['userdata']['M_Groupuser_Id'],$form['m_instance'],'Write'))
        {
            $model = $this->M_instances->get($id);
            $modal_village = $this->M_villages->get_list();
            $data_modal = array(
                'modal_village' => $modal_village
            );
            $enums['jobenums'] =  $this->M_enums->get_data_by_id(6);
            $enums['religionenums'] =  $this->M_enums->get_data_by_id(3);
            $enums['genderenums'] =  $this->M_enums->get_data_by_id(2);
            $data =  $this->paging->set_data_page_edit($model, null, $data_modal);
            load_view('m_instance/edit', $data);  
        }
        else
        {
            $this->load->view('forbidden/forbidden');
        } 
    }

    public function editsave()
    {
        
        $id = $this->input->post('idinstance');
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
        
        $model = $this->M_instances->get($id);
        $oldmodel = clone $model;

        $model->Owner = setisnull($owner);
        $model->InstanceName = setisnull($instancename);
        $model->NoInstance = setisnull($noinstance);
        $model->InstanceType = setisnull($instancetype);
        $model->M_Village_Id = setisnull($villageid);
        $model->Address = setisnull($address);
        $model->Rt = setisnull($rt);
        $model->Rw = setisnull($rw);
        $model->PostCode = setisnull($postcode);
        $model->ModifiedBy = $_SESSION['userdata']['Username'];

        $validate = $this->M_instances->validate($model, $oldmodel);
        if($validate)
        {
            $this->session->set_flashdata('edit_warning_msg',$validate);

            $modal_village = $this->M_villages->get_list();
            $data_modal = array(
                'modal_village' => $modal_village
            );
            $enums['jobenums'] =  $this->M_enums->get_data_by_id(6);
            $enums['religionenums'] =  $this->M_enums->get_data_by_id(3);
            $enums['genderenums'] =  $this->M_enums->get_data_by_id(2);
            $data =  $this->paging->set_data_page_edit($model, null, $data_modal);
            load_view('m_instance/edit', $data);   
        }
        else
        {
            $model->save();
            $successmsg = $this->paging->get_success_message();
            $this->session->set_flashdata('success_msg', $successmsg);
            redirect('minstance');
        }
    }

    public function delete(){
        $id = $this->input->post("id");
        $form = $this->paging->get_form_name_id();
        if($this->M_groupusers->is_permitted($_SESSION['userdata']['M_Groupuser_Id'],$form['m_instance'],'Delete'))
        {   
            $deleteData = $this->M_instances->get($id);
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