<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_workers_model extends MY_Model {

    public function __construct(){
        parent::__construct();
    }

    public function validate($model, $oldmodel = null){
        
        $warning  = array();
        
        // if(empty($model->NoWorker))
        // {
        //     $warning = array_merge($warning, array(0=>'err_msg_noworker_cannot_null'));
        // }
        if(empty($model->Phone))
        {
            $warning = array_merge($warning, array(0=>'err_msg_phone_cannot_null'));
        }
        
        return $warning;
    }

}

class M_worker_object extends Model_object {
   
}