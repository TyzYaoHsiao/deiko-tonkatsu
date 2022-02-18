<?php
    require("../config/DBConnect.php");

    class CouponDao {

        public static function findById($id){
            $sql = "SELECT * FROM coupon WHERE id = " . $id;
            $statement = $GLOBALS['dbConnection']->query($sql);
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }

        public static function findAll(){
            $sql = "SELECT * FROM coupon";
            $statement = $GLOBALS['dbConnection']->query($sql);
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }

        public static function findByMultiindex($data){
            $sql = "SELECT * 
                    FROM coupon
                    WHERE 1 = 1 ";
            
            if (!empty($data['name'])){
                $sql = $sql . " AND name = '" . $data['name'] . "'";
            }
            if (!empty($data['description'])){
                $sql = $sql . " AND description = '" . $data['description'] . "'";
            }
            if (!empty($data['status'])){
                $sql = $sql . " AND status = '" . $data['status'] . "'";
            }
            if (!empty($data['start_dt'])){
                $sql = $sql . " AND start_dt = '" . $data['start_dt'] . "'";
            }
            if (!empty($data['end_dt'])){
                $sql = $sql . " AND end_dt = '" . $data['end_dt'] . "'";
            }

            $statement = $GLOBALS['dbConnection']->query($sql);
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }

        public static function create($data){
            $sql = " INSERT INTO coupon (name, description, status, start_dt, end_dt) VALUES (" 
                . "'" . ($data['name'] ?? "NULL") . "', "
                . "'" . ($data['description'] ?? "NULL") . "', "
                . "'" . ($data['status'] ?? "NULL") . "', "
                . "'" . ($data['start_dt'] ?? "NULL") . "', "
                . "'" . ($data['end_dt'] ?? "NULL") . "' ) ";

            $GLOBALS['dbConnection']->exec($sql);
            $result = true;
            return $result;
        }

        public static function update($id, $data){
            $sql = " UPDATE coupon " .
                   " SET ID = " . $id;

            if (!empty($data['name'])){
                $sql = $sql . " ,name = '" . $data['name'] . "'";
            }
            if (!empty($data['description'])){
                $sql = $sql . " ,description = '" . $data['description'] . "'";
            }
            if (!empty($data['status'])){
                $sql = $sql . " ,status = '" . $data['status'] . "'";
            }
            if (!empty($data['start_dt'])){
                $sql = $sql . " ,start_dt = '" . $data['start_dt'] . "'";
            }
            if (!empty($data['end_dt'])){
                $sql = $sql . " ,end_dt = '" . $data['end_dt'] . "'";
            }

            $sql = $sql . " WHERE ID = " . $id;

            $GLOBALS['dbConnection']->exec($sql);
            echo $sql;
            $result = true;
            return $result;
        }

        public static function updateWithNull($id, $data){
            $sql = " UPDATE coupon " .
                   " SET name = '" . ($data['name'] ?? "NULL") . "'" .
                   "    ,description = '" . ($data['description'] ?? "NULL") . "'" .
                   "    ,status = '" . ($data['status'] ?? "NULL") . "'" .
                   "    ,start_dt = '" . ($data['start_dt'] ?? "NULL") . "'" .
                   "    ,end_dt = '" . ($data['end_dt'] ?? "NULL") . "'" .
                   " WHERE ID = " . $id;
            $GLOBALS['dbConnection']->exec($sql);
            $result = true;
            return $result;
        }

        public static function delete($id){
            $sql = "DELETE FROM coupon WHERE id = " . $id;
            $GLOBALS['dbConnection']->exec($sql);
            $result = true;
            return $result;
        }
    }
?>