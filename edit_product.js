jQuery(
    function ($)
    {
        var $submitButton = $("#edit-product");
        var urlParams = new URLSearchParams(window.location.search);
        
        $submitButton
            .click(
                function (e)
                {
                    var $target = $(this);
                    var $message = $("#message")
                    var $form = $target.closest('form');
                    var productName = $form.find('input[name="name"]').val();
                    var productCategory = $form.find('input[name="category"]').val();
                    var productPrice = $form.find('input[name="price"]').val();
                    var productComment = $form.find('input[name="comment"]').val();
                    e.preventDefault();
                    $
                        .ajax(
                            "ajax_product.php",
                            {
                                data: {
                                    id_product: urlParams.get("id_product"),
                                    name: productName,
                                    category: productCategory,
                                    price: productPrice,
                                    comment: productComment
                                }
                            }
                        )
                        .done(() => $message.addClass("ui green message").text("Update succeeded"))
                        .fail(() => $message.addClass("ui green message").text("Update Failed misérablement !"))
                        .always(() => console.log("always"))
                    ;
                                        
                }
            )
        ;
    }
);
