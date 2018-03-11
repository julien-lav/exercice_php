  <?php 
    require_once("header.php"); 
    require("connection.php");

    $idProductExists = array_key_exists("id_product", $_GET);
    $productID = 0;

    if ($idProductExists) 
    {
      $productID = intval($_GET['id_product']);
    }

    $result = $pdo->query("SELECT * FROM products WHERE id_product = $productID");
    $product = $result->fetch(PDO::FETCH_ASSOC);
  ?>

  <?php
    if ($product === false)
    {
      echo '<h2 class="ui container">This product does not exist.</h2>';
    } else {
      echo "<div class='ui container'><a href='edit_product.php?id_product=" . $product['id_product'] . "'><h2>Edit/Admin</h2></a></div>" .
    '<div class="ui container">
      <table class="ui celled padded table">
        <thead>
          <tr><th class="single line">Product</th>
          <th>Category</th>
          <th>Price</th>
          <th>Comment</th> 
        </thead>
        <tbody>
          <tr>
            <td>
              <h2 class="ui center aligned header">' . $product['name'] . '</h2>
            </td>
            <td class="single line">'.  $product['category'] .'</td>
            <td>' . $product['price'] . '€ </td>
            <td>' . $product['comment'] . '</td>
            </tr>
          </tbody>
        </table>
      </div>';
    }
  ?>


  <?php require_once("footer.php"); ?>