 <?php
// $servername = "localhost";
// $username = "thomas_webshop_user";
// $password = "didIturNoffThesToveBefoReil3fttHism0rniNg";
// $dbname = "thomas_webshop";

// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
// if ($conn->connect_error) {
  // die("Connection failed: " . $conn->connect_error);
// }

// $email = '"test@example.com"';
// $sql = "SELECT * FROM users WHERE email = $email";

// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
  // output data of each row
  // while($row = $result->fetch_assoc()) {
    // echo "Email: " . $row["email"]. " - Name: " . $row["name"]. " - Password: " . $row["password"]. "<br>";
  // }
// } else {
  // echo "0 results";
// }
// $conn->close();

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