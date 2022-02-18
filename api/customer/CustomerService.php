<?php
    require("CustomerDao.php");


    class CustomerService {

        public static function findById($id){
            return CustomerDao::findById($id);
        }

        public static function findAll(){
            return CustomerDao::findAll();
        }

        public static function findByMultiindex($data){
            return CustomerDao::findByMultiindex($data);
        }

        public static function create($data){
            return CustomerDao::create($data);
        }

        public static function update($id, $data){
            return CustomerDao::update($id, $data);
        }

        public static function updateWithNull($id, $data){
            return CustomerDao::updateWithNull($id, $data);
        }

        public static function delete($id){
            return CustomerDao::delete($id);
        }
    }
?>