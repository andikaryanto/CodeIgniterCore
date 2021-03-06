<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class G_transactionnumbers_model extends MY_Model {

    public function __construct(){
        parent::__construct();
    }

    public function getLastNumberByFormId($formId, $year, $month){
        $this->db->select('*');
        $this->db->from('g_transactionnumbers');
        $this->db->where('M_Form_Id', $formId);
        $this->db->where('Year', $year);
        $this->db->where('Month', $month);
        $query = $this->db->get();
        // if($query->num_rows() == 0){
        //     $insert = $this->insertNewFormNumber($formId, $year, $month);
        //     if($insert)
        //         return $this->getLastNumberByFormId($formId, $year, $month);
        // }

        $result = $query->row();
        $formatedNumber = $result->Format;
        $code = explode("/",$formatedNumber);
        $newNumber = str_replace("#","0",$code[2]);
        $newNumberLen = strlen($newNumber);
        $newNumber = $newNumber . (string)($result->LastNumber + 1);
        $newNumber = substr($newNumber, strlen($newNumber)-$newNumberLen,$newNumberLen);

        
        //$formatedNumber = str_replace("{YY}",(string)$year, $formatedNumber);
        //$formatedNumber = str_replace("{MM}",(string)$month, $formatedNumber);
        //$formatedNumber = str_replace("######",$newNumber, $formatedNumber);

        return $code[0]."/".(string)$year.(string)$month."/".$newNumber;
    }

    public function insertNewFormNumber($formId, $year, $month){
        $transactionCode ="";
        $format = "";
        if($formId == 9){
            $transactionCode = "M";
            $format = "{yyyy}.{mm}.######";
        } else if ($formId == 8){
            $transactionCode = "W";
            $format = "{yyyy}.{mm}.######";
        } else if ($formId == 11){
            $transactionCode = "SU";
            $format = "{yyyy}.{mm}.######";
        } else if ($formId == 14){
            $transactionCode = "SP";
            $format = "{yyyy}.{mm}.######";
        }

        $data = array(
            'format' => $transactionCode.$format,
            'year' => $year,
            'month' => $month,
            'lastnumber' => 0,
            'm_form_id' => $formId
        );

        return $this->db->insert('g_transactionnumbers', $data);
    }

    public function updateLastNumber($formId, $year, $month){
        $this->db->set('LastNumber', 'LastNumber+1', FALSE);
        $this->db->where('M_Form_Id', $formId);
        $this->db->where('Year', $year);
        $this->db->where('Month', $month);
        $this->db->update('g_transactionnumbers');
    }

    public function get_data_by_form_id($formid){
        $param = array(
            'where' => array(
                "M_Form_Id" => $formid
            )
        );
        
        return $this->get_list(null, null, $param);
    }

}

class G_transactionnumber_object extends Model_object {
   
}