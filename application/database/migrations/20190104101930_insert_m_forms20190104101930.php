<?php

class Migration_insert_m_forms20190104101930 extends CI_Migration {

    public function up() {
        $data = array('data' =>
           
            array(
                'FormName' => 'm_members',
                'AliasName' => 'master member',
                'LocalName' => 'master anggota',
                'ClassName' => 'Master',
                'Resource' => 'ui_member',
                'IndexRoute' => 'mmember'
            )
        );
        foreach ($data as $value){
            $this->db->insert('m_forms', $value);
        }
    }

    public function down() {
        //$this->dbforge->drop_table('insert_m_forms20190104101930');
    }

}