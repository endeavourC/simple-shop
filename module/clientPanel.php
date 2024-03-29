<?php
require_once('Products.php');
$products = new Products;
$all_products;
if(isset($_GET['category'])){
    $save_url = strip_tags($_GET['category']);
        $all_products = $products->get_product_in_category($save_url);
} else {
    $all_products =  $products->get_all_products();
}
$cart = isset($_SESSION['cart'])? $_SESSION['cart'] :array();
if(isset($_GET['add-to-cart'])){
    $currentProduct = $products->get_single_product($_GET['add-to-cart']);
    $token = md5(uniqid(rand(), true));
    $product = array(
        'token' => $token,
        'id' => $currentProduct['id'],
        'name' => $currentProduct['name'],
        'price' => $currentProduct['price'],
        'src' => $currentProduct['src_img'],
        'alt' => $currentProduct['alt_img']
    );
    array_push($cart, $product);   
    $_SESSION['cart'] = $cart;
}

?>
 <?php
        if(isset($_GET['add-to-cart']))
        {
            echo '<p class="text-center mt-2 display-1">Dodano do koszyka!</p>';
        }
    ?>
<div class="container flex flex-wrap">

    <div class="col-3 col-sm-12">
        <button class="single-col-btn btn bg-primary white mt-5">1 kolumna</button>
        <button class="double-col-btn btn bg-primary white mt-5">2 kolumny</button>
        <ul  class="bg-grey white mt-12" >
        <?php
            $all_categories = $products->get_all_categories(); 
            foreach($all_categories as $single_category){?>
                <li><a class="link primary p-2 block" href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']).'?category='.$single_category['name'];?>"><?php echo $single_category['name'];?></a></li>
            <?php };
        ?>
        </ul>
    </div>
    <div class="col-9 flex flex-wrap">
   
    <?php
        if(count($all_products) == 0) { ?>
             <div class="col-6 col-sm-12 col-md-4 flex flex-col flex-align-center p-5">
                <p class="lead">Nie znaleźlismy produktów.</p>
            </div>

        <?php } else {

        foreach($all_products as $product){?>
            <div style="transition:.4s;" class="single-product col-6 col-sm-12 col-md-4 flex flex-col flex-align-center p-5">
                <img src="<?php echo $product['src_img']?>" class="col-sm-12 col-6 col-md-6" alt="<?php echo $product['alt_img'];?>">
                <span class="text-center secondary pt-2"><?php
                    $category = $products -> get_category_name($product['id_category']);
                    echo $category;
                ?></span>
                <h3 class="text-center  display-2"><?php echo $product['name'];?></h3>
                <p style="font-size:16px;" class="lead text-center"><?php echo $product['description']; ?></p>
                <p style="font-size:24px; "class="text-center primary mt-3"><?php echo $product['price']; ?> zł</p>
                <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF'].'?add-to-cart='.$product['id'])?>" class="add_to_cart_btn link btn bg-primary white text-center mt-2">Dodaj do koszyka</a>
            </div>
        <?php };
        };

    ?>
    </div>
</div>