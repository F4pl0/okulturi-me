<?php

if(isset($_POST['email'])
&& isset($_POST['pass'])){

    if( UserModel::verify($_POST['email'], $_POST['pass'])) {

        header("HTTP/1.0 200");
        $response['success'] = true;
        $response['message'] = "Successfully Logged In";
        echo json_encode($response);
        
    } else {
        header("HTTP/1.0 401");
    }
}else{
header("HTTP/1.0 401");
}