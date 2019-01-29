<?php

class Migration_create_m_instance20190105120512 extends CI_Migration {

    public function up() {
        $this->load->helper('db_helper');
        $this->dbforge->add_field(array(
            'Id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'Owner' => array(
                'type' => 'Varchar',
                'constraint' => 100
            ),
            'InstanceName' => array(
                'type' => 'Varchar',
                'constraint' => 100
            ),
            'NoInstance' => array(
                'type' => 'Varchar',
                'constraint' => 100
            ),
            'InstanceType' => array(
                'type' => 'varchar',
                'constraint' => 300,
                'null' => true
            ),
            'M_Village_Id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => true
            ),
            'Address' => array(
                'type' => 'varchar',
                'constraint' => 300,
                'null' => true
            ),
            'Rt' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => true
            ),
            'Rw' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => true
            ),
            'PostCode' => array(
                'type' => 'varchar',
                'constraint' => 10,
                'null' => true
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
        $this->dbforge->create_table('m_instances', TRUE);

        $fields = array(
            'M_Instance_Id' => array(
                'type' => 'INT',
                'Constraint' => 11,
                'null' => true,
                'after' => 'M_People_Id'
                )
        );
        $this->dbforge->add_column('M_members', $fields);
        }

    public function down() {
        //$this->dbforge->drop_table('create_m_instance20190105120512');
    }

}