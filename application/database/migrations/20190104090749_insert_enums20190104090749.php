<?php

class Migration_insert_enums20190104090749 extends CI_Migration {

    public function up() {
        $data = array('data' =>
                
            array(
                'Name' => 'Job'
                )
        );

        foreach ($data as $value){
            $this->db->insert('m_enums', $value);
        }

        $datadetail = array('data' =>
                
            array(
                'M_Enum_Id' => 6,
                'Value' => 1,
                'EnumName' => 'Student',
                'Ordering' => 1,
                'Resource' => 'ui_student'
            ),
            array(
                'M_Enum_Id' => 6,
                'Value' => 2,
                'EnumName' => 'Enterpreneur',
                'Ordering' => 2,
                'Resource' => 'ui_enterpreneur'
            )
        );

        foreach ($datadetail as $value){
            $this->db->insert('m_enumdetails', $value);
        }
    }

    public function down() {
        //$this->dbforge->drop_table('insert_enums20190104090749');
    }

}