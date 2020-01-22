<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/projekt/Models/Database.php';

    $db = new Database('localhost','project','root','');
    $conn = $db->getConn();
    $details = $conn->prepare('SELECT details.description, product.product_id, product.amount FROM product INNER JOIN category ON product.category_id = category.category_id INNER JOIN details ON product.category_id = category.category_id AND product.details_id = details.details_id AND category.name = "Speaker" AND product.amount > 0');
    $details->execute();
?>

<?php foreach($details as $tmp){ ?>
    <?php $row = json_decode($tmp[0],true);?>
    <div class="row no-gutters bg-light position-relative my-4">
    <div class="col-md-4">
    <img src="<?= 'Public/img/Speakers/'.$row['MARK'].$row['MODEL'].'/1.jpg' ?>" class="img-fluid" alt="...">
    </div>
    <div class="col-md-8 position-static p-4 pl-md-0">
    <p>
        <table class="table table">
        <tbody>
            <tr>
            <td>Product</td>
            <td><?=  $row['MARK'].' '.$row['MODEL'] ?></td>
            </tr>
            <tr>
            <td>Sound decoder</td>
            <td><?= $row['SOUND DECODER'] ?></td>
            </tr>
            <tr>
            <td>Others</td>
            <td><?= $row['OTHERS'] ?></td>
            </tr>
            <tr>
            <td>Power</td>
            <td><?= $row['POWER'] ?></td>
            </tr>
        </tbody>
        </table>
    </p>
        <button class="btn btn-info float-right "><a href="?page=confirmation">Order</a></button>
    </div>
    </div>
<?php } ?>