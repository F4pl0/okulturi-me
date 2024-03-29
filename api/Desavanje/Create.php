<?php
if(isset($_SESSION['ID'])){

    if(isset($_POST['ime'])
    && isset($_POST['opis'])
    && isset($_FILES['slika'])
    && isset($_POST['datetime'])
    && isset($_POST['kategorija'])){

        if( DesavanjeModel::create(
                            $_POST['ime'],
                            $_POST['opis'],
                            $_FILES['slika'],
                            $_POST['datetime'],
                            $_POST['kategorija']
                            )) {

            header("HTTP/1.0 200");
            $response['success'] = true;
            $response['message'] = "Dogadjaj added";
            echo json_encode($response);
        } else {
            header("HTTP/1.0 500");
            $response['success'] = false;
            $response['message'] = "Some random server error geeks won't fix so soon";
            echo json_encode($response);
        }
    } else {
        header("HTTP/1.0 400");
        $response['success'] = false;
        $response['message'] = "Check POST Parameters";
        echo json_encode($response);
    }
} else {
    header("HTTP/1.0 401");
    $response['success'] = false;
    $response['message'] = "Not Logged in";
    echo json_encode($response);
}