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

function storeUser($email, $name, $password) {
    $conn = open_connection();
        
    $sql = "INSERT INTO users (email, name, password)
    VALUES ('$email', '$name', '$password')";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        return true;
    } else {
        $conn->close();
        return false;
    }
}

function getProductsByID($ids) {
    $conn = open_connection();
    
    $sql = "SELECT * FROM products WHERE id IN (";
    for($i=0; $i<count($ids);$i++) {
        $ending = $i==count($ids)-1 ? ')' : ',';
        $sql = $sql.$ids[$i].$ending;
    }
    
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

function createOrder($userId, $cartItems) {
    $conn = open_connection();
    //query for adding order
    $sql = "INSERT INTO orders (user_id) VALUES ($userId)";

    $result = $conn->query($sql);
    $orderId = mysqli_insert_id($conn);

    $productIds = array_keys($cartItems);
    if (empty($productIds)) {
        return NULL;
    }
    $products = getProductsByID($productIds); //currently opens another connection

    if ($products == NULL) {
        return NULL;
    }

    //SQL query for adding order items
    $sql = "INSERT INTO order_items (order_id, product_id, quantity, sale_price) VALUES ";
    //add each item to the query
    for($i=0; $i<count($products);$i++) {
        $quantity = $cartItems[$products[$i]['id']];
        $sale_price = $quantity * $products[$i]['price'];
        $ending = $i==count($cartItems)-1 ? ';' : ',';
        $sql = $sql. "($orderId, ".$products[$i]['id'].", ".$quantity.", ".$sale_price.")".$ending;
    }

    $result = $conn->query($sql);

    $conn->close();

    return $result;
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