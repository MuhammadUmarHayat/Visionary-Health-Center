<?php
include 'db_actions.php';

$result=viewAdminMessage();
include '../includes/header.php';//include footer

include '../includes/admin_navbar.php';//include footer
?>
<?php
if (isset($_GET['status'])) 
{
    if ($_GET['status'] == 'success') 
    {
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Updated successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    } elseif ($_GET['status'] == 'fail') 
    {
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Please try again.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
}

?>
    <div class="container mt-5">
        <h2 class="mb-4">Cntact Us: User Queries</h2>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && $result->num_rows > 0) 
                {
                    while ($row = $result->fetch_assoc()) 
                    { 
                        //`name`, `to_email`, `from_email`,  `message 
                ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['from_email']; ?></td>
                    <td><?php echo $row['message']; ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                   
                    <td>
                                <a href="adminReply.php?id=<?php echo $row['from_email']; ?>&msg=<?php echo $row['message']; ?>" class="btn btn-sm btn-info">Reply</a>
                                
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