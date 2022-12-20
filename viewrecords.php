<?php
    $title = 'View Records'; 

    require_once 'includes/header.php'; 
    require_once 'includes/authcheck.php';
    require_once 'db/conn.php'; 

    $results = $crud->getRegistrant();
?>


    <table class="table">
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Programmes</th>
            <th>Actions</th>
        </tr>
        <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
           <tr>
                <td><?php echo $r['registrant_id'] ?></td>
                <td><?php echo $r['firstname'] ?></td>
                <td><?php echo $r['lastname'] ?></td>
                <td><?php echo $r['programme_name'] ?></td>
                <td>
                    <a href="view.php?id=<?php echo $r['registrant_id'] ?>" class="btn btn-primary btn-sm">View</a>
                    <a href="edit.php?id=<?php echo $r['registrant_id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a onclick="return confirm('Are you sure you want to delete this record?');" 
                    href="delete.php?id=<?php echo $r['registrant_id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
           </tr> 
        <?php }?>
    </table>

<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>