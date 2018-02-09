<?php
    Class Sql{
        public $conn = null;
        public function __constructor(){             
            try {
                $this->conn = new PDO('oci:dbname=//clientdb.cmpow47aljad.us-east-2.rds.amazonaws.com:1521/xe/ORCL', 'sa', '11051998');
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo 'ERROR: ' . $e->getMessage();
            }
        }  
    }



?>