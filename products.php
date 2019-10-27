<?php
$title="Produkty";
require_once('views/header.php');
if(!isset($_SESSION['is_logged'])){
    header("Location: login.php");
};
function print_categories(){
    $cat = new Products;
    $categories = $cat->get_all_categories();
    foreach($categories as $category){ ?>
        <option value="<?php echo htmlspecialchars($category['id']);?>"><?php echo htmlspecialchars($category['name']); ?></option>
<?php };
}

require_once('module/Products.php');

?>
    <div class="container mt-3 flex">
        <h2>Dodaj produkty</h2>
        <a class="link btn bg-primary white ml-2" href="products.php?action=add">Dodaj</a>
    </div> 
      <?php
        if(isset($_POST['add_product_form'])){
            $dir_name = "uploads/";
            if(is_uploaded_file($_FILES['src_img']['tmp_name'])){
                move_uploaded_file($_FILES['src_img']['tmp_name'],  $dir_name.$_FILES['src_img']['name']); 
            }
            $file = strlen($_FILES['src_img']['name']) == 0 ? "no-img.jpg": $_FILES['src_img']['name'];
            $data = array(
                "name" => $_POST['product_name'],
                "desc" => $_POST['product_desc'],
                "price" => $_POST['product_price'],
                "category_id" => $_POST['product_cat'],
                "src_img" => "uploads/".$file,
                "alt_img" => $_POST['alt_img']
            );
            $addproduct = new Products;
            $addproduct->add_product($data);
            header("Location: products.php");
        }
        if(isset($_POST['edit_product_form'])){
            $dir_name = "uploads/";
            if(is_uploaded_file($_FILES['src_img']['tmp_name'])){
                move_uploaded_file($_FILES['src_img']['tmp_name'],  $dir_name.$_FILES['src_img']['name']); 
            }
            $file = strlen($_FILES['src_img']['name']) == 0 ? "no-img.jpg": $_FILES['src_img']['name'];
            
            $data = array(
                "name" => $_POST['product_name'],
                "desc" => $_POST['product_desc'],
                "price" => $_POST['product_price'],
                "category_id" => $_POST['product_cat'],
                "src_img" => "uploads/".$file,
                "alt_img" => $_POST['alt_img']
            );
            $edit_products = new Products;
            $edit_products->edit_product($_POST['product_id'], $data);
            header("Location: products.php");
        }
        
        if(isset($_GET['action']) && $_GET['action'] == "remove"){
            $delete_products = new Products;
            $delete_products->delete_product($_GET['id']);
            header("Location: products.php");
        }
        if(isset($_GET['action']) && $_GET['action'] == "add"){ 
            
            ?>
            <div class="mt-5 mb-5 container col-12 flex flex-justify-center">
                <form action="products.php" method="POST" class="flex flex-col col-6" enctype="multipart/form-data">
                <input type="hidden" name="add_product_form">
                <input type="text"  class="input mt-2" name="product_name" placeholder="Nazwa produktu">
                <textarea class="mt-2 input" placeholder="Opis produktu" name="product_desc" id=""></textarea>
                <input name="product_price" class="input mt-2" type="number" step="0.01" placeholder="Cena">
                <select class="mt-2 " name="product_cat">
                    <?php
                        print_categories();         
                    ?>
                </select>
                <input type="file" name="src_img" class="mt-2">
                <input type="text" class="input mt-2" name="alt_img" placeholder="Alt img">
                <input type="submit" value="Dodaj produkt" class="btn bg-primary white mt-2">
                </form>
            </div>
            <?php } elseif(isset($_GET['action']) && $_GET['action'] == "edit"){
                $editedData = new Products;
                $editedData = $editedData->get_single_product($_GET['id']);
            ?>
            <div class="mt-5 mb-5 container col-12 flex flex-justify-center">
                <form action="products.php" method="POST" class="flex flex-col col-6" enctype="multipart/form-data">
                <input type="hidden" name="product_id" value="<?php echo $_GET['id']?>">
                <input type="hidden" name="edit_product_form">
                <input type="text"  class="input mt-2" name="product_name" placeholder="Nazwa produktu" value="<?php echo htmlspecialchars($editedData['name']); ?>">
                <textarea class="mt-2 input" placeholder="Opis produktu" name="product_desc" id=""><?php echo htmlspecialchars($editedData['description']);?></textarea>
                <input name="product_price" class="input mt-2" type="number" step="0.01" placeholder="Cena" value="<?php echo $editedData['price'];?>">
                <select class="mt-2 " name="product_cat">
                    <?php
                        print_categories();         
                    ?>
                </select>
                <input type="file" name="src_img" class="mt-2">
                <input type="text" class="input mt-2" name="alt_img" placeholder="Alt img" value="<?php echo htmlspecialchars($editedData['alt_img']); ?>">
                <input type="submit" value="Edytuj produkt" class="btn bg-primary white mt-2">
                </form>
            </div>
        <?php } else { ?>
             <div class="container flex flex-wrap flex-justify-center flex-align-center">
        <?php
            $products = new Products;
            $products = $products->get_all_products();
            foreach($products as $product){ ?>
                <div class="col-4 col-sm-12 m-2 flex flex-col flex-align-center">
                    <img class="col-6" src="<?php echo $product['src_img']; ?>" alt="<?php echo $product['alt_img'];?>">
                    <h3 class="text-center mt-2 display-2 light"><?php echo $product['name']; ?></h3>
                    <p class="text-center lead mt-2"><?php echo $product['price']; ?> zł</p>
                    <div class="col-12 flex mt-2 flex-justify-center">
                    <a href="products.php?action=remove&id=<?php echo $product['id']; ?>" class="btn bg-primary white link mr-2">Usuń</a> 
                    <a href="products.php?action=edit&id=<?php echo $product['id']; ?>" class="btn bg-primary white link ">Edytuj</a>
                    </div>
                </div>
            <?php };
                 ?>
               </div>
        <?php };
    ?>
<?php
require_once('views/footer.php');

   
