<?php

include 'db_actions.php';

if (isset($_POST['save'])) 
{
 
            $title= $_POST['title'];
            $description = $_POST['description'];
           

            if (saveAboutUs($title,$description)) 
            {
                echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> New About Us Information has been generated successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
         
        else 
        {
            echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong>Error.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
}
   
include '../includes/header.php';
include '../includes/admin_navbar.php';

?>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title mb-0">Add About Us Information</h3>
        </div>
        <div class="card-body">
            <form action="manageAboutUs.php" method="post" >
                <div class="mb-3">
                    <label for="name" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required>
                </div>
                <div class="mb-3">
                    <label for="detail" class="form-label">Description:</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Enter description" rows="3" required></textarea>
                </div>
                
                <div class="text-center">
                    <button type="submit" name="save" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Table for displaying available lab tests -->
    <div class="card shadow mt-4">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title mb-0">ABout Us Information</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                           
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = getAboutUsDetails();
                        $number = 1;

                        if ($result && $result->num_rows > 0) 
                        {
                            while ($row = $result->fetch_assoc()) 
                            {  
                        ?>
                        <tr>
                            <td><?php echo $number ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                           
                            <td>
                                <a href="editAboutUs.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success">Edit</a>
                                <a href="deleteAboutUs.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger">Remove</a>
                            </td>
                        </tr>
                        <?php
                            $number++; 
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
include '../includes/footer.php';
?>
