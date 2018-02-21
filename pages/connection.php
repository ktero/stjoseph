<?php
    class connection {

        protected $db_host, $db_user, $db_pass, $db_name;

        public function connection() {
            $this->db_host = 'localhost';
            $this->db_user = 'root';
            $this->db_pass = '';
            $this->db_name = 'sjhs';
        }

        public function connectDB() {
            return mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        }

        public function closeDB() {
            mysqli_close(self::connectDB());
        }

        public function getDBName() {
          return $this->db_name;
        }
    }
?>
