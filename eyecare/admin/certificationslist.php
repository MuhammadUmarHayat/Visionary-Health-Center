<?php
include 'db_actions.php';

$result=showCertificiationList();
?>

<?php
include '../includes/header.php';//include footer
?>
   
   <?php
include '../includes/admin_navbar.php';//include footer
?>
<?php
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'success') {
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Updated successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    } elseif ($_GET['status'] == 'fail') {
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Please try again.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
}
?>
    <div class="container mt-5">
        <h2 class="mb-4">Certification List</h2>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Patient</th>
                    <th>Photo</th>
                    <th>Certification No</th>
                    <th>Issue Date</th>
                    <th>Status</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && $result->num_rows > 0) 
                {
                    while ($row = $result->fetch_assoc()) 
                    {  
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['patient_id']; ?></td>
                    <td><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" width="50" height="50" class="img-thumbnail" /></td>
                    <td><?php echo $row['certification_no']; ?></td>
                    <td><?php echo $row['certification_date']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td>
                                <a href="editCertificate.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success">Edit</a>
                                <a href="deleteCertificate.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger">Remove</a>
                            </td>
                   
                </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>No certifications found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
include '../includes/footer.php';//include footer
?>