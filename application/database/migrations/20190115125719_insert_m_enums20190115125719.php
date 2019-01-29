<?php

class Migration_insert_m_enums20190115125719 extends CI_Migration {

    public function up() {
        $data = array('data' =>
                
            array(
                'Name' => 'ReportType'
                )
        );

        foreach ($data as $value){
            $this->db->insert('m_enums', $value);
        }

        $datadetail = array('data' =>
                
            array(
                'M_Enum_Id' => 10,
                'Value' => 1,
                'EnumName' => 'Summary',
                'Ordering' => 1,
                'Resource' => 'ui_summary'
            ),
            array(
                'M_Enum_Id' => 10,
                'Value' => 2,
                'EnumName' => 'Detail',
                'Ordering' => 2,
                'Resource' => 'ui_detail'
            )
        );

        foreach ($datadetail as $value){
            $this->db->insert('m_enumdetails', $value);
        }
    }

    public function down() {
        //$this->dbforge->drop_table('insert_m_enums20190115125719');
    }

}