<?php

class Migration_create_m_chartofaccounts20190108130118 extends CI_Migration {

    public function up() {
        $this->load->helper('db_helper');
        $this->dbforge->add_field(array(
            'Id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'Code' => array(                
                'type' => 'VARCHAR',
                'constraint' => 50,
            ),
            'Name' => array(                
                'type' => 'VARCHAR',
                'constraint' => 300,
            ),
            'Parent' => array(                
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true
            ),
            'Level' => array(                
                'type' => 'INT',
                'constraint' => 11,
            ),
            'CreatedBy' => array(
                'type' => 'varchar',
                'constraint' => 50,
                'null' => true
            ),
            'ModifiedBy' => array(
                'type' => 'varchar',
                'constraint' => 50,
                'null' => true
            ),
            'Created' => array(
                'type' => 'datetime',
                'null' => true
            ),
            'Modified' => array(
                'type' => 'datetime',
                'null' => true
            )
        ));
        $this->dbforge->add_key('Id', TRUE);
        $this->dbforge->create_table('m_chartofaccounts', TRUE);

        $data = array('data' => array(
            'FormName' => 'm_chartofaccounts',
            'AliasName' => 'chart of account',
            'LocalName' => 'kode akun',
            'ClassName' => 'General',
            'Resource' => 'ui_chartofaccount',
            'IndexRoute' => 'mchartofaccount'
            )
        );
        foreach ($data as $value){
            $this->db->insert('m_forms', $value);
        } 
    }

    public function down() {
        //$this->dbforge->drop_table('create_m_chartofaccounts20190108130118');
    }

}