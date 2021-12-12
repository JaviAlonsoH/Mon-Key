<?php

function component($productName, $productPrice, $productImg, $productPlatform, $productId)
{
    $element = null ?>
    <div class="col-md-2 col-sm-6 m-3" id="product">
                <form action="index.php" method="post">
                    <div class="card shadow">
                        <div>
                            <img src="<?php echo 'data:image/jpeg; base64,' . base64_encode($productImg) ?>" alt="Logo" class="card-img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $productName ?></h5>
                            <small class="text-secondary"><?php echo $productPlatform ?></small>
                            <h6>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </h6>
                            <h5>
                                <small><s class="text-secondary"><?php echo '$' . ($productPrice + 15) ?></s></small>
                                <span class="price"><?php echo '$' . $productPrice ?></span>
                            </h5>
                            <button type="submit" class="btn btn-warning my-3" name="add">Add to Cart <i class="fas fa-shopping-cart"></i></button>
                            <input type="hidden" name="product_id" value="<?php echo $productId ?>" >
                        </div>
                    </div>
                </form>
            </div>

<?php 
    echo $element;
}

function cartElement($productName, $productPrice, $productImg, $productId) {
    $element = null ?>
    <form action="cart.php?action=remove&id=<?php echo $productId ?>" method="post" class="cart-items">
                        <div class="border rounded">
                            <div class="row bg-white">
                                <div class="col-md-3 pl-0">
                                    <img src="<?php echo 'data:image/jpeg; base64,' . base64_encode($productImg) ?>" alt="Product Image" class="img-fluid">
                                </div>
                                <div class="col-md-6">
                                    <h5 class="pt-2"><?php echo $productName ?></h5>
                                    <small class="text-secondary">Seller: dailytuttion</small>
                                    <h5 class="pt-2">$<?php echo $productPrice ?></h5>
                                    <button type="submit" class="btn btn-warning">Save for later</button>
                                    <button type="submit" class="btn btn-danger mx-2" name="remove">Remove</button>
                                </div>
                                <div class="col-md-3 py-5">
                                    <div>
                                        <button type="button" class="btn bg-light border rounded-circle"><i class="fa fa-minus"></i></button>
                                        <input type="text" value="1" class="form-control w-25 d-inline">
                                        <button type="button" class="btn bg-light border rounded-circle"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php
    echo $element;
}

function cartElementSmall($productName, $productPrice, $productImg, $productPlatform, $productId) {
    $element = null ?>
    <form action="cart.php?action=remove&id=<?php echo $productId ?>" method="post" class="cart-items">
                        <div class="border rounded">
                            <div class="row bg-white">
                                <div class="col-md-3 col-lg-3 pl-0">
                                    <img src="<?php echo 'data:image/jpeg; base64,' . base64_encode($productImg) ?>" alt="Product Image" class="img-fluid">
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                    <div class="col-md-6">
                                    <h5><?php echo $productName ?></h5>
                                    </div>
                                    
                                    <br>
                                    <div class="col-md-3">
                                    <h5>$<?php echo $productPrice ?></h5>
                                    </div>
                                    
                                    </div>
                                    <small><?php echo $productPlatform ?></small>
                                </div>
                                <div class="col-md-3 py-3">
                                    
                </div>
            </div>
        </div>
    </form>

    <?php
    echo $element;
}

?>
