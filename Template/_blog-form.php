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
    $admin->addToBlog($_POST["item_title"],$_POST["item_image"],$_POST["item_abstract"],$_POST['item_link']);
    }
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class=" header text-center">Enter Blog's Details</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center colname">Blog Title :</span>
                            <div class="col-md-12">
                                <input name="item_title" type="text" class="form-control">
                            </div>

                            <span class="col-md-1 col-md-offset-2 text-center colname">Blog Image Link:</span>
                            <div class="col-md-12">
                                <input name="item_image" type="text" class="form-control">
                            </div>
                            
                            
                            <span class="col-md-1 col-md-offset-2 text-center colname">Blog link:</span>
                            <div class="col-md-12">
                                <textarea class="form-control" name="item_link" rows="4"></textarea>
                            </div>

                            <span class="col-md-1 col-md-offset-2 text-center colname">Blog abstract:</span>
                            <div class="col-md-12">
                                <textarea class="form-control" name="item_abstract" rows="4"></textarea>
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
