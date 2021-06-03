<?php
    require_once('settings.php');
   	
	$conn = @mysqli_connect($host,
		$user,
		$pwd,
		$sql_db
	);

    // Checks if connection is successful
	if (!$conn) {
		// Displays an error message
		echo "<p>Database connection failure</p>"; // Might not show in a production script 
	} else {
		// Upon successful connection
		
	    $sql_table="orders";
	
		// Set up the SQL command to add the data into the table
		$query = "select * from $sql_table order by order_id desc limit 1";
			
		// execute the query and store result into the result pointer
		$result = mysqli_query($conn, $query);
		
		// checks if the execuion was successful
		if(!$result) {
			echo "<p>Something is wrong with ",	$query, "</p>";
		} else {
            while ($row = mysqli_fetch_assoc($result)){
                $firstname = $row["name_saved"];
                $lastname = $row["lastname_saved"];
                $customeremail = $row["customeremail_saved"];
                $streetaddress = $row["streetaddress_saved"];
                $suburb = $row["suburb_saved"];
                $state = $row["state_saved"];
                $postcode = $row["postcode_saved"];
                $phonenumber = $row["phonenumber_saved"];
                $prefctc = $row["prefctc_saved"];
                $orderlist = $row["orderlist_saved"];
                $quantity = $row["quantity_saved"];
                $cardtype = $row["cardtype"];
                $cardname = $row["cardname"];
                $cardnumber = $row["cardnumber"];
                $expirymonth = $row["expirymonth"];
                $expiryyear = $row["expiryyear"];
                $cvv = $row["CVV"];
                $order_id = $row["order_id"];
                $order_cost = $row["order_cost"];
                $order_time = $row["order_time"];
                $order_status = $row["order_status"];        
            
        }
        echo "</table>";
        // Frees up the memory, after using the result pointer
        mysqli_free_result($result);
    } // if successful query operation
    
    // close the database connection
    mysqli_close($conn);
} // if successful database connection

function ccMasking($number, $maskingCharacter = 'X') {
    return str_repeat($maskingCharacter, strlen($number) - 4) . substr($number, -4);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Assignment 3 submission: Receipt page" />
    <meta name="keywords" content="HTML5, CSS, PHP" />
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
        <p>Name: <?php echo "$firstname"; ?> <?php echo "$lastname"; ?> </p>
        <p>Email: <?php echo "$customeremail"; ?> </p>
        <h3>Address</h3>
        <p>Street Address: <?php echo "$streetaddress"; ?> </p>
        <p>Suburb/Town: <?php echo "$suburb"; ?> </p>
        <p>State: <?php echo "$state"; ?> </p>
        <p>Postcode: <?php echo "$postcode"; ?> </p>
        <h3>Contact Details</h3>
        <p>Phone Number: <?php echo "$phonenumber"; ?> </p>
        <p>Preferred Contact: <?php if ($prefctc == "prefemail") {echo "By Email";} else if ($prefctc == "prefpost") {echo "By Post";} 
        else if ($prefctc == "prefphone") {echo "By Phone";} else {echo "Preference Error";} ?> </p>
        <h3>Order List</h3>
        <p><?php if ($orderlist == "macbookpro") {echo "Macbook Pro";} else if ($orderlist == "asusrog") {echo "Asus ROG Strix G15";} 
        else if ($orderlist == "aceraspire3") {echo "Acer Aspire 3 Notebook";} else if ($orderlist == "hpenvy") {echo "HP Envy Laptop ";} else {echo "Product Error";}?> </p>
        <p> Order ID: <?php echo "$order_id"; ?></p>
        <p> Order Time: <?php echo "$order_time"; ?> </p>
        <p> Order Status: <?php echo "$order_status"; ?> </p>
        <p>Total Price: <?php echo "$ $order_cost .00"; ?> </p>
        <br />
        <h3>Payment Details</h3>
        <p> Card Type: <?php echo "$cardtype"; ?> </p>
        <p> Card Name: <?php echo "$cardname"; ?> </p>
        <p> Card Number: <?php echo ccMasking($cardnumber); ?>  </p>
        <p> Expiry Month: <?php echo "$expirymonth"; ?> </p>
        <p> Expiry Year: <?php echo "$expiryyear"; ?> </p>
        <p> CVV: <?php echo "$cvv"; ?> </p>
    </article>
</body>
<footer>
    <?php include('footer.inc'); ?>
</footer>
</html>