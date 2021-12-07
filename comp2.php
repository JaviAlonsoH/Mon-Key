<?php

function component($productName, $productPrice, $productImg)
{
    $element = <<<EOD
    <div class="col-md-3 col-sm-6 my-md-0">
                <form action="index.php" method="post">
                    <div class="card shadow">
                        <div>
                            <img src=" <?php echo 'data:image/jpeg; base64,' . base64_encode($productImg); ?>" alt="Logo" class="img-fluid card-img-top"/>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">$productName</h5>
                            <h6>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </h6>
                            <p class="card-text">
                                Some quick example text to build on the card.
                            </p>
                            <h5>
                                <small><s class="text-secondary">$productPrice</s></small>
                                <span class="price">$35</span>
                            </h5>
                            <button type="submit" class="btn btn-warning my-3" name="add">Add to Cart <i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                </form>
            </div>

    EOD;

    echo $element;
}

?>
