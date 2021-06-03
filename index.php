<!-- 
Filename: index.html
Author: Michelle Chuwindra
Created: 27 Mar 2021
Last Modified: 24 May 2021
Description: Index page for Assignment 3
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Assignment 1 submission: Laptop Computer shop index page" />
    <meta name="keywords" content="HTML5, CSS, tags" />
    <meta name="author" content="Michelle Chuwindra"  />
    <title>Da Laptop Store</title>
    <link href="styles/style.css" rel="stylesheet"/>

</head>
<body>
    <header>     
        <?php
            include ('header.inc');
            include ('menu.inc');
        ?>
        <img src="images/header2.jfif" alt="Laptop Computer Store [https://unsplash.com/photos/1SAnrIxw5OY]" class="index-image"/>
        <a href="https://unsplash.com/photos/1SAnrIxw5OY" target="_blank">Source Image</a>
    </header>
    <article>
        <h2 class="indexh2">LIMITED TIME DEALS AVAILABLE</h2>
        <hr />
    </article>
    <footer>
        <?php include('footer.inc'); ?>
    </footer>
</body>
</html>