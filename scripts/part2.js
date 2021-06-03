/**
 * Author: Michelle Chuwindra 101721043
 * Target: enquire.php
 * Purpose: This file is used to handle inputs and outputs
 * Created: 25 April 2021
 * Last Updated: 24 May 2021
 */

 "use strict"; //prevents creation of global variables

 //get preferred contact method
 function getPrefCtc ()
 {
    var PrefCtc = "Unknown";
    var PrefCtcArray = document.getElementById("prefctc").getElementsByTagName("input");
    for (var i = 0; i < PrefCtcArray.length; i++)
    {
        if (PrefCtcArray[i].checked)
        {   
            PrefCtc = PrefCtcArray[i].value;
        }
    }
    return PrefCtc;
 }

 //calculate total price
 function calculatePrice(price, quantity)
 {
    return price * quantity;
 }

 //client-side storage
 function storeCart(firstname, lastname, customeremail, streetaddress, suburb, state, postcode, phonenumber, prefctc, productsel, quantity)
 {
    sessionStorage.firstname = firstname;
    sessionStorage.lastname = lastname;
    sessionStorage.customeremail = customeremail;
    sessionStorage.streetaddress = streetaddress;
    sessionStorage.suburb = suburb;
    sessionStorage.state = state;
    sessionStorage.postcode = postcode;
    sessionStorage.phonenumber = phonenumber;
    sessionStorage.prefctc = prefctc;
    sessionStorage.productsel = productsel;
    sessionStorage.quantity = quantity;
    alert("Cart information saved!");
 }

 //retrive client-side storage
 function getCart()
 {
    document.getElementById("name_saved").textContent = sessionStorage.firstname + " " + sessionStorage.lastname;
    document.getElementById("customeremail_saved").textContent = sessionStorage.customeremail;
    document.getElementById("streetaddress_saved").textContent = sessionStorage.streetaddress;
    document.getElementById("suburb_saved").textContent = sessionStorage.suburb;
    document.getElementById("state_saved").textContent = sessionStorage.state;
    document.getElementById("postcode_saved").textContent = sessionStorage.postcode;
    document.getElementById("phonenumber_saved").textContent = sessionStorage.phonenumber;
    document.getElementById("prefctc_saved").textContent = sessionStorage.prefctc;

    switch(sessionStorage.prefctc)
    {
        case "prefemail":
            document.getElementById("prefctc_saved").textContent = "By Email";
            break;
        case "prefpost":
            document.getElementById("prefctc_saved").textContent = "By Post";
            break;
        case "prefphone":
            document.getElementById("prefctc_saved").textContent = "By Phone";
            break;
        default:
            document.getElementById("prefctc_saved").textContent = "No Preferred Method Saved";
            break;
    }

    switch (sessionStorage.productsel)
    {
        case "macbookpro":
            document.getElementById("orderlist_saved").textContent = "Macbook Pro               x "+ sessionStorage.quantity;
            document.getElementById("totalprice").textContent = "$" + calculatePrice(1999,sessionStorage.quantity) + ".00";
            break;
        case "asusrog":
            document.getElementById("orderlist_saved").textContent = "Asus ROG Strix G15        x "+ sessionStorage.quantity;
            document.getElementById("totalprice").textContent = "$" + calculatePrice(1919,sessionStorage.quantity) + ".00";
            break;
        case "aceraspire3":
            document.getElementById("orderlist_saved").textContent = "Acer Aspire 3 Notebook    x "+ sessionStorage.quantity;
            document.getElementById("totalprice").textContent = "$" + calculatePrice(477,sessionStorage.quantity) + ".00";
            break;
        case "hpenvy":
            document.getElementById("orderlist_saved").textContent = "HP Envy Laptop            x "+ sessionStorage.quantity;
            document.getElementById("totalprice").textContent = "$" + calculatePrice(1688,sessionStorage.quantity) + ".00";
            break;
        default:
            document.getElementById("orderlist_saved").textContent = "Cart info unavailable. Please refresh.";
            document.getElementById("totalprice").textContent = "$0.00";
            break;
    }    
 }

 //cancel order button
 function cancelOrder()
 {
    window.location.href = "index.php";
 }

 //get length of credit card number
 function getLength(number)
 {
    return number.toString().length;
 }

 //validates enquiry form inputs
 function validate()
 {
     //initialize local variable
    var errMsg = "";                                    //store error message
    var result = true;                                  //to check for errors

    var firstname = document.getElementById("firstname").value;
    var lastname = document.getElementById("lastname").value;
    var customeremail = document.getElementById("customeremail").value;
    var streetaddress = document.getElementById("streetaddress").value;
    var suburb = document.getElementById("suburb").value;
    var state = document.getElementById("state").value;
    var postcode = document.getElementById("postcode").value;
    var phonenumber = document.getElementById("phonenumber").value;    
    var prefctc = getPrefCtc();
    var productsel = document.getElementById("productsel").value;
    var quantity = document.getElementById("quantity").value;


    //check postcodes
    switch(state)
    {
        case "VIC": 
        if (postcode[0] != 3 && postcode[0] != 8)
        {
            errMsg += "VIC postcodes can only start with 3 or 8.\n"; 
            result = false;
        }          
        break;
        case "NSW": 
        if (postcode[0] != 2 && postcode[0] != 1)
        {
            errMsg += "NSW postcodes can only start with 1 or 2.\n"; 
            result = false;
        }          
        break;
        case "QLD": 
        if (postcode[0] != 4 && postcode[0] != 9)
        {
            errMsg += "QLD postcodes can only start with 4 or 9.\n"; 
            result = false;
        }          
        break;
        case "NT": 
        if (postcode[0] != 0)
        {
            errMsg += "NT postcodes can only start with 0.\n"; 
            result = false;
        }          
        break;
        case "WA": 
        if (postcode[0] != 6)
        {
            errMsg += "WA postcodes can only start with 6.\n"; 
            result = false;
        }          
        break;
        case "SA": 
        if (postcode[0] != 5)
        {
            errMsg += "SA postcodes can only start with 5.\n"; 
            result = false;
        }          
        break;
        case "TAS": 
        if (postcode[0] != 7)
        {
            errMsg += "TAS postcodes can only start with 7.\n"; 
            result = false;
        }          
        break;
        case "ACT": 
        if (postcode[0] != 0)
        {
            errMsg += "ACT postcodes can only start with 0.\n"; 
            result = false;
        }          
        break;
        default:
            errMsg += "Unrecognized postcode. Please check again.\n";
            result = false;
        break;
    }

    //get variables from form and check rules here
    //if something is wrong set result = false, and concatenate error message
    if (errMsg != "")                                       //display message box if there's something to show
    {   
        alert(errMsg);                                      
    }
    if (result)                                             //if form is validated, the form is saved
    {
        storeCart(firstname, lastname, customeremail, streetaddress, suburb, state, postcode, phonenumber, prefctc, productsel, quantity);
    }
    return result;                                          //if false the information will not be sent to the server
 }

 //validates payment form inputs
 function validatepayment()
 {
     //initialize local variable
    var errMsg = "";                                    //store error message
    var result = true;                                  //to check for errors

    var cardtype = document.getElementById("cardtype").value;
    var cardnumber = document.getElementById("cardnumber").value;
    var expirymonth = document.getElementById("expirymonth").value;

    //check card details
    switch(cardtype)
    {
        case "mastercard":
            if (getLength(cardnumber)!=16 || cardnumber[0] != 4)
            {
                errMsg += "Wrong card number. Mastercard card numbers must be 16 digits long and start with 4.\n";
                result = false;
            }
            break;
        case "visa":
            if (getLength(cardnumber)!=16 || cardnumber[0]!=5 || cardnumber[1]>5 || cardnumber[1]<1)
            {
                errMsg += "Wrong card number. Visa card numbers must be 16 digits long and start with 51 to 55.\n";
                result = false;
            }
            break;
        case "americanexpress":
            if (getLength(cardnumber)!=15 || cardnumber[0]!=3 || cardnumber[1]!=4 || cardnumber[1]!=7)
            {
                errMsg += "Wrong card number. American Express card numbers must be 15 digits long and start with 34 or 37.\n";
                result = false;
            }
            break;
        default:
            errMsg += "Unrecognized card number. Please check again.\n";
            result = false;
            break;
    }

    //check expiry month
    if (expirymonth > 12 || expirymonth < 1)
    {
        errMsg += "Expiry month error. Please make sure expiry month is between 1 to 12."
        result = false;
    }

    //get variables from form and check rules here
    //if something is wrong set result = false, and concatenate error message
    if (errMsg != "")                                      //display message box if there's something to show
    {   
        alert(errMsg);                                      
    }
    return result;                                          //if false the information will not be sent to the server
 }

 function init() 
 {   
    debug = true;
    if (!debug)
    {
        if (document.getElementById("enquiryform") !== null)
        {
            var enquiryForm = document.getElementById("enquiryform");
            enquiryForm.onsubmit = validate;     
        }
        if (document.getElementById("carddetails") !== null)
        {
            var paymentForm = document.getElementById("carddetails");
            getCart();
            paymentForm.onsubmit = validatepayment;
        }
        document.getElementById("CancelOrder").onclick = cancelOrder;
    }     
 }

 window.onload = init;