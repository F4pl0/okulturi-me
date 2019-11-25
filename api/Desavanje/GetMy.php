<?php
if ($_SESSION['ID']) {
    header("HTTP/1.0 200");
    echo DesavanjeModel::getMy();
} else {
    header("HTTP/1.0 401");
    $response['success'] = false;
    $response['message'] = "Not Logged in";
    echo json_encode($response);
}