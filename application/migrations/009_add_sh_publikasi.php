<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_sh_publikasi extends CI_Migration {

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
                        
                        'judul' => array(
                            'type' => 'TEXT',
                        ),
                        'jurnal' => array(
                            'type' => 'TEXT',
                        ),
                        'tahun' => array(
                            'type' => 'varchar',
                            'constraint' => '4',
                        ),
                        'level' => array(
                            'type' => 'varchar',
                            'constraint' => '255',
                        ),
                        'indeks' => array(
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
                $this->dbforge->create_table('sh_publikasi');


        }

        public function down()
        {
                $this->dbforge->drop_table('sh_publikasi');
        }
}