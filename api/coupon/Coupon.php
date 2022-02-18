<?php

    require('CouponController.php');
    require('../common/Response.php');

    $data = CouponController::execute();
    Response::sendResponse($data);

?>