<?php
class Database {
    public $host = DB_HOST;
    public $username = DB_USER;
    public $password = DB_PASS;
    public $db_name = DB_NAME;

    public $link;
    public $error;


    // Constructor
    public function __construct()
    {
        // Connet to DB
        $this->connect();
    }

    private function connect() {
        $this->link = new mysqli($this->host, $this->username, $this->password, $this->db_name);

        if(!$this->link) {
            $this->error = "Connection Failed:" . $this->link->connect_error;
            return false;
        }
    }

    public function select($query) {
        $result = $this->link->query($query) or die($this->link->error . __LINE__);
        if($result->num_rows) {
            return $result;
        } else {
            return false;
        }
    }

    public function insert($query) {
        $insert_row = $this->link->query($query) or die($this->link->error.__LINE__);

        // Validate insert
        if($insert_row) {
            header("Location:index.php?msg=".urlencode(("Record added")));
            exit();
        } else {
            die("Error: " . $this->link->errno . " " . $this->link->error);
        }
    }

    public function update($query) {
        $update_row = $this->link->query($query) or die($this->link->error.__LINE__);

        // Validate insert
        if($update_row) {
            header("Location:index.php?msg=".urlencode(("Record updated")));
            exit();
        } else {
            die("Error: " . $this->link->errno . " " . $this->link->error);
        }
    }

    public function delete($query) {
        $delete_row = $this->link->query($query) or die($this->link->error.__LINE__);

        // Validate insert
        if($delete_row) {
            header("Location:index.php?msg=".urlencode(("Record deleted")));
            exit();
        } else {
            die("Error: " . $this->link->errno . " " . $this->link->error);
        }
    }
}