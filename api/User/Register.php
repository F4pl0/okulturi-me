<?php

if(isset($_POST['imePrezime'])
&& isset($_POST['email'])
&& isset($_POST['pass'])){
    
    if( UserModel::create($_POST['imePrezime'], $_POST['email'], $_POST['pass']) ) {

        header("HTTP/1.0 201");
        $response['success'] = true;
        $response['message'] = "User Successfully Registered";
        echo json_encode($response);
        
    } else {
        header("HTTP/1.0 400");
    }
}else{
    header("HTTP/1.0 400");
}