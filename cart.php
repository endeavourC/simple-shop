<?php
$title="Logowanie";
require_once('views/header.php');
if(!isset($_SESSION['is_logged'])){
    header("Location: login.php");
};
if(isset($_GET['delete'])){
    $key = array_search($_GET['delete'],$_SESSION['cart']);
    array_splice($_SESSION['cart'], $key, 1);
}
?>
<div class="container flex flex-col flex-align-center flex-justify-center mt-5 mb-5">
    <table>
        <tr>
            <th>Usuwanie</th>
            <th>Zdjęcie produktu</th>
            <th>Nazwa produktu</th>
            <th>Cena produktu</th>
        </tr>
        <?php
        if(count($_SESSION['cart']) > 0){
            $sum = array();
            foreach($_SESSION['cart'] as $singleCart){
                    array_push($sum, $singleCart['price']);
                ?>
                <tr >
                    <td class="col-3 mx text-center">
                        <a href="cart.php?delete=<?= $singleCart['token'];?>" class="col-4  link btn bg-primary white">Usuń</a>
                    </td>
                    <td class="col-3 text-center"><img class="col-4" src="<?= $singleCart['src']?>" alt="<?= $singleCart['alt']?>"></td>
                    <td class="col-3 text-center"><?= $singleCart['name'];?></td>
                    <td class="col-3 text-center"><?= $singleCart['price'];?> zł</td>
               
                </tr>
            <?php };
        } else {
            echo '<p class="text-center">Koszyk jest pusty</p>';
        }

        ?>
    </table>
    <p class="lead col-9" style="text-align:right;">Suma: <?= isset($_SESSION['cart']) && count($_SESSION['cart']) > 0 ? array_sum($sum) : '0'?> zł</p>
</div>
<?php
require_once('views/footer.php');
