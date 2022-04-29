<?php

//start a session
// session_start();


//create a key for hash_hmac function
if (empty($_SESSION['key'])) {
    $_SESSION['key'] = bin2hex(random_bytes(32));
}
//create CSRF token
$csrf = hash_hmac('sha256', 'hahaha', $_SESSION['key']);



//validate token
// if (isset($_POST['submit'])) {
//     if (hash_equals($csrf, $_POST['csrf'])) {
//         echo 'success';
//     } else
//         echo 'CSRF Token Failed!';
// }

?>