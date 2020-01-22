<?php
    if(!isset($_SESSION['id'])&& $_SESSION['role']!='admin'){
      $url = "http://$_SERVER[HTTP_HOST]/";
      header("Location: {$url}projekt/index.php?page=singIn");
      exit();
    }else{
      $db = new Database('localhost','project','root','');
      $conn = $db->getConn();
      $details = $conn->prepare('SELECT * FROM usersInfo');
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
        <li class="breadcrumb-item active" aria-current="page">Admin's panel</li>
    </ol>
    </nav>
    <button id="users" class="btn btn-primary mb-3" onclick="showUser()">Show all users</button>
    <button id="products" class="btn btn-primary ml-1 mb-3" onclick="showProducts()">Show all products</button>
    <button id="addProduct" class="btn btn-primary ml-1 mb-3" onclick="addNewProduct()">Add new product</button>

    <div class="row justify-content-center">
        <div id="userTable" class="col-md-12">
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
        </div>
    </div>
</div>   
    <?php include($_SERVER['DOCUMENT_ROOT'].'/projekt/Views/Common/footer.php') ?>

    <!-- Optional JavaScript -->
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src='Public/js/admin.js'></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>