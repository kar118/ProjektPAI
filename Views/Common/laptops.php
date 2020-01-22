<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/projekt/Models/Database.php';
    $db = new Database('localhost','project','root','');
    $conn = $db->getConn();
    $details = $conn->prepare('SELECT details.description, product.product_id, product.amount FROM product INNER JOIN category ON product.category_id = category.category_id INNER JOIN details ON product.category_id = category.category_id AND product.details_id = details.details_id AND category.name = "Laptop" AND product.amount > 0');
    $details->execute();
    // $details = $conn->prepare('SELECT details.description, product.product_id, product.amount FROM product,category,details WHERE product.category_id = category.category_id AND product.details_id = details.details_id AND category.name = "Laptop" AND product.amount > 0');

?>
<?php foreach($details as $tmp){ ?>
    <?php $row = json_decode($tmp[0],true);?>
        <div class="row no-gutters bg-light position-relative my-4">
            <div class="col-md-4">
                <img src="<?= 'Public/img/Laptops/'.$row['MARK'].$row['MODEL'].'/1.jpg' ?>" class="img-fluid" alt="...">
            </div>
            <div class="col-md-8 pt-3 px-3 position-static pl-md-0">
                <table class="table">
                <tbody>
                    <tr>
                    <td>Product</td>
                    <td> <?= $row['MARK'].' '.$row['MODEL'] ?></td>
                    </tr>
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
                    <td><?= $row['SCREEN'] ?>'</td>
                    </tr>
                    <tr>
                    <td>Resolution</td>
                    <td><?= $row['RESOLUTION'] ?></td>
                    </tr>
                </tbody>
                </table>
                <button class="btn btn-info float-right mb-2"><a href="?page=confirmation&device=<?=$tmp[1]?>&amount=<?=$tmp[2]?>">Order</a></button>
            </div>
        </div>
<?php } ?>