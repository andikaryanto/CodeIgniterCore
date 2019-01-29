<?php

class Migration_insert_m_formsetting20190110231709 extends CI_Migration {

    public function up() {
        $data = array('data' => 
            array(
                'M_Form_Id' => 11,
                'Value' => 1,
                'Name' => 'NUMBERING_FORMAT',
            ),
            array(
                'M_Form_Id' => 14,
                'Value' => 1,
                'Name' => 'NUMBERING_FORMAT',
            ),
            array(
                'M_Form_Id' => 14,
                'Value' => 2,
                'Name' => 'SUBMISSION_PAYMENT_ACCOUNT_CODE',
            )

        );
        foreach ($data as $value){
            $this->db->insert('m_formsettings', $value);
        }
    }

    public function down() {
        //$this->dbforge->drop_table('insert_m_formsetting20190110231709');
    }

}