<?php
    $title = 'Edit Record'; 

    require_once 'includes/header.php'; 
    require_once 'includes/authcheck.php';
    require_once 'db/conn.php'; 

    $results = $crud->getProgrammes();

    if(!isset($_GET['id']))
    {
         include 'includes/errormessage.php';
         header("Location: viewrecords.php");
    }
    else{
        $id = $_GET['id'];
        $registrant = $crud->getRegistrantDetails($id); 
?>

    <h1 class="text-center">Edit Registrant </h1>
    
    <form method="post" action="editpost.php" enctype="multipart/form-data">
            <input type="hidden" name ="id" value="<?php echo $registrant['registrant_id'] ?>" />
            <div class="row">
        <div class="col-sm-4">
            <label for="firstname" class="form-label">First Name</label>
            <input required type="text" class="form-control" value="<?php echo $registrant['firstname'] ?>" id="firstname" name="firstname">
        </div>
        <div class="col-sm-4">
            <label for="middlename" class="form-label">Middle Name</label>
            <input required type="text" class="form-control" value="<?php echo $registrant['middlename'] ?>" id="middlename" name="middlename">
        </div>
        <div class="col-sm-4">
            <label for="lastname" class="form-label">Last Name</label>
            <input required type="text" class="form-control" value="<?php echo $registrant['lastname'] ?>" id="lastname" name="lastname">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-4">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="text" class="form-control" value="<?php echo $registrant['dateofbirth'] ?>" id="dob" name="dob">
        </div>
        <div class="col-sm-4">
            <label for="trn" class="form-label">TRN</label>
            <input required type="text" class="form-control" value="<?php echo $registrant['trn'] ?>" id="trn" name="trn">
        </div>
        <div class="col-sm-4">
            <label for="nis" class="form-label">NIS</label>
            <input required type="text" class="form-control" value="<?php echo $registrant['nis'] ?>" id="nis" name="nis">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-4">
            <label for="address1" class="form-label">Address 1</label>
            <input type="text" class="form-control" value="<?php echo $registrant['address1'] ?>" id="address1" name="address1">
        </div>
        <div class="col-sm-4">
            <label for="address2" class="form-label">Address 2</label>
            <input required type="text" class="form-control" value="<?php echo $registrant['address2'] ?>" id="address2" name="address2">
        </div>

        <div class="col-md-4">
            <label for="parish" class="form-label">Parish</label>
            <select class="form-control" name="parish" id="parish">
            <option selected>Select Parish</option>
            <option>Kingston</option>
            <option>St. Andrew</option>
            <option>St. Catherine</option>
            <option>Clarendon</option>
            <option>Manchester</option>
            <option>St. Elizabeth</option>
            <option>Westmoreland</option>
            <option>Hanover</option>
            <option>St. James</option>
            <option>Trelawny</option>
            <option>St. Ann</option>
            <option>St. Mary</option>
            <option>Portland </option>
            <option>St. Thomas</option>
            </select>
        </div>
        <br>
        <br>
        </div>  
        <div class="row">
            <div class="col-md-6">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-control" aria-label="gender" name="gender" id="gender">
                <option selected>Select Gender</option>
                <option>Male</option>
                <option>Female</option>
                </select>
            </div>
    
            <div class="col-sm-6">
                <label for="phone" class="form-label">Contact Number</label>
                <input type="text" class="form-control" value="<?php echo $registrant['contactnumber'] ?>" id="phone" name="phone" aria-describedby="phoneHelp">
            </div>  
        </div>
        <br>
        <div class="mb-3">
        <label for="programme" class="form-label">Programmes</label>
        <select class="form-control" aria-label="programme" name="programme">
            <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                <option value="<?php echo $r['programmes_id'] ?>"><?php echo $r['programme_name']; ?></option>
            <?php }?>
        </select>
    </div>

        <br>
        <a href="viewrecords.php" class="btn btn-info">Back to List</a>
        <button type="submit" name="submit" class="btn btn-success">Save Changes</button>
        </form>

        <?php } ?>
    <br>
    <br>
    <br>
    <br>
    
    <?php require_once 'includes/footer.php'; ?>