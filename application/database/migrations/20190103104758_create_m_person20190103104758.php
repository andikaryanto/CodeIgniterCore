<?php

class Migration_create_m_person20190103104758 extends CI_Migration {

    public function up() {
        $this->load->helper('db_helper');
        $this->dbforge->add_field(array(
            'Id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'CompleteName' => array(
                'type' => 'Varchar',
                'constraint' => 100
            ),
            'Nik' => array(
                'type' => 'Varchar',
                'constraint' => 100
            ),
            'PlaceOfBirth' => array(
                'type' => 'Varchar',
                'constraint' => 10
            ),
            'DateOfBirth' => array(
                'type' => 'DATETIME'
            ),
            'Gender' => array(
                'type' => 'INT',
                'constraint' => 11,
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
            'BloodType' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => true
            ),
            'Religion' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => true
            ),
            'MariageStatus' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => true
            ),
            'Job' => array(
                'type' => 'INT',
                'constraint' => 11,
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
        $this->dbforge->create_table('m_peoples', TRUE);
        $this->db->query(add_foreign_key('m_peoples', 'M_Village_Id', 'm_villages(Id)', 'RESTRICT', 'CASCADE'));
    }

    public function down() {
        // $this->dbforge->drop_table('create_m_person20190103104758');
    }

}