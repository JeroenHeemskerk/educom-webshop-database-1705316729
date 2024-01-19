<?php
    function doesEmailExist($email) {
        require_once('db_repository.php');
        return !empty(getUserByEmail($email));
    }

    function authorizeUser($email, $pass) {
        require_once('db_repository.php');
        $user = getUserByEmail($email);
        if ($user == NULL || !password_verify($pass, $user['password'])) {
            return NULL;
        }
        return $user;
    }

    function addUser($data) {
        require_once('db_repository.php');
        $encrypted_password = password_hash($data['pass'], PASSWORD_BCRYPT, ['cost'=>14]);
        storeUser($data['email'], $data['name'], $encrypted_password);
    }
    function getProducts($ids) {
        require_once('db_repository.php');
        return getProductsByID($ids);
    }

    function getProductList() {
        require_once('db_repository.php');
        return getAllProducts();
    }

    function placeOrder($userId, $cartItems) {
        require_once('db_repository.php');
        createOrder($userId, $cartItems);
    }
?>