<!-- 
Filename: enhancements.html
Author: Michelle Chuwindra
Created: 27 Mar 2021
Last Modified: 28 Mar 2021
Description: Enchancements page for Assignment 1
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Assignment 1 submission: Laptop Computer shop enhancements page" />
    <meta name="keywords" content="HTML5, CSS, tags" />
    <meta name="author" content="Michelle Chuwindra"  />
    <title>Enhancements</title>
    <link href="styles/style.css" rel="stylesheet"/>

</head>
<body>
    <header>
        <?php
            include ('header.inc');
            include ('menu.inc');
        ?>
    </header>
    <article>
        <h2>Enhancement 1:</h2>
        <h3>Description:</h3>
        <h4>The navigator bar containing all the links to other pages have been positioned separately. The bar is also now responsive to window size changes.</h4>
        <h4>This change is not necessary as only a menu list of links leading to other pages is required. The task also does not specify the need for the links to be responsive.</h4>
        <h3>Hyperlinks:</h3>
        <h4>This change has been applied to all the menu bars in all pages. Thus, the hyperlinks above are the result of the change and act as hyperlinks to the changes themselves.</h4>
        <h4>Alternatively, these links are usable. 
            <a href="index.php">Index</a>   
            <a href="enquire.php">Enquiry</a>   
            <a href="product.php">Products</a>   
            <a href="about.php">About</a>   
            <a href="enhancements.php">Enhancements</a>   
        </h4>
        <h3>Code needed to implement the feature:</h3>
        <h4>In order to separate the positions of the menu links, &lt;div&gt; is used in the base html. Each &lt;div&gt; is then assigned their own styles in CSS to position them.</h4>
        <h4>Additionally, the transform property is used to position and move the &lt;div&gt; element when the window is resized below certain ratios.</h4>
        <h3>Source of technique:</h3>
        <h4><a href="https://www.w3schools.com/howto/howto_css_topnav_centered.asp" target="_blank">W3Schools</a></h4>
        <br />
        <h2>Enhancement 2:</h2>
        <h3>Description:</h3>
        <h4>The description list in the About Us section of the About page is modified so that respective elements of the description list are in the same line as each other.</h4>
        <h4>In cases demonstrated in previous lab and lecture sessions, the description list is not styled with CSS. This change is not necessary, but is more aesthetically pleasing nonetheless.</h4>
        <h3>Hyperlinks:</h3>
        <h4><a href="about.php">About</a></h4>
        <h3>Code needed to implement the feature:</h3>
        <h4>Both the dt and dd elements have to be set to float on the left with CSS. The width of the dt element also has to be specified to make space for the dd element.</h4>
        <h3>Source of technique:</h3>
        <h4><a href="https://stackoverflow.com/questions/1713048/how-to-style-dt-and-dd-so-they-are-on-the-same-line" target="_blank">StackOverflow</a></h4>
        <hr />
    </article>
    <footer>
        <?php include('footer.inc'); ?>
    </footer>
</body>
</html>