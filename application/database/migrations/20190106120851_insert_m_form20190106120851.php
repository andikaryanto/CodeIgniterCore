<?php

class Migration_insert_m_form20190106120851 extends CI_Migration {

    public function up() {

        $data = array('data' => array(
                'FormName' => 't_submissions',
                'AliasName' => 'submission',
                'LocalName' => 'pengajuan',
                'ClassName' => 'Transaction',
                'Resource' => 'ui_submission',
                'IndexRoute' => 'tsubmission'
            )
        );
        foreach ($data as $value){
            $this->db->insert('m_forms', $value);
        }
    }

    public function down() {
        //$this->dbforge->drop_table('insert_m_form20190106120851');
    }

}