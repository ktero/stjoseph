<?php
    class connection {

        protected $db_host, $db_user, $db_pass, $db_name;

        public function connectDB($dname) {
            $this->db_host = 'localhost';
            $this->db_user = 'stjoseph';
            $this->db_pass = 'stjoseph_talakag';
            $this->db_name = $dname;
            return mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $dname);
        }

        public function closeDB() {
            mysqli_close(self::connectDB($_SESSION['database']));
        }

        public function getDBName() {
          return $_SESSION['database'];
        }
    }
?>
