<?php

if(isset($_POST['kurac'])){
    echo $_POST['kurac'];
}else{
    header("HTTP/1.0 400");
}