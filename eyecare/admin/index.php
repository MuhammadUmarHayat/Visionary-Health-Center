<?php
include 'db_actions.php';

$result= showAppointmentList();
$totalDoctors=totalDoctors();
$toalPatients=totalPatients();
$totalAppointments=totalAppointments();
$totalCertifications=totalCertifications();
?>

<?php
include '../includes/header.php';//include footer
?>
   
   <?php
include '../includes/admin_navbar.php';//include footer
?>
<style>
        .card-doctors {
            background-color: #e0ccff; 
            color: #343a40; /* Dark text color */
        }

        .card-patients {
            background-color: #e6ffee; /* Slightly darker gray */
            color: #495057; /* Slightly lighter text color */
        }
        .card-app {
            background-color: #f9ecf2; /* Slightly darker gray */
            color: #495057; /* Slightly lighter text color */
        }
        .card-cer {
            background-color: #e6ccb3; /* Slightly darker gray */
            color: #495057; /* Slightly lighter text color */
        }
    </style>
<div class="container my-5">
<h2 class="mb-4">Admin Panel</h2>
<section id="aboutus" class="py-5 text-center">
    <div class="container">
        <div class="row">
            <!--  Card -->
            <div class="col-lg-4 mb-4 ">
            <div class="card h-100 card-doctors">
                    <div class="card-body">
                        <h5 class="card-title">Total Doctors</h5>
                        <p class="card-text">
                            <?php echo $totalDoctors?>
                        </p>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 mb-4">
            <div class="card h-100 card-patients">
                    <div class="card-body">
                        <h5 class="card-title">Total Patients</h5>
                        <p class="card-text">
                        <?php echo $toalPatients?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
            <div class="card h-100 card-app">
                    <div class="card-body">
                        <h5 class="card-title">Total Apointments</h5>
                        <p class="card-text">
                        <?php echo $totalAppointments?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
            <div class="card h-100 card-cer">
                    <div class="card-body">
                        <h5 class="card-title">Total Certifications Generated</h5>
                        <p class="card-text">
                        <?php echo $totalCertifications?>
                        </p>
                    </div>
                </div>
            </div>


</div>

</div>
</section>
<?php
include '../includes/footer.php';//include footer
?>