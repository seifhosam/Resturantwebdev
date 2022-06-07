<?php
include "TopMenu.php";
include "customdb.php";
?>
<html>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="full-page">
    <link rel="stylesheet" type="text/css" href="menustyle.css">
    <a href="Beef.php" class="MenuVar beef"> Beef </a>
    <a href="chicken.php" class="MenuVar Chicken"> Chicken </a>
    <a href="Burgers.php" class="MenuVar Burgers"> Burgers </a>
    <a href="Salads.php" class="MenuVar Salads"> Salads </a>
    <a href="Dessert.php" class="MenuVar Dessert"> Dessert </a>
    <a href="Classics.php" class="MenuVar Classics"> Classics </a>
    <a href="MakeSandwich.php" class="MenuVar Mindsandwitch"> Customize your own sandwich</a>

    <form class="example" action=" ">
        <!-- php el search -->
        <input type="text" placeholder="Search your plate..." name="search">
        <button type="submit"><i class="fa fa-search"></i></button>

    </form>
    <!-- MEAT -->
    <div style="margin-top: 800px;">
        <div class="container">
            <div class="menu">
                <h2 class="h20">
                    BREAD 🥖
                </h2>

                <div class="grid">

                    <?php
                    $result = mysqli_query($conn, "SELECT * from customizesandwich");
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($row['parent_ingredient'] == 'bread') {
                    ?>
                            <form method="post" action="">
                                <div class="item">
                                    <img class="img2" src="<?= $row['image']; ?>">
                                    <div class="menu-item-text">
                                        <h3 style="color: white;">
                                            <?= $row['name']; ?>
                                            For <?= $row['price']; ?> $ Per slice
                                        </h3>
                                        <input type='hidden' name='ID' value=<?= $row['ID']; ?> />
                                        <button type='submit' class='button'> Add to cart </button>
                                    </div>
                                </div>

                            </form>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="menu">
                <h2 class="h20">
                    PROTEIN 🥓
                </h2>

                <div class="grid">

                    <?php
                    $result = mysqli_query($conn, "SELECT * from customizesandwich");
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($row['parent_ingredient'] == 'protein') {
                    ?>
                            <form method="post" action="">
                                <div class="item">
                                    <img class="img2" src="<?= $row['image']; ?>">
                                    <div class="menu-item-text">
                                        <h3 style="color: white;">
                                            <?= $row['name']; ?>
                                            For <?= $row['price']; ?> $ Per slice </h3>
                                        <input type='hidden' name='ID' value=<?= $row['ID']; ?> />
                                        <button type='submit' class='button'> Add to cart </button>
                                    </div>
                                </div>

                            </form>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="menu">
                <h2 class="h20">
                    SAUCE 🥓
                </h2>

                <div class="grid">

                    <?php
                    $result = mysqli_query($conn, "SELECT * from customizesandwich");
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($row['parent_ingredient'] == 'sauce') {
                    ?>
                            <form method="post" action="">
                                <div class="item">
                                    <img class="img2" src="<?= $row['image']; ?>">
                                    <div class="menu-item-text">
                                        <h3 style="color: white;">
                                            <?= $row['name']; ?>
                                            For <?= $row['price']; ?> $ Per slice
                                        </h3>
                                        <input type='hidden' name='ID' value=<?= $row['ID']; ?> />
                                        <button type='submit' class='button'> Add to cart </button>
                                    </div>
                                </div>

                            </form>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

</html>