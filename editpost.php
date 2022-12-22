<?php 
    require_once 'db/conn.php';

    if(isset($_POST['submit'])){
    
        $id = $_POST['id'];
        $fname = $_POST['firstname'];
        $mname = $_POST['middlename'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dateofbirth'];
        $trn = $_POST['trn'];
        $nis = $_POST['nis'];
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $parish = $_POST['parish'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $contact = $_POST['contactnumber'];
        $programmes = $_POST['programmes'];

      
        $result = $crud->editRegistrant($id,$fname, $mname, $lname, $dob, $trn, $nis, $address1, $address2, $parish, $gender, $email,$contact,$programmes);
       
        if($result){
            header("Location: viewrecords.php");
        }
        else{
            include 'includes/errormessage.php';
        }
    }
    else{
         include 'includes/errormessage.php';
    }

    

?>