<?php

class Migration_create_t_application20190106115107 extends CI_Migration {

    public function up() {
        $this->load->helper('db_helper');

        $data = array('data' =>
                
            array(
                'Name' => 'RateType'
            ),
            array(
                'Name' => 'SubmissionStatus'
                )
        );

        foreach ($data as $value){
            $this->db->insert('m_enums', $value);
        }

        $datadetail = array('data' =>
                
            array(
                'M_Enum_Id' => 8,
                'Value' => 1,
                'EnumName' => 'Flat',
                'Ordering' => 1,
                'Resource' => 'ui_flat'
            ),
            array(
                'M_Enum_Id' => 8,
                'Value' => 2,
                'EnumName' => 'Sliding',
                'Ordering' => 2,
                'Resource' => 'ui_sliding'
            ),
            array(
                'M_Enum_Id' => 9,
                'Value' => 1,
                'EnumName' => 'New',
                'Ordering' => 1,
                'Resource' => 'ui_new'
            ),
            array(
                'M_Enum_Id' => 9,
                'Value' => 2,
                'EnumName' => 'Approved',
                'Ordering' => 2,
                'Resource' => 'ui_approved'
            ),
            array(
                'M_Enum_Id' => 9,
                'Value' => 3,
                'EnumName' => 'Rejected',
                'Ordering' => 3,
                'Resource' => 'ui_rejected'
            ),
            array(
                'M_Enum_Id' => 9,
                'Value' => 4,
                'EnumName' => 'Canceled',
                'Ordering' => 4,
                'Resource' => 'ui_canceled'
            )
        );

        foreach ($datadetail as $value){
            $this->db->insert('m_enumdetails', $value);
        }
    }

    public function down() {
        //$this->dbforge->drop_table('create_t_application20190106115107');
    }

}