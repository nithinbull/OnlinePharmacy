<style>
.header {
    color: #6B8E23;
    font-size: 27px;
    padding: 10px;
}

.colname {
    font-size: 25px;
    color: #6B8E23;
}
</style>

<?php
  
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $admin->addToProduct($_POST["item_name"],$_POST["item_brand"],$_POST["item_image"],$_POST["item_price"],$_POST["item_description"],$_POST["item_prescription"],$_POST['item_quantity']);
    }
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class=" header text-center">Enter Product Details</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center colname">Product Name :</span>
                            <div class="col-md-12">
                                <input name="item_name" type="text" class="form-control">
                            </div>

                            <span class="col-md-1 col-md-offset-2 text-center colname">Product Brand :</span>
                            <div class="col-md-12">
                                <input name="item_brand" type="text" class="form-control">
                            </div>

                            <span class="col-md-1 col-md-offset-2 text-center colname">Product Price :</span>
                            <div class="col-md-12">
                                <input name="item_price" type="text" class="form-control">
                            </div>

                            <span class="col-md-1 col-md-offset-2 text-center colname">Image Link:</span>
                            <div class="col-md-12">
                                <input name="item_image" type="text" class="form-control">
                            </div>

                            <span class="col-md-1 col-md-offset-2 text-center colname">Quantity available :</span>
                            <div class="col-md-12">
                                <input name="item_quantity" type="text" class="form-control">
                            </div>
                            
                            <span class="col-md-1 col-md-offset-2 text-center colname">Product Description :</span>
                            <div class="col-md-12">
                                <textarea class="form-control" name="item_description" rows="6"></textarea>
                            </div>

                            <span class="col-md-1 col-md-offset-2 text-center colname">Prescription :</span>
                            <div class="col-md-12">
                                <textarea class="form-control" name="item_prescription" rows="6"></textarea>
                            </div>
                        </div>
                                               
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
        </div>
    </div>
</div>
