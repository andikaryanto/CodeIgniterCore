<?php

class Migration_insert_m_form20190105123652 extends CI_Migration {

    public function up() {
        $data = array('data' =>
           
            array(
                'FormName' => 'm_instances',
                'AliasName' => 'master instance',
                'LocalName' => 'master perusahaan',
                'ClassName' => 'Master',
                'Resource' => 'ui_instance',
                'IndexRoute' => 'minstance'
            )
        );
        foreach ($data as $value){
            $this->db->insert('m_forms', $value);
        }
    }

    public function down() {
        //$this->dbforge->drop_table('insert_m_form20190105123652');
    }

}