<?php
require_once '../Models/Database.php';

$product = $_GET['id'];
echo $product;
$db = new Database('localhost','project','root','');
    $conn = $db->getConn();
if($product){
    $details = $conn->prepare('UPDATE product SET amount = amount - 1 WHERE product.product_id = :product;');
    $details->bindParam(':product',$product,PDO::PARAM_INT);
    $result = $details->execute();

    $details = $conn->prepare('SELECT * FROM productInfo');
    $result = $details->execute();
    $result = $details->fetchAll(PDO::FETCH_ASSOC);
}else{
    $details = $conn->prepare('SELECT * FROM productInfo');
    $result = $details->execute();
    $result = $details->fetchAll(PDO::FETCH_ASSOC);
}
?>

<table class="col-md-8 text-light table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Mark</th>
            <th scope="col">Model</th>
            <th scope="col">Category</th>
            <th scope="col">Amount</th>
            <th scope="col">Action</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($result as $tmp){ ?>
            <tr>
            <th scope="row"><?= $tmp['product_id']?></th>
            <td><?= $tmp['mark'] ?></td>
            <td><?= $tmp['model'] ?></td>
            <td><?= $tmp['name'] ?></td>
            <td><?= $tmp['amount'] ?></td>
            <td><p onclick="deleteProductAmount(<?=$tmp['product_id']?>)" class='fas fa-minus-square' style='font-size:22px'></p>
            <p onclick="addProductAmount(<?=$tmp['product_id']?>)" class='fas fa-plus-square' style='font-size:22px'></p></td>
            <td><p onclick="deleteProduct(<?=$tmp['product_id']?>)" class='fas fa-trash' style='font-size:22px'></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>