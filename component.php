<?php

function component($productName, $productPrice, $productImg)
{
    $element = null ?>
    <div class="col-md-3 col-sm-6 my-md-0">
                <form action="index.php" method="post">
                    <div class="card shadow">
                        <div>
                            <img src="<?php echo 'data:image/jpeg; base64,' . base64_encode($productImg) ?>" alt="Logo" class="card-img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $productName ?></h5>
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
                        </div>
                    </div>
                </form>
            </div>

<?php 
    echo $element;
}

?>
