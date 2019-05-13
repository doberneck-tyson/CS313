<?php
session_start();
$_SESSION["item"] = $_POST["item"];
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Items</title>
    <link rel="stylesheet" type="text/css" href="shoppingCart.css"/>
    <script type="text/javascript">
        var alerted = localStorage.getItem('alerted') || '';
        if(alerted != 'yes') {
            alert("Welcome to the browse page! feel free to browse our many great items! when you check the items you would like to add click the button that says add item to your cart then click the view cart button to view your items! be warned, if you decide to change your mind about which items you want and navigate back to this page, the items you selected will be removed, so you will have to add the items again.");
            localStorage.setItem('alerted', 'yes');
        }
    </script>
</head>
<body>
<header id="bHeader">
    <h1>Browse Through These Amazing Items We have to Offer!</h1>
</header>
<br/><br/>
<form id="bForm" method="post">
    <table>
        <tr>
            <th>Select Item</th>
            <th>Item Image</th>
            <th>Item Name</th>
            <th>Price</th>
            <th>Description</th>
        </tr>
        <tr>
            <td><input id="browse" type="checkbox" name="item[0]" value="Shower Curtain"></td>
            <td><img src="shower.jpg"/></td>
            <td>Shower Curtain</td>
            <td>$15.00</td>
            <td>Brighten up your bathroom with this elegant shower curtain!</td>
        </tr>
        <tr>
            <td><input id="browse" type="checkbox" name="item[1]" value="Lava Lamp"></td>
            <td><img src="lavaLamp.jpg"/></td>
            <td>Lava Lamp</td>
            <td>$10.00</td>
            <td>Experience an unnatural glow with these elegant lava lamps!</td>
        </tr>
        <tr>
            <td><input id="browse" type="checkbox" name="item[2]" value="Scented Candles"></td>
            <td><img src="candles.jpg"/></td>
            <td>Scented Candle</td>
            <td>$10.00</td>
            <td>Enjoy a fresh scent with any of our scented candles!</td>
        </tr>
        <tr>
            <td><input id="browse" type="checkbox" name="item[3]" value="Vase"></td>
            <td><img src="vase.jpg"/></td>
            <td>Vase</td>
            <td>$20.00</td>
            <td>Decorate your living space with these fancy vases!</td>
        </tr>
        <tr>
            <td><input id="browse" type="checkbox" name="item[4]" value="Rose Gold Dish Set"></td>
            <td><img src="dishSet.jpg"/></td>
            <td>Rose Gold Dish Set</td>
            <td>$25.00</td>
            <td>Impress your guests with this assorted set of rose gold plates, bowls, and silverware!</td>
        </tr>
    </table>
    <br/>
    <div class="button">
        <button name="bSubmit" type="submit">Add items to your cart</button>
        <br/><br/>
    </div>
    <div class="btn-2">
        <button onclick='window.location.href="viewCart.php"' type="button">View the cart</button>
    </div>
    <br/>
</form>
</body>
</html>