<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_peoples_model extends MY_Model {

    public function __construct(){
        parent::__construct();
    }

    public function is_data_exist($nik = null)
    {
        $exist = false;
        if($this->count(array('Nik'=> $nik)) > 0){
            $exist = true;
        }
        return $exist;
    }

    public function validate($model, $oldmodel = null){
        $nikexist  = false;
        $warning  = array();

        if(!empty($oldmodel))
        {
            if($model->Nik != $oldmodel->Nik)
            {
                $nikexist = $this->is_data_exist($model->Nik);
            }
        }
        else{
            if(!empty($model->Nik))
            {
                $nikexist = $this->is_data_exist($model->Nik);
            }
            else{
                $warning = array_merge($warning, array(0=>'err_msg_nik_can_not_null'));
            }
        }

        if($nikexist)
            $warning = array_merge($warning, array(0=>'err_msg_nik_exist'));
        
        
        if(empty($model->CompleteName))
            $warning = array_merge($warning, array(0=>'err_msg_name_can_not_null'));
        return $warning;
    }

}

class M_people_object extends Model_object {

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