<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="introduction.css">
</head>
<body>
<h1 id="demo" onmouseover="mouseOver()" onmouseout="mouseOut()">Tyson's Homepage</h1>

<script>
    function mouseOver() {
        document.getElementById("demo").style.color = "red";
    }

    function mouseOut() {
        document.getElementById("demo").style.color = "black";
    }
</script>

<h3>Hello, my name is Tyson Doberneck. I am majoring in Software Engineering and have a year until I graduate. I am originally from
Galt, CA and I served my mission in the Florida, Tallahassee Mission. My wife and I are expecting our first child mid July and we could
not be more terrified and excited for anything in our lives. I love to kayak, rock climb and play retro video games in my spare time.</h3>


<a href="./assignments.php">Click Here to go to my Assignments Page</a>
<br>
<img src="./image.jpg" alt="Wife and I" width="500"
     height="500">
<br>


</body>
</html>