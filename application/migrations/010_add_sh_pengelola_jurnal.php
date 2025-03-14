<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_sh_pengelola_jurnal extends CI_Migration {

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
                        'jurnal' => array(
                                'type' => 'TEXT',
                        ),
                        'level' => array(
                                'type' => 'varchar',
                                'constraint' => '255',
                        ),
                        'role' => array(
                                'type' => 'varchar',
                                'constraint' => '255',
                        ),
                        'tahun' => array(
                                'type' => 'varchar',
                                'constraint' => '4',
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
                $this->dbforge->create_table('sh_pengelola_jurnal');


        }

        public function down()
        {
                $this->dbforge->drop_table('sh_pengelola_jurnal');
        }
}