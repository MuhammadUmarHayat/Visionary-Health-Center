<?php
// index.php
include 'actions.php'; // include config file
include 'db_actions.php';

$email = start_session();
$totalAppointments = totalAppointments($email);
$totalAppPendings = totalPendingAppointments($email);
$totalAppCompleted = totalCompleteAppointments($email);
$totalFeedbacks = totalFeedBacks($email);

include '../includes/header.php'; // include header
include '../includes/doctor_navbar.php'; // include navbar
?>

<style>
    .card-app {
        background-color: #e0ccff;
        color: #343a40; /* Dark text color */
    }
    .card-pending {
        background-color: #e6ffee;
        color: #495057;
    }
    .card-completed {
        background-color: #f9ecf2;
        color: #495057;
    }
    .card-fb {
        background-color: #e6ccb3;
        color: #495057;
    }
</style>

<div class="container my-5">
    <h2 class="mb-4">Doctor Panel</h2>
    <section id="aboutus" class="py-5 text-center">
        <div class="container">
            <div class="row">
                <!-- Card 1 -->
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 card-app">
                        <div class="card-body">
                            <h5 class="card-title">Total Appointments</h5>
                            <p class="card-text"><?php echo $totalAppointments; ?></p>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 card-pending">
                        <div class="card-body">
                            <h5 class="card-title">Total Pending Appointments</h5>
                            <p class="card-text"><?php echo $totalAppPendings; ?></p>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 card-completed">
                        <div class="card-body">
                            <h5 class="card-title">Total Completed Appointments</h5>
                            <p class="card-text"><?php echo $totalAppCompleted; ?></p>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 card-fb">
                        <div class="card-body">
                            <h5 class="card-title">Total Feedbacks</h5>
                            <p class="card-text"><?php echo $totalFeedbacks; ?></p>
                        </div>
                    </div>
                </div>
           
             <!-- Card 5 -->
             <div class="col-lg-4 mb-4">
                    <div class="card h-100 ">
                        <div class="card-body">
                            <h5 class="card-title">Appointments</h5>
                              <!-- Chart -->
            <div style="display: flex; flex-direction: column; align-items: center; width: 50%; margin: auto;">
    <h3 style="margin-bottom: 20px;"></h3>
    <canvas id="appointmentChart" ></canvas>
</div>
                        </div>
                    </div>
                </div>
            </div>

          



            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                // Fetch the data from the new PHP endpoint
                fetch('fetch_chart_data.php')
                    .then(response => response.json())
                    .then(data => {
                        // Prepare data for Chart.js
                        const statuses = Object.keys(data);
                        const counts = Object.values(data);

                        // Create a donut chart
                        const ctx = document.getElementById('appointmentChart').getContext('2d');
                        const chart = new Chart(ctx, {
                            type: 'doughnut', // Change chart type to 'doughnut'
                            data: {
                                labels: statuses, // ['completed', 'pending', 'canceled']
                                datasets: [{
                                    label: 'Appointment Count',
                                    data: counts, // [count_completed, count_pending, count_canceled]
                                    backgroundColor: ['green', 'orange', 'red'], // Colors for each status
                                    borderColor: ['darkgreen', 'darkorange', 'darkred'],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'top', // Legend position
                                    },
                                    tooltip: {
                                        enabled: true, // Enable tooltips
                                    }
                                }
                            }
                        });
                    });
            </script>
        </div>
    </section>
</div>

<?php
include '../includes/footer.php'; // Include footer
?>
