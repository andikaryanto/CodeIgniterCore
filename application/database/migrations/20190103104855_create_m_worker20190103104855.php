<?php

class Migration_create_m_worker20190103104855 extends CI_Migration {

    public function up() {
        $this->load->helper('db_helper');
        $this->dbforge->add_field(array(
            'Id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'NoWorker' => array(
                'type' => 'varchar',
                'constraint' => 50,
                'null' => true
            ),
            'M_People_Id' => array(
                'type' => 'INT',
                'constraint' => 11
            ),
            'Phone' => array(
                'type' => 'varchar',
                'constraint' => 50,
                'null' => true
            ),
            'Email' => array(
                'type' => 'varchar',
                'constraint' => 100,
                'null' => true
            ),
            'IsActive' => array(
                'type' => 'INT',
                'constraint' => 11
            ),
            'WorkerType' => array(
                'type' => 'INT',
                'constraint' => 11
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
        $this->dbforge->create_table('m_workers', TRUE);
        $this->db->query(add_foreign_key('m_workers', 'M_People_Id', 'm_people(Id)', 'RESTRICT', 'CASCADE'));
    }

    public function down() {
        $this->dbforge->drop_table('create_m_worker20190103104855');
    }

}