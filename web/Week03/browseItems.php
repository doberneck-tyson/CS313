<?php
session_start();
$_SESSION["item"] = $_POST["item"];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Browse | Tyson's Retro Supply</title>
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
    <h1>Browse Through Our Items!</h1>
</header>
<br><br>
<form id="bForm" method="post">
    <table>
        <tr>
            <th>Select Item</th>
            <th>Item Image</th>
            <th>Item Name</th>
            <th>Item Price</th>
            <th>Item Description</th>
        </tr>

        <tr>
            <td><input id="browse" type="checkbox" name="item[0]" value="NES"</td>
            <td><img src="nes.jpg"</td>
            <td> Nintendo Entertainment System</td>
            <td> $60.00</td>
            <td> Fully Refurbished Nintendo NES with chords and 2 controllers.</td>
        </tr>

        <tr>
            <td><input id="browse" type="checkbox" name="item[1]" value="PS1"</td>
            <td><img src="ps1.jpg"</td>
            <td> Sony Playstation 1</td>
            <td> $50.00</td>
            <td> Fully Refurbished PS1 with chords and 2 controllers.</td>
        </tr>

        <tr>
            <td><input id="browse" type="checkbox" name="item[2]" value="Sega Genesis"</td>
            <td><img src="sega.jpg"</td>
            <td> Sega Genesis</td>
            <td> $70.00</td>
            <td> Fully Refurbished NSega Genesis with chords and 2 controllers.</td>
        </tr>

        <tr>
            <td><input id="browse" type="checkbox" name="item[3]" value="Atari 2600"</td>
            <td><img src="atari.jpg"</td>
            <td> Atari 2600</td>
            <td> $100.00</td>
            <td> Fully Refurbished Atari 2600 with chords and 2 controllers.</td>
        </tr>
    </table>
    <br>
    <div class="button">
        <button name="bSubmit" type="submit">Add items to your cart</button>
        <br/><br/>
    </div>
    <div class="btn-2">
        <button onclick='window.location.href="viewCart.php"' type="button">View the cart</button>
    </div>
    <br>

</form>

</body>
</html>
