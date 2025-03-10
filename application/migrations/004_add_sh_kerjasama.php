<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_sh_kerjasama extends CI_Migration {

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
                        'judul' => array(
                                'type' => 'TEXT',
                        ),
                        'nama_mitra' => array(
                                'type' => 'TEXT',
                        ),
                        'level_mitra' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                        'jangka_waktu' => array(
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
                $this->dbforge->create_table('sh_kerjasama');


        }

        public function down()
        {
                $this->dbforge->drop_table('sh_kerjasama');
        }
}