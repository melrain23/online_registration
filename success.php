<?php 
    $title = 'Success';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    //require_once 'sendemail.php';
    

    if(isset($_POST['submit'])){
        $fname = $_POST['firstname'];
        $mname = $_POST['middlename'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $trn = $_POST['trn'];
        $nis = $_POST['nis'];
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $parish = $_POST['parish'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $programme = $_POST['programme'];

        $orig_file = $_FILES["avatar"]["tmp_name"];
        $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
        $target_dir = 'uploads/';
        $destination = "$target_dir$contact.$ext";
        move_uploaded_file($orig_file,$destination);


       
        $isSuccess = $crud->insertRegistrant($fname, $mname, $lname, $dob, $trn, $nis, $address1, $address2, $parish, $gender, $email, $contact, $programme, $destination);
        $programmeName = $crud->getprogrammeById($programme);
        
        // if($isSuccess){
        //     SendEmail::SendMail($email, 'Welcome to IT Conference 2022', 'You have successfully registerted for this year\'s IT Conference');
        //     include 'includes/successmessage.php';
        // }
        // else{
        //     include 'includes/errormessage.php';
        // }

    }
?>

    <h1 class="text-center text-success">You Have Been Registered for <?php echo $programmeName['programme_name'];?>! </h1>



    <img src="<?php echo $destination;?>" class="rounded-circle" style="width: 18rem; height: 18rem"/>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?php echo $_POST['firstname'] . ' '.$_POST['lastname']; ?>
            </h5>
            <h6 class="card-subtitle mb-3 text-muted"><?php echo $programmeName['programme_name']; ?>
            </h6>
            <p class="card-text">Date of Birth: <?php echo $_POST['dob']; ?></p>
            <p class="card-text">Email Address: <?php echo $_POST['email']; ?></p>
            <p class="card-text">Contact Number: <?php echo $_POST['phone']; ?></p>
                       
        </div>
    </div>

   <br/>
        <a href="viewrecords.php" class="btn btn-info">Back to List</a>
    
<br>
<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>