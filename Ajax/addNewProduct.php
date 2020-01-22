<?php
require_once '../Models/Database.php';

$db = new Database('localhost','project','root','');
    $conn = $db->getConn();

    // $details = $conn->prepare('UPDATE product SET amount = amount + 1 WHERE product.product_id = :product;');
    // $details->bindParam(':product',$product,PDO::PARAM_INT);
    // $result = $details->execute();

    $details = $conn->prepare('SELECT category.category_id,category.name FROM category');
    $result = $details->execute();
    $result = $details->fetchAll(PDO::FETCH_ASSOC);

    // $details = $conn->prepare('SELECT * FROM productInfo');
    // $result = $details->execute();
    // $result = $details->fetchAll(PDO::FETCH_ASSOC);

    $options = '';
    foreach($result as $select)
        $options = $options."<option value=\"".$select['category_id']."\">".$select['name'].'</option>';

?>

<form action="?page=addNewProduct" method='POST' enctype="multipart/form-data">
        <div class="row justify-content-center">
        <p class="display-4 lead text-light">Add product</p>

        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-7 col-sm-11 col-xs-11 mt-3">
                <input type="text" name="mark" placeholder="mark">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-7 col-sm-11 col-xs-11 mt-3">
                <input type="text" name="model" placeholder="model">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-7 col-sm-11 col-xs-11 mt-3">
                <input type="text" name="cost" placeholder="cost">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-7 col-sm-11 col-xs-11 mt-3">
                <input type="number" name="amount" placeholder="amount">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-7 col-sm-11 col-xs-11 mt-3">
            <select name="select" class="form-control">
                <?=$options?>
            </select> 
                                
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-7 col-sm-11 col-xs-11 mt-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image[]" id="validatedCustomFile" multiple>
                    <label class="custom-file-label">Choose file...</label>
                </div>   
            </div>
        </div>
        <div class="row justify-content-center">
            <textarea class="col-lg-5 col-md-7 col-sm-11 col-xs-11 mt-3 mt-2 form-control" name="json" placeholder="JSON" rows="10"></textarea>
        </div>
        <div class="row justify-content-center mt-3">
            <button class="btn btn-success" type="submit">Add new product</button>
        </div>
    </div>
</form>    