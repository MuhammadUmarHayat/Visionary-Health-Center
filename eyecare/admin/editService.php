<?php

include 'db_actions.php';
include 'actions.php';
$test ;
if (isset($_GET['id'])) 
{
    $id = $_GET['id'];
    $service = getServiceInfo($id);  // Function to fetch the lab test details based on the ID
    if ($service && $service->num_rows > 0) 
                        
    {
        $row = $service->fetch_assoc();
    }
}


if (isset($_POST['update'])) 
{
    $id = $_POST['id'];
    $service_name = $_POST['service_name'];
    $description = $_POST['description'];
   
    
    if (updateServiceInfo($id,$service_name,$description)) 
    {
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Record has been updated successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';

        goManageServices();// go to main page
    }
}

include '../includes/header.php';
include '../includes/admin_navbar.php';

?>
<?php
 
                           // $row = $test->fetch_assoc();
                            ?> 
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title mb-0">Edit Service Information</h3>
        </div>
        <div class="card-body">
            <form action="editService.php" method="post" >
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="mb-3">
                    <label for="name" class="form-label">Service Name</label>
                    <input type="text" class="form-control" id="service_name" name="service_name" value="<?php echo $row['service_name']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="detail" class="form-label">Description :</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required><?php echo $row['description']; ?></textarea>
                </div>
                
                
                </div>
                <div class="text-center">
                    <button type="submit" name="update" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
        <?php
        //}
        ?>
    </div>
</div>

<?php
include '../includes/footer.php';
?>
