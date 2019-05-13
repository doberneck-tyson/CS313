<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="shoppingCart.css"/>
</head>
<body>
<header id="bHeader">
    <h1>Items Added to Cart</h1>
</header>
<br><br>
<div class="itemView">
			<?php
			session_start();
			if(isset($_SESSION["item"])) {
					foreach($_SESSION['item'] as $value) {
					echo "<h2>$value</h2>" . "<br/>";
				}
			}
			else {
			    echo "<h2>No items selected</h2>" . "<br/>";
			    echo "<h2>Please return to the browsing page and select the items you would like to add</h2>" . "<br/>";
			}
			?>
</div>
<br/><br/>
<div class="flex">
    <?php
    if(isset($_SESSION["item"])) {
        echo ("<button onclick=\"window.location.href= 'browseItems.php'\" type='button' class='flex-child'>Go back to browse page</button>");
        echo ("<button onclick=\"window.location.href= 'checkout.php'\" type='button' class='flex-child'>Proceed to checkout</button>");
    }
    else {
        echo ("<button onclick=\"window.location.href= 'browseItems.php'\" type='button' class='flex-child'>Go back to browse page</button>");
    }
    ?>
</div>
</body>
</html>