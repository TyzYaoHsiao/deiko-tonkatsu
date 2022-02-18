<?php
    require("CouponDao.php");


    class CouponService {

        public static function findById($id){
            return CouponDao::findById($id);
        }

        public static function findAll(){
            return CouponDao::findAll();
        }

        public static function findByMultiindex($data){
            return CouponDao::findByMultiindex($data);
        }

        public static function create($data){
            return CouponDao::create($data);
        }

        public static function update($id, $data){
            return CouponDao::update($id, $data);
        }

        public static function updateWithNull($id, $data){
            return CouponDao::updateWithNull($id, $data);
        }

        public static function delete($id){
            return CouponDao::delete($id);
        }
    }
?>