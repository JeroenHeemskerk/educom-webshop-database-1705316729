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
        if ($user == NULL || !password_verify($pass, $user['password'])) {
            return NULL;
        }
        return $user['name'];
    }

    function addUser($data) {
        require_once('db_repository.php');
        storeUser($data);
    }
    function getProduct($id) {
        require_once('db_repository.php');
        return getProductByID($id);
    }

    function getProductList() {
        require_once('db_repository.php');
        return getAllProducts();
    }
?>