<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_sh_rekognisi extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'id_user' => array(
                                'type' => 'INT',
                                'constraint' => '11',
                        ),
                        'tahun' => array(
                                'type' => 'varchar',
                                'constraint' => '4',
                        ),

                        'jenis_rekognisi' => array(
                                'type' => 'varchar',
                                'constraint' => '255',
                        ),
                        'jenis_kegiatan' => array(
                                'type' => 'varchar',
                                'constraint' => '255',
                        ),

                        'level' => array(
                                'type' => 'varchar',
                                'constraint' => '255',
                        ),
                        'penyelenggara' => array(
                                'type' => 'text',
                        ),
                        
                        'bukti' => array(
                            'type' => 'TEXT',
                        ),
                        'create_at' => array(
                                'type' => 'DATETIME',
                        ),
                        'last_update' => array(
                                'type' => 'DATETIME',
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('sh_rekognisi');


        }

        public function down()
        {
                $this->dbforge->drop_table('sh_rekognisi');
        }
}