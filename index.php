<?php 
    $title = 'Index';

    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $results = $crud->getProgrammes();
?>
 
<h1 class="text-center">Programme Registration for 2023</h1>
    
<form method="post" action="success.php" enctype="multipart/form-data"> 


    <div class="row">
        <div class="col-sm-4">
            <label for="firstname" class="form-label">First Name</label>
            <input required type="text" class="form-control" id="firstname" name="firstname">
        </div>
        <div class="col-sm-4">
            <label for="middlename" class="form-label">Middle Name</label>
            <input required type="text" class="form-control" id="middlename" name="middlename">
        </div>
        <div class="col-sm-4">
            <label for="lastname" class="form-label">Last Name</label>
            <input required type="text" class="form-control" id="lastname" name="lastname">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-4">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="text" class="form-control" id="dob" name="dob">
        </div>
        <div class="col-sm-4">
            <label for="trn" class="form-label">TRN</label>
            <input required type="text" class="form-control" id="trn" name="trn">
        </div>
        <div class="col-sm-4">
            <label for="nis" class="form-label">NIS</label>
            <input required type="text" class="form-control" id="nis" name="nis">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-4">
            <label for="address1" class="form-label">Address 1</label>
            <input type="text" class="form-control" id="address1" name="address1">
        </div>
        <div class="col-sm-4">
            <label for="address2" class="form-label">Address 2</label>
            <input required type="text" class="form-control" id="address2" name="address2">
        </div>

        <div class="col-md-4">
            <label for="parish" class="form-label">Parish</label>
            <select class="form-control" aria-label="parish" name="parish" id="parish">
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

        <div class="col-md-4">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-control" aria-label="gender" name="gender" id="gender">
            <option selected>Select Gender</option>
            <option>Male</option>
            <option>Female</option>
            </select>
        </div>
        
        <div class="col-sm-4">
            <label for="phone" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp">
            <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
        </div>

        <div class="col-sm-4">
            <label for="email" class="form-label">Email Address</label>
            <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
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

    <div class="custom-file">
        <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar">
        <label class="custom-file-label" for="avatar">Upload Photo</label>
    </div>
    <br>
    <br>
    <br>
    <button type="submit" name="submit" class="btn btn-outline-info btn-block">SUMBIT</button>
    </form>
<br>
<br>
<br>
<br>

<?php require_once 'includes/footer.php'; ?>