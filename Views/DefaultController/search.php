<?php
    if(!isset($_SESSION['id'])){
      $url = "http://$_SERVER[HTTP_HOST]/";
      header("Location: {$url}projekt/index.php?page=singIn");
      exit();
    }
?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <?php
      include($_SERVER['DOCUMENT_ROOT'].'/Projekt/Views/Common/head.php');
    ?>
    <link rel="stylesheet" href="Public/css/devices.css">
    <title>WSM</title>
  </head>
<body>
  <?php
    include($_SERVER['DOCUMENT_ROOT'].'/Projekt/Views/Common/menu.php');
  ?>
  <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?page=myShop">Devices</a></li>
          <li class="breadcrumb-item active" aria-current="page">Laptops</li>
        </ol>
    </nav>

<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/projekt/Models/Database.php';
    $db = new Database('localhost','project','root','');
    $conn = $db->getConn();
    try{echo $_GET['product'];
        $details = $conn->prepare("SELECT details.description, product.product_id, product.amount, category.name FROM product,category,details WHERE product.category_id = category.category_id AND product.details_id = details.details_id AND details.description LIKE '%text%' AND product.amount > 0");
        $details->bindParam(':text',$_GET['product'],PDO::PARAM_STR);
        $details->execute();
        $result = $details->fetchAll(PDO::FETCH_ASSOC);
    }catch(Exception $e){echo $e;}
?>

<?php foreach($result as $tmp){ ?>
    <?php $row = json_decode($tmp['description'],true);?>
        <div class="row no-gutters bg-light position-relative my-0">
            <div class="col-md-4">
                <img src="<?= 'Public/img/'.$tmp['name'].'s/'.$row['MARK'].$row['MODEL'].'/1.jpg' ?>" class="w-100" alt="...">
            </div>
            <div class="col-md-8 pt-3 px-3 position-static pl-md-0">
                <table class="table">
                <tbody>
                <?php foreach($row as $key=>$value){ ?>
                    <tr>
                    <td><?=$key?></td>
                    <td> <?=$value ?></td>
                    </tr>
                <?php } ?>
                </tbody>
                </table>
                <button class="btn btn-info float-right mb-2"><a href="?page=confirmation&device=<?=$tmp['product_id']?>&amount=<?=$tmp['amount']?>">Order</a></button>
            </div>
        </div>
<?php } ?>
    
  </div>
  <?php
    include($_SERVER['DOCUMENT_ROOT'].'/Projekt/Views/Common/footer.php');
  ?>

    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>