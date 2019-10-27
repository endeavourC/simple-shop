<?php
require_once('views/header.php');
if(!isset($_SESSION['is_logged'])){
    header("Location: login.php");
};
$title="Kategorie";
require_once('module/Products.php');
function print_categories(){
    $cat = new Products;
    $categories = $cat->get_all_categories();
    foreach($categories as $category){ ?>
        <option value="<?php echo htmlspecialchars($category['id']);?>"><?php echo htmlspecialchars($category['name']); ?></option>
    <?php };
}

?>
   <div class="container flex flex-justify-center flex-align-center" style="min-height:85vh;">
    <div class="col-4 col-sm-12 m-2">
        <h2 class="mt-2 mb-5 light text-center">Dodawanie Kategorii</h2>
        <form class="col-12 flex flex-col" name="add_category" action="module/categories.php" method="post">
           <input type="hidden" name="add_category">
            <input type="text" name="add_category_name" class="input" placeholder="Nazwa Kategorii">
            <input type="submit" value="Dodaj" class="mt-4 btn bg-primary white">
        </form>
    </div>
    <div class="col-4 col-sm-12 m-2">
        <h2 class="mt-2 mb-5 light text-center">Edycja Kategorii</h2>
         <form class="col-12 flex flex-col" name="edit_category" action="module/categories.php" method="post">
           <input type="hidden" name="edit_category">
            <select name="edit_categories">
                <?php
                    print_categories();
                ?>
            </select>
            <input type="text" name="edit_category_name" class="input" placeholder="Nowa nazwa">
            <input type="submit" value="Edytuj" class="mt-4 btn bg-primary white">
        </form>
    </div>
    <div class="col-4 col-sm-12 m-2">
        <h2 class="mt-2 mb-5 light text-center">Usuwanie kategorii</h2>
         <form class="col-12 flex flex-col" name="delete_category" action="module/categories.php" method="post">
           <input type="hidden" name="delete_category">
            <select name="delete_categories">
                <?php
                    print_categories();
                ?>
            </select>
            <input type="submit" value="Usuń" class="mt-4 btn bg-primary white">
        </form>    
    </div>
</div>
<?php
require_once('views/footer.php');

   
