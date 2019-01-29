<?php

class Migration_insert_r_report20190114144119 extends CI_Migration {

    public function up() {
        $data = array('data' => array(
            'Name' => 'Submission Payment',
            'Description' => 'Submission Payment',
            'Url' => 'reports/submission_payment_view',
            'Resource' => 'report_submission_payment'
        )
        );
        foreach ($data as $value){
            $this->db->insert('r_reports', $value);
        }
    }

    public function down() {
    }

}