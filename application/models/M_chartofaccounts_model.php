<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_chartofaccounts_model extends MY_Model {

    public function __construct(){
        parent::__construct();
    }

    public function is_data_exist($code = null)
    {
        $exist = false;
        if($this->count(array('Code'=> $code)) > 0){
            $exist = true;
        }
        return $exist;
    }

    public function validate($model, $oldmodel = null){
        $nameexist  = false;
        $warning    = array();

        if(!empty($oldmodel))
        {
            if($model->Code != $oldmodel->Code)
            {
                $nameexist = $this->is_data_exist($model->Code);
            }
        }
        else{
            if(!empty($model->Code))
            {
                $nameexist = $this->is_data_exist($model->Code);
            }
            else{
                $warning = array_merge($warning, array(0=>'err_msg_acount_code_can_not_null'));
            }
        }

        if($nameexist)
            $warning = array_merge($warning, array(0=>'err_msg_acount_code_exist'));
    }

}

class M_chartofaccount_object extends Model_object {

    public function __get($name){
        switch($name){
            case "IsParent" :
                return $this->isParent();
            case "IsLowLevel" :
                return $this->isLowLevel();
            case "DownLevel" :
                return $this->downLevel();
        }
    }

    public function M_Parent(){
        $CI =& get_instance();
        if($this->Parent){
            $parent = $CI->M_chartofaccounts->get($this->Parent);
            if($parent){
                return $parent;
            }
        }
        return $CI->M_chartofaccounts->new_object();
    }

    private function downLevel(){
        return $this->Level - 1;
    }

    private function isParent(){
        $CI =& get_instance();
        $params = array(
            'where' => array(
                'Parent' => $this->Id
            )
        );
        $parent = $CI->M_chartofaccounts->get_list(null, null, $params);
        if($parent){
            return true;
        }
        return false;
    }

    private function isLowLevel(){
        if(!$this->IsParent)
            return true;
        return false;
    }
   
}