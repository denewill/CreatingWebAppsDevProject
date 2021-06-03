<!-- 
Filename: payment.html
Author: Michelle Chuwindra
Created: 25 Apr 2021
Last Modified: 24 May 2021
Description: Payment page for Assignment 3
-->

<?php
    session_start();
    $_SESSION["firstnamesaved"] = $_POST["firstname"];
    $_SESSION["lastnamesaved"] = $_POST["lastname"];
    $_SESSION["customeremailsaved"] = $_POST["customeremail"];
    $_SESSION["streetaddresssaved"] = $_POST["streetaddress"];
    $_SESSION["suburbsaved"] = $_POST["suburb"];
    $_SESSION["statesaved"] = $_POST["state"];
    $_SESSION["postcodesaved"] = $_POST["postcode"];
    $_SESSION["phonenumbersaved"] = $_POST["phonenumber"];
    $_SESSION["prefctcsaved"] = $_POST["prefctc"];
    $_SESSION["orderlistsaved"] = $_POST["productsel"];
    $_SESSION["quantitysaved"] = $_POST["quantity"];
    $_SESSION["optionsaved"] = $_POST["feature"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Assignment 2 submission: Laptop Computer shop payment page" />
    <meta name="keywords" content="HTML5, CSS, tags" />
    <meta name="author" content="Michelle Chuwindra"  />
    <title>Payment</title>
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
        <h2>Payment</h2>
        <h3>Customer Details</h3>
        <p>Name: <span id="name_saved"></span></p>
        <p>Email: <span id="customeremail_saved"></span></p>
        <h3>Address</h3>
        <p>Street Address: <span id="streetaddress_saved"></span></p>
        <p>Suburb/Town: <span id="suburb_saved"></span></p>
        <p>State: <span id="state_saved"></span></p>
        <p>Postcode: <span id="postcode_saved"></span></p>
        <h3>Contact Details</h3>
        <p>Phone Number: <span id="phonenumber_saved"></span></p>
        <p>Preferred Contact: <span id="prefctc_saved"></span></p>
        <h3>Order List</h3>
        <p><span id="orderlist_saved"></span></p>
        <p>Total Price: <span id="totalprice"> </span></p>
        <br />
        <h3>Payment Details</h3>
        <form method="post" id="carddetails" action="process_order.php" novalidate="novalidate">
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
                <br /><br />
                <label for="cardname">Cardholder Name</label> 
                <input type="text" name= "cardname" id="cardname" required="required" maxlength="40" pattern="[A-Za-z\s]{0,40}" placeholder="Name on Card Here" size="30"/>
                <br /> <br />
                <label for="cardnumber">Card Number</label>
                <input type="text" name="cardnumber" id="cardnumber" required="required" maxlength="16" placeholder="eg. 0123456789123456" pattern="\d{15,16}" />
                <br /><br />
                <label for="expirymonth">Card Expiry</label>
                <input type="text" name="expirymonth" id="expirymonth" required="required" maxlength="2" placeholder="MM" pattern="\d{2}" size="4" />
                <span>/</span>
                <input type="text" name="expiryyear" id="expiryyear" required="required" maxlength="2" placeholder="YY" pattern="\d{2}" size="4"/>
                <br /><br />
                <label for="cvv">CVV</label>
                <input type="text" name="cvv" id="cvv" required="required" maxlength="3" placeholder="XXX" pattern="\d{3}" size="4"/>
                <br /><br />
            </fieldset>
            <br />
            <input type= "submit" value="Check Out" name="payment"/>          
            <button id="CancelOrder">Cancel Order</button>
        </form>
        <br /><br />
    </article>
    <footer>
        <?php include('footer.inc'); ?>
    </footer>
</body>
</html>
