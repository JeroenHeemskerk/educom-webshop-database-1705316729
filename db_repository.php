 <?php
//================ functions ================

function getUserByEmail($email) {
    $conn = open_connection();
    
    $sql = "SELECT * FROM users WHERE email = '$email'";
    
    $result = $conn->query($sql);
    
    $conn->close();

    if ($result->num_rows > 0) {
        $row = $result -> fetch_assoc();
        return $row;
    } else {
        return NULL;
    }
}

function storeUser($data) {
    $conn = open_connection();
    
    $email = $data['email'];
    $name = $data['name'];
    $password = $data['pass'];
    $encrypted_password = password_hash($password, PASSWORD_BCRYPT, ['cost'=>14]);
    
    $sql = "INSERT INTO users (email, name, password)
    VALUES ('$email', '$name', '$encrypted_password')";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        return true;
    } else {
        $conn->close();
        return false;
    }
}

function getProductByID($id) {
    $conn = open_connection();
    
    $sql = "SELECT * FROM products WHERE id = $id";
    
    $result = $conn->query($sql);
    
    $conn->close();

    if ($result->num_rows > 0) {
        $row = $result -> fetch_assoc();
        return $row;
    } else {
        return NULL;
    }
}

function getAllProducts() {
    $conn = open_connection();

    $sql = 'SELECT * FROM products';

    $result = $conn->query($sql);
    
    $conn->close();

    if ($result->num_rows > 0) {
        $products = array();
        while ($row = $result -> fetch_assoc()) {
            array_push($products, $row);
        }
        return $products;
    } else {
        return NULL;
    }
}

function open_connection() {
    $servername = "localhost";
    $username = "thomas_webshop_user";
    $password = "didIturNoffThesToveBefoReil3fttHism0rniNg";
    $dbname = "thomas_webshop";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

?> 