<?php

    require('CouponService.php');

    class CouponController {

        private static $method_type = array('get', 'post', 'put', 'patch', 'delete');

        public static function execute() {
            $method = strtolower($_SERVER['REQUEST_METHOD']);
            if (in_array($method, self::$method_type)) {
                $data_name = $method . 'Data';
                return self::$data_name($_REQUEST);
            }
            return false;
        }
        
        private static function getData($request_data) {
            $coupn_id = (int)$request_data['couponId'];
            $input_json = file_get_contents('php://input');
            $json_data = json_decode($input_json, true);

            if ($coupn_id > 0) {
                return CouponService::findById($coupn_id);
            } else {
                if(!empty($json_data)){
                    return CouponService::findByMultiindex($json_data);
                } else {
                    return CouponService::findAll();
                }
            }
        }

        private static function postData($request_data) {
            $input_json = file_get_contents('php://input');
            $json_data = json_decode($input_json, true);
            return CouponService::create($json_data);
        }

        private static function putData($request_data) {
            $coupn_id = (int)$request_data['couponId'];
            $input_json = file_get_contents('php://input');
            $json_data = json_decode($input_json, true);

            if ($coupn_id == 0) {
                return false;
            }
            
            return CouponService::updateWithNull($coupn_id, $json_data);
        }

        private static function patchData($request_data) {
            $coupn_id = (int)$request_data['couponId'];
            $input_json = file_get_contents('php://input');
            $json_data = json_decode($input_json, true);
            
            if ($coupn_id == 0) {
                return false;
            }
            return CouponService::update($coupn_id, $json_data);
        }

        private static function deleteData($request_data) {
            $coupn_id = (int)$request_data['couponId'];
            if ($coupn_id == 0) {
                return false;
            }
            return CouponService::delete($coupn_id);
        }
    }

?>