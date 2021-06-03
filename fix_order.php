<?php
    if(!isset($_SERVER['HTTP_REFERER'])){
        header('location:index.php');
        exit;
    }

    session_start();

    //pass prev values
    $firstname_saved = $_SESSION["firstnamesaved"];
    $lastname_saved = $_SESSION["lastnamesaved"];
    $customeremail_saved = $_SESSION["customeremailsaved"];
    $streetaddress_saved = $_SESSION["streetaddresssaved"];
    $suburb_saved = $_SESSION["suburbsaved"];
    $state_saved = $_SESSION["statesaved"];
    $postcode_saved = $_SESSION["postcodesaved"];
    $phonenumber_saved = $_SESSION["phonenumbersaved"];
    $prefctc_saved = $_SESSION["prefctcsaved"];
    $orderlist_saved = $_SESSION["orderlistsaved"];
    $quantity_saved = $_SESSION["quantitysaved"];
    $cardtype_saved = $_SESSION["cardtype"];
    $cardname_saved	= $_SESSION["cardname"];
    $cardnumber_saved	= $_SESSION["cardnumber"];
    $expirymonth_saved	= $_SESSION["expirymonth"];
    $expiryyear_saved	= $_SESSION["expiryyear"];
    $cvv_saved	= $_SESSION["cvv"];
    $result = $_SESSION["result"];
    $errMsg = $_SESSION["errMsg"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Assignment 3 submission: Laptop Computer shop fix order page" />
    <meta name="keywords" content="HTML5, CSS, PHP" />
    <meta name="author" content="Michelle Chuwindra"  />
    <title>Fix Order</title>
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
        <h2>Changes Form</h2>
        <form method="post" id="enquiryform" action="process_order.php" novalidate="novalidate"> 
            <fieldset>
                <legend>Customer Details</legend>
                <br />
                <label for="firstname">First Name</label> 
                <input type="text" name= "firstname" id="firstname" required="required" maxlength="25" pattern="[A-Za-z]{0,25}" placeholder="Your First Name Here" value="<?php echo $firstname_saved;?>"/>
                <span class="errorfix">* <?php if (!$result[0]) {echo $errMsg[0];} ?> </span>
                <br /> <br />
                <label for="lastname">Last Name</label> 
                <input type="text" name= "lastname" id="lastname" required="required" maxlength="25" pattern="[A-Za-z]{0,25}" placeholder="Your Last Name Here" value="<?php echo $lastname_saved;?>"/>
                <span class="errorfix">* <?php if (!$result[1]) {echo $errMsg[1];} ?> </span>
                <br /> <br />
                <label for="customeremail">Email</label>
                <input type="email" name="customeremail" id="customeremail" required="required" placeholder="Your Email Here" value="<?php echo $customeremail_saved;?>"/>
                <span class="errorfix">* <?php if (!$result[2]) {echo $errMsg[2];} ?> </span>
                <br /> <br />
                <fieldset>
                    <legend>Address</legend>
                    <br />
                    <label for="streetaddress">Street Address</label>
                    <input type="text" name="streetaddress" id="streetaddress" required="required" maxlength="40" placeholder="Your Street Address Here" value="<?php echo $streetaddress_saved;?>"/>
                    <span class="errorfix">* <?php if (!$result[3]) {echo $errMsg[3];} ?> </span>
                    <br /><br />
                    <label for="suburb">Suburb/Town</label>
                    <input type="text" name="suburb" id="suburb" required="required" maxlength="20" placeholder="Your Suburb/Town Here" value="<?php echo $suburb_saved;?>"/>
                    <span class="errorfix">* <?php if (!$result[4]) {echo $errMsg[4];} ?> </span>
                    <br /><br />
                    <label for="state">State</label>
                    <select name="state" id="state" required="required" value="<?php echo $state_saved;?>">
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
                    <span class="errorfix">* <?php if (!$result[5]) {echo $errMsg[5];} ?> </span>
                    <br /><br />
                    <label for="postcode">Postcode</label>
                    <input type="text" name="postcode" id="postcode" required="required" maxlength="4" placeholder="Enter a 4-digit postcode" pattern="\d{4}" value="<?php echo $postcode_saved;?>"/>
                    <span class="errorfix">* <?php if (!$result[6]) {echo $errMsg[6];} ?> </span>
                    <br /><br />    
                </fieldset>
                <br />
                <label for="phonenumber">Phone Number</label>
                <input type="text" name="phonenumber" id="phonenumber" required="required" maxlength="10" placeholder="eg. 0123456789" pattern="\d{0,10}" value="<?php echo $phonenumber_saved;?>"/>
                <span class="errorfix">* <?php if (!$result[7]) {echo $errMsg[7];} ?> </span>
                <br /><br />
                <fieldset id="prefctc">
                    Preferred Contact
                    <input type="radio" name="prefctc" id="prefemail" required="required" value="prefemail" <?php if (isset($prefctc_saved) && $prefctc_saved == "prefemail") {echo "checked";} ?>>
                    <label for="email">Email</label>
                    <input type="radio" name="prefctc" id="prefpost" value="prefpost" <?php if (isset($prefctc_saved) && $prefctc_saved == "prefpost") {echo "checked";} ?>>
                    <label for="post">Post</label>
                    <input type="radio" name="prefctc" id="prefphone" value="prefphone" <?php if (isset($prefctc_saved) && $prefctc_saved == "prefphone") {echo "checked";} ?>>
                    <label for="phone">Phone</label>
                    <span class="errorfix">* <?php if (!$result[8]) {echo $errMsg[8];} ?> </span>
                </fieldset>                
                <br /><br />          
                <label for="productsel">Product</label>
                <select name="productsel" id="productsel" required="required" value="<?php echo $orderlist_saved;?>">
                    <option value="">Please Select</option>
                    <option value="macbookpro">MacBook Pro</option>
                    <option value="asusrog">Asus ROG Strix G15</option>
                    <option value="aceraspire3">Acer Aspire 3 Notebook</option>
                    <option value="hpenvy">HP Envy Laptop</option>
                </select>
                <span class="errorfix">* <?php if (!$result[9]) {echo $errMsg[9];} ?> </span>
                <br /><br />
                <label for="quantity">Quantity</label>
                <input type="text" name="quantity" id="quantity" min="1" max="100" required="required" value="<?php echo $quantity_saved;?>">
                <span class="errorfix">* <?php if (!$result[10]) {echo $errMsg[10];} ?> </span>
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
            <fieldset>
                <legend>Card Details</legend>
                <br />
                <label for="cardtype">Card Type</label>
                <select name="cardtype" id="cardtype" required="required">
                    <option value="">Please Select</option>
                    <option value="mastercard">MasterCard</option>
                    <option value="visa">Visa</option>
                    <option value="americanexpress">American Express</option>
                </select>
                <span class="errorfix">* <?php if (!$result[11]) {echo $errMsg[11];} ?> </span>
                <br /><br />
                <label for="cardname">Cardholder Name</label> 
                <input type="text" name= "cardname" id="cardname" required="required" maxlength="40" pattern="[A-Za-z\s]{0,40}" placeholder="Name on Card Here" size="30" />
                <span class="errorfix">* <?php if (!$result[12]) {echo $errMsg[12];} ?> </span>
                <br /> <br />
                <label for="cardnumber">Card Number</label>
                <input type="text" name="cardnumber" id="cardnumber" required="required" maxlength="16" placeholder="eg. 0123456789123456" pattern="\d{15,16}" />
                <span class="errorfix">* <?php if (!$result[13]) {echo $errMsg[13];} ?> </span>
                <br /><br />
                <label for="expirymonth">Card Expiry</label>
                <input type="text" name="expirymonth" id="expirymonth" required="required" maxlength="2" placeholder="MM" pattern="\d{2}" size="4" />
                <span>/</span>
                <input type="text" name="expiryyear" id="expiryyear" required="required" maxlength="2" placeholder="YY" pattern="\d{2}" size="4" />
                <span class="errorfix">* <?php if (!$result[14]) {echo $errMsg[14];} ?> </span> <br />
                <span class="errorfix">* <?php if (!$result[15]) {echo $errMsg[15];} ?> </span>
                <br /><br />
                <label for="cvv">CVV</label>
                <input type="text" name="cvv" id="cvv" required="required" maxlength="3" placeholder="XXX" pattern="\d{3}" size="4" />
                <span class="errorfix">* <?php if (!$result[16]) {echo $errMsg[16];} ?> </span>
                <br /><br />
            </fieldset>
            <br />
            <input type= "submit" value="Submit Fixes" name="fixedform"/>          
            <input type= "reset" value="Reset Form"/>
        </form>
    </article>
    <footer>
        <?php include('footer.inc'); ?>
    </footer>
</body>
</html>