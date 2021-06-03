<?php
    echo "<p>Processing Order</p>";
    if(!isset($_SERVER['HTTP_REFERER'])){
        header('location:index.php');
        exit;
    }

    session_start();
    
    //sanitise input function
    function sanitise_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //getLength of cardnumber
    function getLength($number)
    {
        return strlen($number);
    }

     //calculate total price
    function calculatePrice($price, $quantity)
    {
        return $price * $quantity;
    }

    //validate input function
    function validate()
    {
        $errMsg = array();
        $result = array();

        for ($i = 0; $i <= 17; $i++)
        {
            $result[$i] = true;
        }        
       
            if ($_POST["payment"])
            {
                //passing values from payment.php, and inputs originally from enquire.php
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
                $cardtype_saved = $_POST["cardtype"];
                $cardname_saved	= $_POST["cardname"];
                $cardnumber_saved	= $_POST["cardnumber"];
                $expirymonth_saved	= $_POST["expirymonth"];
                $expiryyear_saved	= $_POST["expiryyear"];
                $cvv_saved	= $_POST["cvv"];
            }
            else if ($_POST["fixedform"])
            {  
                //pass values from fix_order if there are any
                $firstname_saved = $_POST["firstname"];
                $lastname_saved = $_POST["lastname"];
                $customeremail_saved = $_POST["customeremail"];
                $streetaddress_saved = $_POST["streetaddress"];
                $suburb_saved = $_POST["suburb"];
                $state_saved = $_POST["state"];
                $postcode_saved = $_POST["postcode"];
                $phonenumber_saved = $_POST["phonenumber"];
                $prefctc_saved = $_POST["prefctc"];
                $orderlist_saved = $_POST["orderlist"];
                $quantity_saved = $_POST["quantity"];
                $cardtype_saved = $_POST["cardtype"];
                $cardname_saved	= $_POST["cardname"];
                $cardnumber_saved	= $_POST["cardnumber"];
                $expirymonth_saved	= $_POST["expirymonth"];
                $expiryyear_saved	= $_POST["expiryyear"];
                $cvv_saved	= $_POST["cvv"];
            }

        //sanitise input before going into database
        $firstname_saved = sanitise_input($firstname_saved);
        $lastname_saved = sanitise_input($lastname_saved);
        $customeremail_saved = sanitise_input($customeremail_saved);
        $streetaddress_saved = sanitise_input($streetaddress_saved);
        $suburb_saved = sanitise_input($suburb_saved);
        $state_saved = sanitise_input($state_saved);
        $postcode_saved = sanitise_input($postcode_saved);
        $phonenumber_saved = sanitise_input($phonenumber_saved);
        $prefctc_saved = sanitise_input($prefctc_saved);
        $orderlist_saved = sanitise_input($orderlist_saved);
        $quantity_saved = sanitise_input($quantity_saved);
        $cardtype_saved = sanitise_input($cardtype_saved);
        $cardname_saved = sanitise_input($cardname_saved);
        $cardnumber_saved = sanitise_input($cardnumber_saved);
        $expirymonth_saved = sanitise_input($expirymonth_saved);
        $expiryyear_saved = sanitise_input($expiryyear_saved);
        $cvv_saved = sanitise_input($cvv_saved);

        //check firstname
        if (!isset($firstname_saved) || $firstname_saved == '')
        {
            $errMsg[0] = "First names are required.\n";
            $result[0] = false;
        }
        else
        {
            if (!preg_match("/^[a-zA-Z]+$/",$firstname_saved))
            {
                $errMsg[0] = "Only letters allowed in first names\n";
                $result[0] = false;
            }
        }

        //check lastname
        if (!isset($lastname_saved) || $lastname_saved == '')
        {
            $errMsg[1] = "Last names are required.\n";
            $result[1] = false;
        }
        else
        {
            if (!preg_match("/^[a-zA-Z\s]+$/",$lastname_saved))
            {
                $errMsg[1] = "Only letters allowed in last names\n";
                $result[1] = false;
            }
        }

        //check email
        if (!isset($customeremail_saved) || $customeremail_saved == '')
        {
            $errMsg[2] = "Email addresses are required.\n";
            $result[2] = false;
        }
        else
        {
            if (!filter_var($customeremail_saved, FILTER_VALIDATE_EMAIL))
            {
                $errMsg[2] = "Invalid email address.\n";
                $result[2] = false;
            }
        }

        //check street address
        if (!isset($streetaddress_saved) || $streetaddress_saved == '')
        {
            $errMsg[3] = "Street addresses are required.\n";
            $result[3] = false;
        }
        else
        {
            if (getLength($streetaddress_saved) > 40)
            {
                $errMsg[3] = "Please input a shorter street address.\n";
                $result[3] = false;
            }
        }

        //check suburb
        if (!isset($suburb_saved) || $suburb_saved == '')
        {
            $errMsg[4] = "Suburb names are required.\n";
            $result[4] = false;
        }
        else
        {
            if (getLength($suburb_saved) > 20)
            {
                $errMsg[4] = "Please input a shorter suburb name.\n";
                $result[4] = false;
            }
        }

        //check state
        if (!isset($state_saved) || $state_saved == '')
        {
            $errMsg[5] = "Please choose a state.\n";
            $result[5] = false;
        }

        //check postcode
        if (!isset($postcode_saved) || $postcode_saved == '')
        {
            $errMsg[6] = "Postcodes are required.\n";
            $result[6] = false;
        }
        else
        {
            if (!is_numeric($postcode_saved))
            {
                $errMsg[6] = "Only numbers allowed in postcodes.\n";
                $result[6] = false;
            }
            else
            {
                if (!getLength($postcode_saved) == 4)
                {
                    $errMsg[6] = "Input only 4 digits.\n";
                    $result[6] = false;
                }
                else
                {
                    //check state against postcode
                    if ($result[5])
                    {
                        switch($state_saved)
                        {
                        case "VIC": 
                        if ($postcode_saved[0] != 3 && $postcode_saved[0] != 8)
                        {
                            $errMsg[6] += "VIC postcodes can only start with 3 or 8.\n"; 
                            $result[6] = false;
                        }          
                        break;
                        case "NSW": 
                        if ($postcode_saved[0] != 2 && $postcode_saved[0] != 1)
                        {
                            $errMsg[6] += "NSW postcodes can only start with 1 or 2.\n"; 
                            $result[6] = false;
                        }          
                        break;
                        case "QLD": 
                        if ($postcode_saved[0] != 4 && $postcode_saved[0] != 9)
                        {
                            $errMsg[6] += "QLD postcodes can only start with 4 or 9.\n"; 
                            $result[6] = false;
                        }          
                        break;
                        case "NT": 
                        if ($postcode_saved[0] != 0)
                        {
                            $errMsg[6] += "NT postcodes can only start with 0.\n"; 
                            $result[6] = false;
                        }          
                        break;
                        case "WA": 
                        if ($postcode_saved[0] != 6)
                        {
                            $errMsg[6] += "WA postcodes can only start with 6.\n"; 
                            $result[6] = false;
                        }          
                        break;
                        case "SA": 
                        if ($postcode_saved[0] != 5)
                        {
                            $errMsg[6] += "SA postcodes can only start with 5.\n"; 
                            $result[6] = false;
                        }          
                        break;
                        case "TAS": 
                        if ($postcode_saved[0] != 7)
                        {
                            $errMsg[6] += "TAS postcodes can only start with 7.\n"; 
                            $result[6] = false;
                        }          
                        break;
                        case "ACT": 
                        if ($postcode_saved[0] != 0)
                        {
                            $$errMsg[6] += "ACT postcodes can only start with 0.\n"; 
                            $result[6] = false;
                        }          
                        break;
                        default:
                            $errMsg[6] += "Unrecognized postcode. Please check again.\n";
                            $result[6] = false;
                        break;
                        }
                    }                    
                }
            }
        }

        //check phone number
        if (!isset($phonenumber_saved) || $phonenumber_saved == '')
        {
            $errMsg[7] = "Phone numbers are required.\n";
            $result[7] = false;
        }
        else
        {
            if (getLength($phonenumber_saved) > 10)
            {
                $errMsg[7] = "Please input at most 10 digits.\n";
                $result[7] = false;
            }
        }

        //check preferred contact
        if (!isset($prefctc_saved) || $prefctc_saved == '')
        {
            $errMsg[8] = "Preferred contact unavailable.\n";
            $result[8] = false;
        }

        //check product list
        if (!isset($orderlist_saved) || $orderlist_saved == '')
        {
            $errMsg[9] = "Please choose at least one item.\n";
            $result[9] = false;
        }

        //check quantity
        if (!isset($quantity_saved) || $quantity_saved == '')
        {
            $errMsg[10] = "Please select the number of items.\n";
            $result[10] = false;
        }
        else
        {
            if ($quantity_saved < 1 || $quantity_saved > 100)
            {
                $errMsg[10] = "Please input a number between 1 to 100.\n";
                $result[10] = false;
            }
        }

        //check card type
        if (!isset($cardtype_saved) || $cardtype_saved == '')
        {
            $errMsg[11] = "Please choose your credit card type.\n";
            $result[11] = false;
        }

        //check card name
        if (!isset($cardname_saved) || $cardname_saved == '')
        {
            $errMsg[12] = "Card names are required.\n";
            $result[12] = false;
        }
        else
        {
            if (!preg_match("/^[a-zA-Z\s]+$/",$cardname_saved))
            {
                $errMsg[12] = "Only letters allowed in card names.\n";
                $result[12] = false;
            }
        }
        
        //check card number
        if (!isset($cardnumber_saved) || $cardnumber_saved == '')
        {
            $errMsg[13] = "Card numbers are required.\n";
            $result[13] = false;
        }
        else
        {
            if (!is_numeric($cardnumber_saved))
            {
                $errMsg[13] = "Only numbers allowed in card numbers.\n";
                $result[13] = false;
            }
            else
            {
                if ($result[11])
                {
                    //check card details
                    switch($cardtype_saved)
                    {
                        case "mastercard":
                            if (getLength($cardnumber_saved)!=16 || $cardnumber_saved[0] != 4)
                            {
                                $errMsg[13] += "Wrong card number. Mastercard card numbers must be 16 digits long and start with 4.\n";
                                $result[13] = false;
                            }
                            break;
                        case "visa":
                            if (getLength($cardnumber_saved)!=16 || $cardnumber_saved[0]!=5 || $cardnumber_saved[1]>5 || $cardnumber_saved[1]<1)
                            {
                                $errMsg[13] += "Wrong card number. Visa card numbers must be 16 digits long and start with 51 to 55.\n";
                                $result[13] = false;
                            }
                            break;
                        case "americanexpress":
                            if (getLength($cardnumber_saved)!=15 || $cardnumber_saved[0]!=3 || $cardnumber_saved[1]!=4 || $cardnumber_saved[1]!=7)
                            {
                                $errMsg[13] += "Wrong card number. American Express card numbers must be 15 digits long and start with 34 or 37.\n";
                                $result[13] = false;
                            }
                            break;
                        default:
                            $errMsg[13] += "Unrecognized card number. Please check again.\n";
                            $result[13] = false;
                            break;
                    }
                }
            }
        }


        //check expiry month
        if (!isset($expirymonth_saved) || $expirymonth_saved == '')
        {
            $errMsg[14] = "Please input expiry month.\n";
            $result[14] = false;
        }
        else
        {
            if ($expirymonth_saved > 12 || $expirymonth_saved < 1)
            {
                $errMsg[14] += "Expiry month error. Please make sure expiry month is between 1 to 12.";
                $result[14] = false;
            }
        }

        //check expiry year
        if (!isset($expiryyear_saved) || $expiryyear_saved == '')
        {
            $errMsg[15] = "Please input expiry year.\n";
            $result[15] = false;
        }

        //check cvv
        if (!isset($cvv_saved) || $cvv_saved == '')
        {
            $errMsg[16] = "Please input CVV.\n";
            $result[16] = false;
        }
        else
        {
            if (!getLength($cvv_saved) == 3)
            {
                $errMsg[16] += "CVV has to be 3 digits.\n";
                $result[16] = false;
            }
        }
        
        //passing values to session
        $_SESSION["firstnamesaved"] = $firstname_saved;
        $_SESSION["lastnamesaved"] = $lastname_saved;
        $_SESSION["customeremailsaved"] = $customeremail_saved;
        $_SESSION["streetaddresssaved"] = $streetaddress_saved;
        $_SESSION["suburbsaved"] = $suburb_saved;
        $_SESSION["statesaved"] = $state_saved;
        $_SESSION["postcodesaved"] = $postcode_saved;
        $_SESSION["phonenumbersaved"] = $phonenumber_saved;
        $_SESSION["prefctcsaved"] = $prefctc_saved;
        $_SESSION["orderlistsaved"] = $orderlist_saved;
        $_SESSION["quantitysaved"] = $quantity_saved;
        $_SESSION["cardtype"] = $cardtype_saved;
        $_SESSION["cardname"] = $cardname_saved;
        $_SESSION["cardnumber"] = $cardnumber_saved;
        $_SESSION["expirymonth"] = $expirymonth_saved;
        $_SESSION["expiryyear"] = $expiryyear_saved;
        $_SESSION["cvv"] = $cvv_saved;
        $_SESSION["errMsg"] = $errMsg;
        $_SESSION["result"] = $result;

        $fix = 0;
        foreach ($result as $fixornot)
        {
            if (!$fixornot)
            {   
                $fix++;
            }
        }

        $_SESSION["fix"] = $fix;
    }

    validate();

    if (!$_SESSION['fix'] == 0)
    {
        header ("location:fix_order.php");
    }
    else
    {
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
    $cardname_saved = $_SESSION["cardname"];
    $cardnumber_saved = $_SESSION["cardnumber"];
    $expirymonth_saved = $_SESSION["expirymonth"];
    $expiryyear_saved = $_SESSION["expiryyear"];
    $cvv_saved = $_SESSION["cvv"];

    switch ($orderlist_saved)
        {
        case "macbookpro":
            $order_cost = calculatePrice(1999,$quantity_saved);
            break;
        case "asusrog":
            $order_cost = calculatePrice(1919,$quantity_saved);
            break;
        case "aceraspire3":
            $order_cost = calculatePrice(477,$quantity_saved);
            break;
        case "hpenvy":
            $order_cost = calculatePrice(1688,$quantity_saved);
            break;
        default:
            $order_cost = 0;
            break;
        }

        $order_time = date('Y-m-d H:i:s');
        $order_status = "PENDING";

        $_SESSION["order_cost"] = $order_cost;
        $_SESSION["order_time"] = $order_time;
        $_SESSION["order_status"] = $order_status;

    require_once('settings.php');

    // The @ operator suppresses the display of any error messages
	// mysqli_connect returns false if connection failed, otherwise a connection value
	$conn = @mysqli_connect($host,
        $user,
        $pwd,
        $sql_db
    );

    // Checks if connection is successful
	if (!$conn) {
		// Displays an error message, avoid using die() or exit() as this terminates the execution
		// of the PHP script
		echo "<p>Database connection failure</p>";  //Would not show in a production script 
	} else {
		// Upon successful connection
		$sql_table="orders";
        $fieldDefinition="name_saved VARCHAR(25), lastname_saved VARCHAR(25), customeremail_saved VARCHAR(40), streetaddress_saved VARCHAR(40), suburb_saved VARCHAR(20), state_saved VARCHAR(3),
            postcode_saved INT(4), phonenumber_saved INT(10), prefctc_saved VARCHAR(9), orderlist_saved VARCHAR(40), quantity_saved INT(3), cardtype VARCHAR(15),
            cardname VARCHAR(40), cardnumber INT(16), expirymonth INT(2), expiryyear INT(2), CVV INT(3), order_id INT AUTO_INCREMENT PRIMARY KEY, order_cost FLOAT, 
            order_time DATETIME, order_status VARCHAR(10)";

        // check: if table does not exist, create it
		$sqlString = "show tables like '$sql_table'";  // another alternative is to just use 'create table if not exists ...'
		$result = @mysqli_query($conn, $sqlString);
		// checks if any tables of this name
		if(mysqli_num_rows($result)==0) {
			echo "<p>Table does not exist - create table $sql_table</p>"; // Might not show in a production script 
			$sqlString = "create table " . $sql_table . "(" . $fieldDefinition . ")";; 
			$result2 = @mysqli_query($conn, $sqlString);
		    // checks if the table was created
		    if($result2===false) {
				echo "<p class=\"wrong\">Unable to create Table $sql_table.". msqli_errno($conn) . ":". mysqli_error($conn) ." </p>"; //Would not show in a production script 
			} else {
			// display an operation successful message
			echo "<p class=\"ok\">Table $sql_table created OK</p>"; //Would not show in a production script 
			} // if successful query operation

        } else {
			// display an operation successful message
			echo "<p>Table  $sql_table already exists</p>"; //Would not show in a production script 
		} // if successful query operation
		
		// Set up the SQL command to add the data into the table
		$query = "insert into $sql_table"
						."(name_saved, lastname_saved, customeremail_saved, streetaddress_saved, suburb_saved, state_saved, postcode_saved, phonenumber_saved, prefctc_saved, orderlist_saved,
                        quantity_saved, cardtype, cardname, cardnumber, expirymonth, expiryyear, CVV, order_cost, order_time, order_status)"
					. " values "
						."('$firstname_saved', '$lastname_saved', '$customeremail_saved', '$streetaddress_saved', '$suburb_saved', '$state_saved', '$postcode_saved', '$phonenumber_saved', 
                        '$prefctc_saved', '$orderlist_saved', '$quantity_saved', '$cardtype_saved', '$cardname_saved', '$cardnumber_saved', '$expirymonth_saved', '$expiryyear_saved', '$cvv_saved',
                        '$order_cost', '$order_time', '$order_status')";
		// execute the query
		$result = mysqli_query($conn, $query);
		// checks if the execution was successful
		if(!$result) {
			echo "<p class=\"wrong\">Something is wrong with ",	$query, "</p>";  //Would not show in a production script 
		} else {
			// display an operation successful message
			echo "<p class=\"ok\">Successfully added New member</p>";
		} // if successful query operation
				
		// close the database connection
		mysqli_close($conn);
	}  // if successful database connection

    header("location:receipt.php");
    }        

?>