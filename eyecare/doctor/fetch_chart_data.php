<?php
// fetch_chart_data.php
include 'actions.php'; // Include config and db connection
include 'db_actions.php'; // Include the function to generate the chart data

$email = start_session(); // Get the doctor ID or email from session
$chartData = genAppointmentChart($email); // Get chart data

// Output the data as JSON
header('Content-Type: application/json');
echo json_encode($chartData);
?>