<?php
    class connection {

        protected $db_host, $db_user, $db_pass, $db_name;

        public function connection() {
           $this->db_host = 'localhost';
           $this->db_user = 'stjoseph';
           $this->db_pass = 'stjoseph_talakag';
           $this->db_name = 'sjhs1819';
        }

        public function connectDB() {
            return mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        }

        public function getDatabaseName() {
          return $this->db_name;
        }

        public function closeDB() {
            mysqli_close(self::connectDB());
        }
    }
?>
