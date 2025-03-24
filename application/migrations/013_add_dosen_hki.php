<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_dosen_hki extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'id_user' => array(
                                'type' => 'INT',
                                'constraint' => '11',
                        ),
                        
                        'id_hki' => array(
                                'type' => 'int',
                                'constraint' => '11',
                        )
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('dosen_hki');


        }

        public function down()
        {
                $this->dbforge->drop_table('dosen_hki');
        }
}