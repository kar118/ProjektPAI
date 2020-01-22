<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/projekt/Models/Database.php';

    $db = new Database('localhost','project','root','');
    $conn = $db->getConn();
    $details = $conn->prepare('SELECT details.description, product.product_id, product.amount FROM product INNER JOIN category ON product.category_id = category.category_id INNER JOIN details ON product.details_id = details.details_id AND category.name = "Projector" AND product.amount > 0');
    $details->execute();
?>

<?php foreach($details as $tmp){ ?>
    <?php $row = json_decode($tmp[0],true);?>
    <div class="row no-gutters bg-light position-relative my-4">
    <div class="col-md-4">
        <img src="<?= 'Public/img/Projectors/'.$row['MARK'].$row['MODEL'].'/1.jpg' ?>" class="img-fluid pt-5" alt="...">
    </div>
    <div class="col-md-8 pt-3 px-3 position-static pl-md-0">
    
    
        <table class="table ">
        <tbody>
            <tr>
            <td>Product</td>
            <td> <?= $row['MARK'].' '.$row['MODEL'] ?></td>
            </tr>
            <tr>
            <td>Brightness</td>
            <td><?= $row['BRIGHTNESS'] ?>lm</td>
            </tr>
            <tr>
            <td>Image technology</td>
            <td><?= $row['TECHNOLOGIES'] ?></td>
            </tr>
            <tr>
            <td>WiFi</td>
            <td><?= $row['WIFI'] ?></td>
            </tr>
            <tr>
            <td>Lamp lifetime</td>
            <td><?= $row['RESOLUTION'] ?></td>
            </tr>
            <tr>
            <td>USB Support</td>
            <td><?= $row['CONNECTIONS'] ?></td>
            </tr>
        </tbody>
        </table>
    
        <button class="btn btn-info float-right mb-2"><a href="?page=confirmation&device=<?=$tmp[1]?>&amount=<?=$tmp[2]?>">Order</a></button>
    </div>
    </div>
<?php } ?>