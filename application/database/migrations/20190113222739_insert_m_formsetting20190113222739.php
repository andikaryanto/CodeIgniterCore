<?php

class Migration_insert_m_formsetting20190113222739 extends CI_Migration {

    public function up() {
        $data = array('data' => 
           
            array(
                'M_Form_Id' => 14,
                'Value' => 3,
                'Name' => 'SUBMISSION_PAYMENT_ONE_MONTH_ONLY',
                'BooleanValue' => 0
            ),
            array(
                'M_Form_Id' => 14,
                'Value' => 4,
                'Name' => 'SUBMISSION_PAYMENT_STANDALONE_FINE_PAYMENT',
                'BooleanValue' => 0
            )

        );
        foreach ($data as $value){
            $this->db->insert('m_formsettings', $value);
        }
    }

    public function down() {
    }

}