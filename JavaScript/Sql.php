<?php
    Class Sql{
        public $conn = null;
        public function __construct(){             
            try {
                $this->conn = new PDO("mysql:dbname=clientdb444;host=den1.mysql2.gear.host","clientdb444",'11051998!');
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               
            } catch(PDOException $e) {
                echo 'ERROR: ' . $e->getMessage();
            }
        }
        
        private function setParams($statement, $parameters = array()){
            foreach ($parameters as $key => $value){
                $this->setParam($statement, $key, $value);
            }
        }

        private function setParam($statement,$key, $value){
            $statement->bindParam($key,$value);
        }

        public function query($rawQuery, $params = array()){
         
            $stmt = $this->conn->prepare($rawQuery);
            $this->setParams($stmt, $params);
            
            $stmt->execute();
           
            return $stmt;

        }

        public function select($rawQuery, $params = array()) : array{
            $stmt = $this->query($rawQuery, $params);
           
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }
    
        public function insertMotorista($id_motorista, $nome, $cpf, $dt_nascimento, $model_car, $ativo, $sexo){
            $this->query("INSERT INTO MOTORISTAS VALUES(:ID_MOTORISTA,:NOME,:CPF,:DT_NASCIMENTO,:MODEL_CAR,:ATIVO,:SEXO)",array(
                ":ID_MOTORISTA"=> $id_motorista,
                ":NOME"=>$nome,
                ":CPF"=>$cpf,
                ":DT_NASCIMENTO"=> $dt_nascimento,//YYYY-MM-DD
                ":MODEL_CAR"=>$model_car,
                ":ATIVO"=>$ativo,
                ":SEXO"=>$sexo   
            ));
        }
    }



?>