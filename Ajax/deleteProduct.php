<?php
require_once '../Models/Database.php';

$product = $_GET['id'];

try{
    $db = new Database('localhost','project','root','');
    $conn = $db->getConn();
    $conn->beginTransaction();                

    $details = $conn->prepare('SELECT details_id FROM product WHERE product_id = :product_id');
    $details->bindParam(':product_id',$product,PDO::PARAM_INT);
    $details->execute();
    $detail_id = $details->fetch(PDO::FETCH_ASSOC);

    $order = $conn->prepare('DELETE FROM product WHERE product_id = :product_id');
    $order->bindParam(':product_id',$product,PDO::PARAM_INT);
    $order->execute();
    
    $order = $conn->prepare('DELETE FROM details WHERE details_id = :details_id');
    $order->bindParam(':details_id',$detail_id,PDO::PARAM_INT);
    $order->execute();

    $conn->commit();

    $details = $conn->prepare('SELECT * FROM productInfo');
    $details->execute();
    $result = $details->fetchAll(PDO::FETCH_ASSOC);

}catch(PDOException $e){
    $conn->rollBack();
    $db->closeConnection();
    echo $e;
    header('Location:?page=action');
    exit();
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