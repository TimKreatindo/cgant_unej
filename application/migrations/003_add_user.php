<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_user extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'id_role' => array(
                                'type' => 'INT',
                                'constraint' => '11',
                        ),
                        'id_jurusan' => array(
                                'type' => 'INT',
                                'constraint' => '11',
                        ),
                        'nip' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'unique' => TRUE,
                        ),
                        'nama' => array(
                                'type' => 'text',
                        ),
                        'password' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '50',
                        ),
                        'image' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'default' => 'default.png'
                        ),
                        'is_active' => array(
                                'type' => 'INT',
                                'constraint' => '1',
                        ),
                        'create_at' => array(
                                'type' => 'DATETIME',
                        ),
                        'last_update' => array(
                                'type' => 'DATETIME',
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('user');
        }

        public function down()
        {
                $this->dbforge->drop_table('user');
        }
}