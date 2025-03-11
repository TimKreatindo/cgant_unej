<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_sh_kegiatan_tridharma extends CI_Migration {

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
                        'tanggal_kegiatan' => array(
                                'type' => 'TEXT',
                        ),
                        'jenis_kegiatan' => array(
                                'type' => 'varchar',
                                'constraint' => '255',
                        ),
                        'tempat_kegiatan' => array(
                                'type' => 'TEXT',
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
                $this->dbforge->create_table('sh_kegiatan_tridharma');


        }

        public function down()
        {
                $this->dbforge->drop_table('sh_kegiatan_tridharma');
        }
}