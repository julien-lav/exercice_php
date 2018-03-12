<?php

require("connection.php");
$mandatoryFields = array("id_product", "category", "name", "price", "comment");
foreach ($mandatoryFields as $field)
{
    if (!array_key_exists($field, $_REQUEST))
    {
        http_response_code(403);
        echo "Lacking parameter $field. Abort";
        die(); # -> Add a redirection 
    }
}

$productId = $pdo->quote(intval($_REQUEST['id_product']));
$price = $pdo->quote(intval($_REQUEST['price']));
$category= $pdo->quote($_REQUEST['category']);
$name = $pdo->quote($_REQUEST['name']);
$comment = $pdo->quote($_REQUEST['comment']);

$pdo
    ->query(
        "UPDATE products
            SET `category` = $category,
                `name` = $name,
                `price` = $price,
                `comment` = $comment
            WHERE id_product = $productId
        "
    )
;