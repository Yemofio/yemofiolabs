<?php

    //connect to controller 
    require("customer_controller.php");

    
    $Errors = array();

    //check submit click
    if (isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confpassword = $_POST['confpassword'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $contact = $_POST['contact'];
        
        
        //check for empty fields        
        if (empty($name)){
            array_push($Errors, "Field required.");  
        }
        if (empty($email)){
            array_push($Errors, "Field required.");
        }  
        if (empty($password)){
            array_push($Errors, "Field required.");    
        }
        if (empty($confpassword)){
            array_push($Errors, "Field required.");
        }
        if (empty($country)){
            array_push($Errors, "Field required..");
        }
        if (empty($city)){
            array_push($Errors, "Field required.");  
        }
        if (empty($contact)){
            array_push($Errors, "Field required.");  
        }    

            
        //check for entry length requirement
        if(strlen($name) > 50){
            array_push($Errors, "Use shorter name");
        }
        if(strlen($email) > 50){
            array_push($Errors, "Entry is too long");
        }
        if(strlen($country) > 20){
            array_push($Errors, "Entry is too long");
        }
        if(strlen($city) > 40){
            array_push($Errors, "Entry is too long");
        }
        if(strlen($contact) > 20){
            array_push($Errors, "Entry is too long");
        }
        if ($password!=$confpassword){
            array_push($Errors, "Passwords not matching");
        }
        

        //check if email exists
        $email_check = check_email($email);
        if(!empty($email_check)){
            array_push($Errors, "Email already in use.");
        }
    } 
            
        //if no errors are found, paasword is encrypted and user is registered  
    if (count($Errors)==0){
            $password = md5($password);
            $execute = Add_customer_ctrl($name, $email, $password, $country, $city, $contact);
                
        if ($execute) {
            header("location:login.php");
        }
        else {
            echo "Error, customer cannot be created at the moment."; 
        }
    }
    
    else {
        foreach ($Errors as $Error){
        echo $Error."<br>";
        }   
    }
    
            
        
            
            
        //insert new user

?>
    
    
