<?php 
	require_once("header.php");
	require("connection.php");
?>

<div class="ui container">
  <table class="ui celled padded table">
    <thead>
      <tr><th class="single line">Product</th>
      <th>Category</th>
      <th>Price</th>
      <th>Comment</th>
      <th>More Infos</th></tr>
    </thead>
	 <?php
	  	foreach ($pdo->query("SELECT * FROM products ORDER by id_product DESC") as $product)
	    {
		    echo '
		    <tbody>
		      <tr>
		        <td>
		         <h2 class="ui center aligned header">' 
		          . $product['name'] . 
		        '</h2>
		        </td>
		        <td class="single line">' .
		          $product['category'] . '
		        </td>
		        <td>' .
		           $product['price'] . '€
		        </td>
		        <td>' .
					$product['comment'] . '
		        </td> 
		        <td class="right aligned"> ';
		          	echo "<a href='single_product.php?id_product={$product['id_product']}'>See</a>";
	        }
        ?>
        </td>
      </tr> 
    </tbody>
  </table>
</div>

<?php require_once("footer.php"); ?>

