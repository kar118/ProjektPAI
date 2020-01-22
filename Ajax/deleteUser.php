<?php
require_once '../Models/Database.php';

$user = $_GET['id'];
$db = new Database('localhost','project','root','');
    $conn = $db->getConn();
if($user){
    $deleteAddress = $conn->prepare('DELETE FROM addresses WHERE addressId=:addressId');
    $deleteAddress->bindParam(':addressId',$address['addressId'],PDO::PARAM_INT);
    $deleteAddress->execute();
    
    $deleteUser = $conn->prepare('DELETE FROM users WHERE userId=:userId');
    $deleteUser->bindParam(':userId',$user,PDO::PARAM_INT);
    $deleteUser->execute();
    
    $address = $conn->prepare('SELECT addressId FROM users WHERE userId=:userId');
    $address->bindParam(':userId',$user,PDO::PARAM_INT);
    $address->execute();
    $address = $address->fetch(PDO::FETCH_ASSOC);
    
    $details = $conn->prepare('SELECT * FROM usersInfo');
    $result = $details->execute();
    $result = $details->fetchAll(PDO::FETCH_ASSOC);
}else{
    $details = $conn->prepare('SELECT * FROM usersInfo');
    $result = $details->execute();
    $result = $details->fetchAll(PDO::FETCH_ASSOC);
}
?>

<table class="col-md-8 text-light table table-striped">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Surname</th>
            <th scope="col">Email</th>
            <th scope="col">Country</th>
            <th scope="col">Locality</th>
            <th scope="col"></th>

            </tr>
        </thead>
        <tbody>
            <?php foreach($result as $tmp){ ?>
            <tr>
            <th scope="row"><?= $tmp['userId']?></th>
            <td><?= $tmp['name'] ?></td>
            <td><?= $tmp['surname'] ?></td>
            <td><?= $tmp['email'] ?></td>
            <td><?= $tmp['country'] ?></td>
            <td><?= $tmp['locality'] ?></td>
            <td><p onclick="deleteUser(<?=$tmp['userId']?>)" class='fa fa-trash' style='font-size:22px'></p></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>