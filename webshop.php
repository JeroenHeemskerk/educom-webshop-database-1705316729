<?php
    
    function webshopHeader() {
        $header = 'Appel Store';
        return $header;
    }

    function showWebshopContent() {
        require_once('user_service.php');
        $products = getProductList();
        
        echo '<table>' . PHP_EOL;
        echo '<tr>' . PHP_EOL;
        echo '    <th>ID</th>' . PHP_EOL;
        echo '    <th>Name</th>' . PHP_EOL;
        if (isUserLoggedIn()) {
            echo '    <th></th>' . PHP_EOL; //column for buttons to add items to cart
        }
        echo '    <th>Price</th>' . PHP_EOL;
        echo '    <th>Image</th>' . PHP_EOL;
        echo '</tr>' . PHP_EOL;
        foreach ($products as $product) {
            echo '<tr>' . PHP_EOL;
            echo "    <td>".$product['id']."</td>" . PHP_EOL;
            echo "    <td><a class='webshop_link' href='index.php?page=detail&productId=".$product['id']."'>".$product['name']."</a></td>" . PHP_EOL;
            if (isUserLoggedIn()) {
                echo '    <td>';
                showAddToCartForm('webshop', $product['id']);
                echo '    </td>' . PHP_EOL;
            }
            echo "    <td>$".$product['price']."</td>" . PHP_EOL;
            echo "    <td><img class='webshop_img' src='Images/".$product['img_filename']."'></td>" . PHP_EOL;
            echo '</tr>' . PHP_EOL;
        }
        echo '</table>'. PHP_EOL;
    }
?>
