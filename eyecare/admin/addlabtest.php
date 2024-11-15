<?php

include 'db_actions.php';

if (isset($_POST['save'])) 
{
    if (!empty($_FILES["image"]["name"])) 
    {
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

        if (in_array($fileType, $allowTypes)) 
        {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

            $name = $_POST['name'];
            $details = $_POST['detail'];
            $status = "available";

            if (saveLabTest($name, $details, $imgContent, $status)) 
            {
                echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Lab Test has been generated successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        } 
        else 
        {
            echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Only JPG, JPEG, PNG, and GIF files are allowed.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    }
}

include '../includes/header.php';
include '../includes/admin_navbar.php';

?>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title mb-0">Add Lab Test</h3>
        </div>
        <div class="card-body">
            <form action="addlabtest.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Test Name:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter test name" required>
                </div>
                <div class="mb-3">
                    <label for="detail" class="form-label">Test Description:</label>
                    <textarea class="form-control" id="detail" name="detail" placeholder="Enter test details" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Upload Photo:</label>
                    <input type="file" class="form-control" id="image" name="image">
                    <div class="form-text">Supported formats: JPG, PNG, JPEG, GIF</div>
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
            <h3 class="card-title mb-0">Available Lab Tests</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Photo</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = getAllLabTests();
                        $number = 1;

                        if ($result && $result->num_rows > 0) 
                        {
                            while ($row = $result->fetch_assoc()) 
                            {  
                        ?>
                        <tr>
                            <td><?php echo $number ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['details']; ?></td>
                            <td><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>" width="50" height="50" class="img-thumbnail rounded-circle" /></td>
                            <td><?php echo $row['status']; ?></td>
                            <td>
                                <a href="editlabTest.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success">Edit</a>
                                <a href="deletelabTest.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger">Remove</a>
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
