<?php 
function ft_get_products_by_cat() 
{
    $con = mysqli_connect("127.0.0.1", "root", "root", "shop");
    if (isset($_GET['cat']) && $_GET['cat'] != 'all')
        $query_products = "SELECT * FROM products WHERE cat='" . $_GET['cat'] . "'";
    else
        $query_products = "SELECT * FROM products";
    $result = $con->query($query_products);
    while ($row_product = mysqli_fetch_array($result))
    {
        $product_id = $row_product['id'];
        $product_name = $row_product['name'];
        $product_price = $row_product['price'];
        $product_stock = $row_product['stock'];
        $product_img = $row_product['img'];
        $product_cat = $row_product['cat'];
        echo "<div id = periodic-row>";
        echo "
        <div id='product'>
            <div class='cell'>
            <h3>$product_name</h3>
            <a href='products.php?cat=all'>
            <img src='$product_img' height='150' />
            </a>
            <h3>$product_price $</h3>
            <form action='checkout.php' method='post'>
                <input type='text' name='quantity' value='1'/>
                <input type='submit' name='trash' value='Discount ! - Add to cart'/>
                <input type='hidden' name='product_id' value='$product_id'/>
            </form>
            </div>
        </div>
        ";
        echo "</div>";
    }
}
?>