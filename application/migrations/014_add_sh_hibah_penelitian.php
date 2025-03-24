<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_sh_hibah_penelitian extends CI_Migration {

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
                        'jenis_hibah' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                        'judul' => array(
                                'type' => 'TEXT'
                        ),
                        'mahasiswa_terlibat' => array(
                                'type' => 'TEXT'
                        ),
                        'kesesuaian' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '10',
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
                $this->dbforge->create_table('sh_hibah_penelitian');


        }

        public function down()
        {
                $this->dbforge->drop_table('sh_hibah_penelitian');
        }
}