<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/projekt/Models/Database.php';
    $db = new Database('localhost','project','root','');
    $conn = $db->getConn();
    $details = $conn->prepare('SELECT details.description, product.product_id FROM product,category,details WHERE product.category_id = category.category_id AND product.details_id = details.details_id AND category.name = "Laptop"');
    $details->execute();
?>
<?php foreach($details as $tmp){ ?>
    <?php $row = json_decode($tmp[0],true);?>
        <div class="row no-gutters bg-light position-relative my-4">
            <div class="col-md-4">
                <img src="<?= 'Public/img/Laptops/'.$row['MARKA'].$row['MODEL'].'/1.jpg' ?>" class="" alt="...">
            </div>
            <div class="col-md-8 px-4 py-1 position-static pl-md-0">
                <table class="table">
                <h4><?= $row['MARKA'].' '.$row['MODEL'] ?></h4>
                <tbody>
                    <tr>
                    <td>Graphic card's Chipset</td>
                    <td><?= $row['GRAPHIC_CARD'] ?></td>
                    </tr>
                    <tr>
                    <td>RAM (installed)</td>
                    <td><?= $row['RAM'] ?></td>
                    </tr>
                    <tr>
                    <td>Processor</td>
                    <td><?= $row['CPU'] ?></td>
                    </tr>
                    <tr>
                    <td>Screen's diagonal</td>
                    <td><?= $row['PRZEKATNA_EKRANU'] ?>'</td>
                    </tr>
                    <tr>
                    <td>Resolution</td>
                    <td><?= $row['ROZDZIELCZOSC'] ?></td>
                    </tr>
                </tbody>
                </table>
                <button class="btn btn-info float-right m-1"><a href="?page=confirmation&device=<?=$tmp[1]?>">Order</a></button>
            </div>
        </div>
<?php } ?>