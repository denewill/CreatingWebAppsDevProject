<!-- 
Filename: enquire.html
Author: Michelle Chuwindra
Created: 27 Mar 2021
Last Modified: 25 Apr 2021
Description: Enquire page for Assignment 1
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Assignment 1 submission: Laptop Computer shop enquire page" />
    <meta name="keywords" content="HTML5, CSS, tags" />
    <meta name="author" content="Michelle Chuwindra"  />
    <title>Enquiry</title>
    <link href="styles/style.css" rel="stylesheet"/>
    <script src="scripts/part2.js"></script>
</head>
<body>
    <header>
        <?php
            include ('header.inc');
            include ('menu.inc');
        ?>       
    </header>
    <article>
        <h2>Enquiry Form</h2>
        <form method="post" id="enquiryform" action="payment.php" novalidate="novalidate"> 
            <fieldset>
                <legend>Customer Details</legend>
                <br />
                <label for="firstname">First Name</label> 
                <input type="text" name= "firstname" id="firstname" required="required" maxlength="25" pattern="[A-Za-z]{0,25}" placeholder="Your First Name Here"/>
                <br /> <br />
                <label for="lastname">Last Name</label> 
                <input type="text" name= "lastname" id="lastname" required="required" maxlength="25" pattern="[A-Za-z]{0,25}" placeholder="Your Last Name Here"/>
                <br /> <br />
                <label for="customeremail">Email</label>
                <input type="email" name="customeremail" id="customeremail" required="required" placeholder="Your Email Here" />
                <br /> <br />
                <fieldset>
                    <legend>Address</legend>
                    <br />
                    <label for="streetaddress">Street Address</label>
                    <input type="text" name="streetaddress" id="streetaddress" required="required" maxlength="40" placeholder="Your Street Address Here" />
                    <br /><br />
                    <label for="suburb">Suburb/Town</label>
                    <input type="text" name="suburb" id="suburb" required="required" maxlength="20" placeholder="Your Suburb/Town Here" />
                    <br /><br />
                    <label for="state">State</label>
                    <select name="state" id="state" required="required">
                        <option value="">Please Select</option>
                        <option value="VIC">VIC</option>
                        <option value="NSW">NSW</option>
                        <option value="QLD">QLD</option>
                        <option value="NT">NT</option>
                        <option value="WA">WA</option>
                        <option value="SA">SA</option>
                        <option value="TAS">TAS</option>
                        <option value="ACT">ACT</option>
                    </select>
                    <br /><br />
                    <label for="postcode">Postcode</label>
                    <input type="text" name="postcode" id="postcode" required="required" maxlength="4" placeholder="Enter a 4-digit postcode" pattern="\d{4}" />
                    <br /><br />    
                </fieldset>
                <br />
                <label for="phonenumber">Phone Number</label>
                <input type="text" name="phonenumber" id="phonenumber" required="required" maxlength="10" placeholder="eg. 0123456789" pattern="\d{0,10}" />
                <br /><br />
                <fieldset id="prefctc">
                    Preferred Contact
                    <input type="radio" name="prefctc" id="prefemail" required="required" value="prefemail">
                    <label for="email">Email</label>
                    <input type="radio" name="prefctc" id="prefpost" value="prefpost">
                    <label for="post">Post</label>
                    <input type="radio" name="prefctc" id="prefphone" value="prefphone">
                    <label for="phone">Phone</label>
                </fieldset>                
                <br /><br />          
                <label for="productsel">Product</label>
                <select name="productsel" id="productsel" required="required">
                    <option value="">Please Select</option>
                    <option value="macbookpro">MacBook Pro</option>
                    <option value="asusrog">Asus ROG Strix G15</option>
                    <option value="aceraspire3">Acer Aspire 3 Notebook</option>
                    <option value="hpenvy">HP Envy Laptop</option>
                </select>
                <br /><br />
                <label for="quantity">Quantity</label>
                <input type="text" name="quantity" id="quantity" min="1" max="100" required="required">
                <br />
                <p>Our Current Prices
                <br />Macbook Pro: $1999.00
                <br />Asus ROG Strix G15: $1919.00
                <br />Acer Aspire 3 Notebook: $477.00
                <br />HP Envy Laptop: $1688.00 </p>
                Product Feature
                <br />                
                <input type="checkbox" id="price" name="feature[]" value="price" checked="checked" />
                <label for="price">Pricing</label>                
                <input type="checkbox" id="specs" name="feature[]" value="specs" />
                <label for="specs">Specs</label>                
                <input type="checkbox" id="stock" name="feature[]" value="stock" />
                <label for="stock">Store Stock</label>                
                <input type="checkbox" id="warranty" name="feature[]" value="warranty" />
                <label for="warranty">Warranty</label>                
                <br /><br />
                <label for="comments">Comments</label> <br />
                <textarea id="comments" name="comments" rows="5" cols="50" placeholder="Please specify the particular feature you're interested in."></textarea>
            <br />
            </fieldset>
            <br />
            <input type= "submit" value="Pay Now"/>          
            <input type= "reset" value="Reset Form"/>
        </form>
    </article>
    <footer>
        <?php include('footer.inc'); ?>
    </footer>
</body>
</html>