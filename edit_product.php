<?php 
  require_once("header.php"); 
  require("connection.php");

  $idProductExists = array_key_exists("id_product", $_GET);
  $productID = 0;
  if ($idProductExists) {
      $productID = intval($_GET['id_product']);
      }

  $result = $pdo->query("SELECT * FROM products WHERE id_product = $productID");
  $product = $result->fetch(PDO::FETCH_ASSOC);

  echo '<h1 class="ui container">' . $product["name"] . '</h1>';

   if ($product === false){
    echo '<h2 class="ui container">This product does not exist.</h2>';
   } else {
    // Afficher le form
   }
?>

<div id="message" class="ui container"></div>

<form class="ui container form">
  <div class="field">
    <label>Name</label>
    <input type="text" name="name" placeholder="Name" value='<?php echo $product['name']; ?>'>
  </div>
  <div class="field">
    <label>Category</label>
    <input type="text" name="category" placeholder="Category" value="<?php echo $product['category']; ?>">
  </div>
  <div class="field">
    <label>Price</label>
    <input type="number" name="price" placeholder="Price" value="<?php echo $product['price']; ?>">
  </div>
  <div class="field">
    <label>Comment</label>
    <input type="text" name="comment" placeholder="Commment" value="<?php echo $product['comment']; ?>">
  </div>
  <button id="edit-product" class="ui button" type="submit">Submit</button>
</form>

<script type="text/javascript" src="edit_product.js"></script>

<?php require_once("footer.php"); ?>