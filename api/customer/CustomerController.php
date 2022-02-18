<?php

    require('CustomerService.php');

    class CustomerController {

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
            $customer_id = (int)$request_data['cusId'];
            $input_json = file_get_contents('php://input');
            $json_data = json_decode($input_json, true);

            if ($customer_id > 0) {
                return CustomerService::findById($customer_id);
            } else {
                if(!empty($json_data)){
                    return CustomerService::findByMultiindex($json_data);
                } else {
                    return CustomerService::findAll();
                }
            }
        }

        private static function postData($request_data) {
            $input_json = file_get_contents('php://input');
            $json_data = json_decode($input_json, true);
            return CustomerService::create($json_data);
        }

        private static function putData($request_data) {
            $customer_id = (int)$request_data['cusId'];
            $input_json = file_get_contents('php://input');
            $json_data = json_decode($input_json, true);

            if ($customer_id == 0) {
                return false;
            }
            
            return CustomerService::updateWithNull($customer_id, $json_data);
        }

        private static function patchData($request_data) {
            $customer_id = (int)$request_data['cusId'];
            $input_json = file_get_contents('php://input');
            $json_data = json_decode($input_json, true);
            
            if ($customer_id == 0) {
                return false;
            }
            return CustomerService::update($customer_id, $json_data);
        }

        private static function deleteData($request_data) {
            $customer_id = (int)$request_data['cusId'];
            if ($customer_id == 0) {
                return false;
            }
            return CustomerService::delete($customer_id);
        }
    }

?>