<?php
    
    function webshopHeader() {
        $header = 'Webshop Pagina';
        return $header;
    }

    function showWebshopContent() {
        require_once('user_service.php');
        $products = getProductList();
        
        echo '<table>' . PHP_EOL;
        echo '<tr>' . PHP_EOL;
        echo '    <th>ID</th>' . PHP_EOL;
        echo '    <th>Name</th>' . PHP_EOL;
        echo '    <th>Price</th>' . PHP_EOL;
        echo '    <th>Image</th>' . PHP_EOL;
        echo '</tr>' . PHP_EOL;
        foreach ($products as &$product) {
            echo '<tr>' . PHP_EOL;
            echo "    <td><a href='index.php?page=detail&productid=".$product['id']."'>".$product['id']."</a></td>" . PHP_EOL;
            echo "    <td>".$product['name']."</td>" . PHP_EOL;
            echo "    <td>$".$product['price']."</td>" . PHP_EOL;
            echo "    <td>".$product['img_filename']."</td>" . PHP_EOL;
            echo '</tr>' . PHP_EOL;
        }
        echo '</table>'. PHP_EOL;
    }

?>
