<?php
    function doesEmailExist($email) {
        require_once('db_repository.php');
        if (getUserByEmail($email)== NULL) {
            return false;
        }
        return true;
    }

    function authorizeUser($email, $pass) {
        require_once('db_repository.php');
        $user = getUserByEmail($email);
        if ($user == NULL || $user['password'] != $pass) {
            return NULL;
        }
        return $user['name'];
    }

    function addUser($data) {
        require_once('db_repository.php');
        storeUser($data);
    }
?>