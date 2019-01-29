<?php

class Migration_create_g_setting20190110110340 extends CI_Migration {

    public function up() {
        $this->load->helper('db_helper');
        $this->dbforge->add_field(array(
            'Id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'M_Form_Id' => array(
                'type' => 'INT',
                'constraint' => 11
            ),
            'InputName' => array (
                'type' => 'VARCHAR',
                'constraint' => '1000',
                'null' => true
            ),
            'InputValue' => array (
                'type' => 'VARCHAR',
                'constraint' => '1000'
            )

        ));
        $this->dbforge->add_key('Id', TRUE);
        $this->dbforge->create_table('m_formsettings', TRUE);
        $this->db->query(add_foreign_key('m_formsettings', 'M_Form_Id', 'm_forms(Id)', 'RESTRICT', 'CASCADE'));
    }

    public function down() {
        //$this->dbforge->drop_table('create_g_setting20190110110340');
    }

}