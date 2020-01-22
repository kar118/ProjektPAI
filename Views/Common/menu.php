<nav class="position-sticky navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <a class="navbar-brand" href="?page=main">Cinect</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
     <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
        <li class="nav-item active">
            <a class="nav-link" href="?page=logout">Log out<span class="sr-only">(current)</span></a>
        </li>    
        <?php if($_SESSION['role']==='admin')
            echo '<li class="nav-item active"><a class="nav-link" href="?page=admin">Admin<span class="sr-only">(current)</span></a></li>'; 
        ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown03" data-toggle="dropdown" aria-haspo..\pup="true" aria-expanded="false">Devices</a>
            <div class="dropdown-menu" aria-labelledby="dropdown03">
                <a class="dropdown-item" href="?page=devices_laptops">Laptops</a>
                <a class="dropdown-item" href="?page=devices_projectors">Projectors</a>
                <a class="dropdown-item" href="?page=devices_speakers">Speakers</a>
                <a class="dropdown-item" href="?page=devices_cameras">Cameras</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown03" data-toggle="dropdown" aria-haspo..\pup="true" aria-expanded="false"><i class="far fa-user-circle"></i><?= $_SESSION['id'] ?></a>
            <div class="dropdown-menu" aria-labelledby="dropdown03">
                <a class="dropdown-item" href="?page=userAccount">Account</a>
                <a class="dropdown-item" href="?page=my-shop">My Shop</a>
            </div>
        </li>
     </ul>
     <form action="?page=main" class="form-inline my-2 my-lg-0">
         <input class="form-control mr-sm-2" name="product" type="search" placeholder="Search">
         <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    </div>
</nav>
