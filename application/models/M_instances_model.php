<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_instances_model extends MY_Model {

    public function __construct(){
        parent::__construct();
    }

    public function is_data_exist($instancename = null)
    {
        $exist = false;
        if($this->count(array('InstanceName'=> $instancename)) > 0){
            $exist = true;
        }
        return $exist;
    }

    public function validate($model, $oldmodel = null){
        $nikexist  = false;
        $warning  = array();

        if(!empty($oldmodel))
        {
            if($model->InstanceName != $oldmodel->InstanceName)
            {
                $nikexist = $this->is_data_exist($model->InstanceName);
            }
        }
        else{
            if(!empty($model->InstanceName))
            {
                $nikexist = $this->is_data_exist($model->InstanceName);
            }
            else{
                $warning = array_merge($warning, array(0=>'err_msg_nik_can_not_null'));
            }
        }

        if($nikexist)
            $warning = array_merge($warning, array(0=>'err_msg_nik_exist'));
        
        
        return $warning;
    }

}

class M_instance_object extends Model_object {
    
    public function __get($name)
    {
        switch($name){
            case "IsMember":
                return $this->isMember();
        }
    }

    private function isMember(){    
        $list = $this->get_list_M_Members($this->Id);
        if($list){
            return true;
        }

        return false;
    }
}