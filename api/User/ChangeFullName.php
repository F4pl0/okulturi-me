<?php

if(isset($_POST['imePrezime'])){

    if( UserModel::changeName($_POST['imePrezime'])) {

        header("HTTP/1.0 200");
        $response['success'] = true;
        $response['message'] = "Name Successfully Changed";
        $response['newName'] = $_SESSION['imePrezime'];
        echo json_encode($response);
    } else {
        header("HTTP/1.0 401");
        $response['success'] = false;
        $response['message'] = "Not Logged in";
        echo json_encode($response);
    }
}else{
header("HTTP/1.0 400");
$response['success'] = false;
$response['message'] = "Check POST Parameters";
echo json_encode($response);
}