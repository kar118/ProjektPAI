<?php
    if(!isset($_SESSION['id'])){
      $url = "http://$_SERVER[HTTP_HOST]/";
      header("Location: {$url}projekt/index.php?page=singIn");
      exit();
    }else{
      $db = new Database('localhost','project','root','');
      $conn = $db->getConn();
      $details = $conn->prepare('SELECT product.mark,product.model,product.cost,orders.amount , orders.date_start, orders.date_end, category.name, orders.orders_id FROM orders,product,category WHERE orders.product_id = product.product_id AND category.category_id = product.category_id AND orders.user_id = :id');
      $details->bindParam(':id',$_SESSION['user_id'],PDO::PARAM_INT);
      $result = $details->execute();
      
      $result = $details->fetchAll(PDO::FETCH_ASSOC);
      
  }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <?php
      include($_SERVER['DOCUMENT_ROOT'].'/Projekt/Views/Common/head.php');
    ?>
    <link rel="stylesheet" href="Public/css/my-shop.css">
    <title>WSM</title>
  </head>
<body>
  <?php
    include($_SERVER['DOCUMENT_ROOT'].'/Projekt/Views/Common/menu.php');
  ?>
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item text"><a href="?page=main">Main</a></li>
        <li class="breadcrumb-item active" aria-current="page">My shop</li>
      </ol>
    </nav>
    <?php foreach($result as $tmp){ ?>
        <div class="row no-gutters bg-light position-relative  my-3">
            <div class="col-md-4">
                <img src="<?= 'Public/img/'.$tmp['name'].'s/'.$tmp['mark'].$tmp['model'].'/1.jpg' ?>" class="w-100 pt-5 img-fluid" alt="...">
            </div>
            <div class="col-md-8 px-2 pb-2 position-static pl-md-0">
                <table class="table">
                <tbody>
                    <tr>
                    <td>Product</td>
                    <td><?= $tmp['mark'].' '.$tmp['model'] ?></td>
                    </tr>
                    <tr>
                    <td>From</td>
                    <td><?= $tmp['date_start'] ?></td>
                    </tr>
                    <tr>
                    <td>To</td>
                    <td><?= $tmp['date_end'] ?></td>
                    </tr>
                    <tr>
                    <td>Amount</td>
                    <td><?= $tmp['amount'] ?></td>
                    </tr>
                    <tr>
                    <td>To pay</td>
                    <td>
                      <?php 
                        $diff = abs(strtotime($tmp['date_end']) - strtotime($tmp['date_start']));
                        $years = floor($diff / (365*60*60*24)); 
                        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
                        echo ($days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)) + 1) * ($tmp['amount'] * $tmp['cost']); 
                      ?>$
                    </td>
                    </tr>
                   
                </tbody>
                </table>
                <button class="btn btn-info float-right m-1"><a href="?page=prolonge&id=<?= $tmp['orders_id'] ?>">Prolong order</a></button>
            </div>
        </div>
        <?php } ?>
    </div>
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