<?php

if(isset($_POST['lastPass'])
&& isset($_POST['newPass'])){

    if( UserModel::changePassword($_POST['lastPass'], $_POST['newPass'])) {

        header("HTTP/1.0 200");
        $response['success'] = true;
        $response['message'] = "Password Successfully Changed";
        echo json_encode($response);
    } else {
        header("HTTP/1.0 401");
        $response['success'] = false;
        $response['message'] = "Current password is not correct";
        echo json_encode($response);
    }
}else{
header("HTTP/1.0 400");
$response['success'] = false;
$response['message'] = "Check POST Parameters";
echo json_encode($response);
}