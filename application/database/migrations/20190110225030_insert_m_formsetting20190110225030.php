<?php

class Migration_insert_m_formsetting20190110225030 extends CI_Migration {

    public function up() {
        $data = array('data' => array(
            'M_Form_Id' => 9,
            'Value' => 1,
            'Name' => 'NUMBERING_FORMAT',
        )
        );
        foreach ($data as $value){
            $this->db->insert('m_formsettings', $value);
        }
    }
    public function down() {
        //$this->dbforge->drop_table('insert_m_formsetting20190110225030');
    }

}