<?php


class UserModel
{
    public static function create($imePrezime, $email, $pass)
    {
        require("helpers/db.php");

        $pass = md5($pass);
        $sql = "INSERT INTO users (ImePrezime, Email, Pass) VALUES ('$imePrezime', '$email', '$pass')";

        if ($db->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public static function changeName($imePrezime)
    {
        require("helpers/db.php");
        
        if (isset($_SESSION['ID'])){
            $userID = $_SESSION['ID'];
            $sql = "UPDATE users SET ImePrezime='$imePrezime' WHERE ID=$userID";

            if ($db->query($sql) === TRUE) {
                $_SESSION['imePrezime'] = $imePrezime;
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function changePassword($lastPass, $newPass)
    {
        require("helpers/db.php");

        $lastPass = md5($lastPass);
        $newPass = md5($newPass);

        if (isset($_SESSION['ID'])){
            $userID = $_SESSION['ID'];
            $sql = "SELECT * FROM users WHERE ID = '$userID' and Pass = '$lastPass'";

            $result = mysqli_query($db,$sql);
            $count = mysqli_num_rows($result);  
    
            if($count == 1) {
                $sql = "UPDATE users SET Pass='$newPass' WHERE ID=$userID";

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

    public static function verify($email, $pass)
    {
        require("helpers/db.php");

        $pass = md5($pass);
        $sql = "SELECT * FROM users WHERE Email = '$email' and Pass = '$pass'";

        echo $sql;

        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $count = mysqli_num_rows($result);

        if($count == 1) {
            $_SESSION['ID'] = $row['ID'];
            $_SESSION['ImePrezime'] = $row['ImePrezime'];
            $_SESSION['Email'] = $row['Email'];
            return true;
        } else {
            return false;
        }
    }
}