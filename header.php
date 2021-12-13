<header class="header">
        <nav class="navbar navbar-expand-lg">
            <div class="logo">
                <img src="./resources/images/LogoCompleto.PNG" alt="logo" width="10vw">
            </div>
            <div class="welcome">
                <h1 style="color:black;">
                    <?php 
                        if (isset($_SESSION["username"])) {
                            echo "Welcome back, " . $_SESSION["username"];
                        }else{
                            echo "Welcome";
                        }   
                    ?>
                </h1>
            </div>
            <div class="input-group px-2 m-5">
                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <button type="button" class="btn btn-outline-dark">Search</button>
            </div>
            <button class="navbar-toggler" 
                type="button" 
                data-toggle="collapse"
                data-target="#navbarNavAltMarkup" 
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <i class="navbar-toggler-icon"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                
                    <a href="index.php" class="nav-item nav-link active border rounded border-dark d-flex justify-content-center align-content-center m-2">
                        <h5 class="text-dark m-0">
                            <i class="fa fa-home"></i>
                            Home
                        </h5>
                    </a>
                    <a href="cart.php" class="nav-item nav-link active border rounded border-dark d-flex justify-content-center align-content-center m-2">

                        <h5 class="text-dark m-0">
                            <i class="fas fa-shopping-cart text-dark"></i>
                            Cart
                            <?php

                            if(isset($_SESSION['cart'])) {
                                $count = count($_SESSION['cart']);
                                echo '<span id="cart-count" class="text-light bg-dark">' . $count . '</span>';
                            } else {
                                echo '<span id="cart-count" class="text-light bg-dark">0</span>';
                            }

                            ?>
                        </h5>
                    </a>
                </div>
            </div>
        <?php
        if(isset($_SESSION['username'])) {
            ?> . <a href="index.php" class="btn btn-outline-dark m-5">Logout</a> . <?php
            session_destroy();
        } else {
            ?> . <a href="login.php" class="btn btn-outline-dark m-5">Login</a> . <?php
        }
        ?>
    </nav>
</header>