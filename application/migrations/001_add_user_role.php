<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_user_role extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'nama_role' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('user_role');

                $data = [
                    ['nama_role' => 'Admin'],
                    ['nama_role' => 'Kaprodi'],
                    ['nama_role' => 'Dekan'],
                    ['nama_role' => 'Dosen'],
                ];
                $this->db->insert_batch('user_role', $data);

        }

        public function down()
        {
                $this->dbforge->drop_table('user_role');
        }
}