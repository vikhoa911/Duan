<?php
function dangky($email, $user, $password){
    $sql = "INSERT INTO taikhoan (email, user, pass) VALUES ('$email', '$user', '$password')";
    pdo_execute($sql);
}


?>