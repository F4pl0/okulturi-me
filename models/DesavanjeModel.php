<?php

class DesavanjeModel{

    public static function create($ime, $opis, $slika, $datetime, $kategorija) {
        require("helpers/db.php");

        if(isset($_SESSION['ID'])){
            $userID = $_SESSION['ID'];

            $target_dir = "uploads/";
            $imageFileType = strtolower(pathinfo($slika['name'],PATHINFO_EXTENSION));
            $target_file = $target_dir . DesavanjeModel::generateRandomString(40) . "." . $imageFileType;
            $uploadOk = 1;

            if (!move_uploaded_file($slika['tmp_name'], $target_file)) {
                return false;
            }

            $sql = "INSERT INTO desavanja (User_ID, Ime, Opis, Kategorija, Slika, Datetime) VALUES ('$userID', '$ime', '$opis', '$kategorija', '$target_file', '$datetime')";

            if ($db->query($sql) === TRUE) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function delete($id) {
        require("helpers/db.php");

        if(isset($_SESSION['ID'])){
            $userID = $_SESSION['ID'];
            
            $sql = "SELECT * FROM desavanja WHERE ID = '$id' AND User_ID = '$userID'";
            $result = $db->query($sql);
            if ($result->num_rows > 0) {
                $sql = "DELETE FROM desavanja WHERE ID = '$id'";
                if ($db->query($sql) === TRUE) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }

        } else {
            return false;
        }
    }

    public static function getAll() {
        require("helpers/db.php");

        $sql = "SELECT * FROM desavanja";
        $result = $db->query($sql);
        
        $desavanja = array();

        while($row = $result->fetch_assoc()) {
            array_push($desavanja, $row);
        }

        return json_encode($desavanja);
    }

    public static function getMy() {
        require("helpers/db.php");

        if(isset($_SESSION['ID'])){
            $userID = $_SESSION['ID'];

            $sql = "SELECT * FROM desavanja WHERE User_ID = '$userID'";
            $result = $db->query($sql);
            
            $desavanja = array();

            while($row = $result->fetch_assoc()) {
                array_push($desavanja, $row);
            }

            return json_encode($desavanja);
        } else {
            return false;
        }
    }

    public static function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}