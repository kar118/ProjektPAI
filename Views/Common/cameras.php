<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/projekt/Models/Database.php';

    $db = new Database('localhost','project','root','');
    $conn = $db->getConn();
    $devices_stmt = $conn->prepare('SELECT * FROM cameras');
    $devices_stmt->execute();
?>

<?php foreach($devices_stmt as $row){ ?>
    <div class="row no-gutters bg-light position-relative my-4">
    <div class="col-md-4">
    <img src="<?= 'Public/img/Cameras/'.$row['mark'].$row['model'].'/1.jpg' ?>" class="w-100 mt-4" alt="...">
    </div>
    <div class="col-md-8 position-static p-4 pl-md-0">
    <h5 class="mt-0"><?= $row['mark'].' '.$row['model'] ?></h5>
    <p>
        <table class="table table-striped">
        <tbody>
            <tr>
            <td>Matrix</td>
            <td><?= $row['matrix'] ?></td>
            </tr>
            <tr>
            <td>Effective Resolution</td>
            <td><?= $row['effectiveResolution'] ?></td>
            </tr>
            <tr>
            <td>Screen's diagonal</td>
            <td><?= $row['screenDiagonal'] ?>'</td>
            </tr>
            <tr>
            <td>Optical zoom</td>
            <td><?= $row['opticalZoom'] ?></td>
            </tr>
        </tbody>
        </table>
    </p>
        <button class="btn btn-info float-right "><a href="?page=confirmation">Order</a></button>
    </div>
    </div>
<?php } ?>