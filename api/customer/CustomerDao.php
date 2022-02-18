<?php
    require("../config/DBConnect.php");

    class CustomerDao {

        public static function findById($id){
            $sql = "SELECT * FROM customer WHERE id = " . $id;
            $statement = $GLOBALS['dbConnection']->query($sql);
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }

        public static function findAll(){
            $sql = "SELECT * FROM customer";
            $statement = $GLOBALS['dbConnection']->query($sql);
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }

        public static function findByMultiindex($data){
            $sql = " SELECT * 
                     FROM customer
                     WHERE 1 = 1 ";
            
            if (!empty($data['email'])){
                $sql = $sql . " AND email = '" . $data['email'] . "'";
            }
            if (!empty($data['password'])){
                $sql = $sql . " AND password = '" . $data['password'] . "'";
            }
            if (!empty($data['name'])){
                $sql = $sql . " AND name = '" . $data['name'] . "'";
            }

            $statement = $GLOBALS['dbConnection']->query($sql);
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }

        public static function create($data){
            $sql = " INSERT INTO customer (email, password) VALUES ('" . $data['email'] . "', '" . $data['password'] . "'); ";
            $GLOBALS['dbConnection']->exec($sql);
            $result = true;
            return $result;
        }

        public static function update($id, $data){
            $sql = " UPDATE customer " .
                   " SET ID = " . $id;

            if (!empty($data['email'])){
                $sql = $sql . " ,email = '" . $data['email'] . "'";
            }
            if (!empty($data['password'])){
                $sql = $sql . " ,password = '" . $data['password'] . "'";
            }
            if (!empty($data['name'])){
                $sql = $sql . " ,name = '" . $data['name'] . "'";
            }

            $sql = $sql . " WHERE ID = " . $id;

            $GLOBALS['dbConnection']->exec($sql);
            $result = true;
            return $result;
        }

        public static function updateWithNull($id, $data){
            $sql = " UPDATE customer " .
                   " SET email = '" . ($data['email'] ?? "NULL") . "'" .
                   "    ,password = '" . ($data['password'] ?? "NULL") . "'" .
                   "    ,name = '" . ($data['name'] ?? "NULL") . "'" .
                   " WHERE ID = " . $id;
            $GLOBALS['dbConnection']->exec($sql);
            $result = true;
            return $result;
        }

        public static function delete($id){
            $sql = " DELETE FROM customer WHERE id = " . $id;
            $GLOBALS['dbConnection']->exec($sql);
            $result = true;
            return $result;
        }
    }
?>