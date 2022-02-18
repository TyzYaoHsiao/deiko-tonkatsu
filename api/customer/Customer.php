<?php

    require('CustomerController.php');
    require('../common/Response.php');

    $data = CustomerController::execute();
    Response::sendResponse($data);

?>