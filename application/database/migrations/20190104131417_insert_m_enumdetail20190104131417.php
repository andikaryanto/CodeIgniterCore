<?php

class Migration_insert_m_enumdetail20190104131417 extends CI_Migration {

    public function up() {
        $datadetail = array('data' =>
                
            array(
                'M_Enum_Id' => 4,
                'Value' => 2,
                'EnumName' => 'Secretary',
                'Ordering' => 2,
                'Resource' => 'ui_secretary'
            ),
            array(
                'M_Enum_Id' => 4,
                'Value' => 3,
                'EnumName' => 'Treasurer',
                'Ordering' => 3,
                'Resource' => 'ui_treasurer'
            ),
            array(
                'M_Enum_Id' => 6,
                'Value' => 99,
                'EnumName' => 'Others',
                'Ordering' => 99,
                'Resource' => 'ui_others'
            ),
        );

        foreach ($datadetail as $value){
            $this->db->insert('m_enumdetails', $value);
        }
    }

    public function down() {
        //$this->dbforge->drop_table('insert_m_enumdetail20190104131417');
    }

}