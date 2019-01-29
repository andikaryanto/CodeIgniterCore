<?php

class Migration_add_field_member20190105224352 extends CI_Migration {

    public function up() {
        $data = array('data' =>
                
            array(
                'Name' => 'MemberType'
                )
        );

        foreach ($data as $value){
            $this->db->insert('m_enums', $value);
        }

        $datadetail = array('data' =>
                
            array(
                'M_Enum_Id' => 7,
                'Value' => 1,
                'EnumName' => 'Individual',
                'Ordering' => 1,
                'Resource' => 'ui_individual'
            ),
            array(
                'M_Enum_Id' => 7,
                'Value' => 2,
                'EnumName' => 'Instance',
                'Ordering' => 2,
                'Resource' => 'ui_instance'
            ),
            array(
                'M_Enum_Id' => 7,
                'Value' => 99,
                'EnumName' => 'Others',
                'Ordering' => 9,
                'Resource' => 'ui_others'
            )
        );
        

        foreach ($datadetail as $value){
            $this->db->insert('m_enumdetails', $value);
        }

        $field = array(
            'MemberType' => array(
                'type' => 'INT',
                'constraint' => 11,
                'after' => 'IsActive'
            )
        );
        $this->dbforge->add_column('m_members', $field);
    }

    public function down() {
        //$this->dbforge->drop_table('add_field_member20190105224352');
    }

}