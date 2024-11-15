 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
 <a class="navbar-brand" href="index.php">
        <img src="../includes/logo.jpg" width="50" height="50" alt="XYZ Foundation Logo">
        EyeCare Center
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="add_slot.php">Add Time Slots</a></li>
                
                <li class="nav-item"><a class="nav-link" href="doctor_profile.php">Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="viewAppointments.php">View Appointments</a></li>
                 <!-- Dropdown for Patient Actions -->
        <li class="nav-item dropdown">
            <a
                class="nav-link dropdown-toggle"
                href="#"
                id="patientDropdown"
                role="button"
                data-toggle="dropdown"
                aria-expanded="false"
            >
                Patient
            </a>
            <div class="dropdown-menu" aria-labelledby="patientDropdown">
                <a class="dropdown-item" href="add_patient_record.php">Add New Patient</a>
                <a class="dropdown-item" href="patient_history.php">View Patient History</a>
            </div>
        </li>

                <li class="nav-item"><a class="nav-link" href="../logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
    <script>
    document.querySelector('select[name="patient_id"]').addEventListener('change', function () {
        if (this.value === 'new_patient') {
            window.location.href = 'add_patient_record.php';
        } else if (this.value === 'patient_history') {
            window.location.href = 'patient_history.php';
        }
    });
</script>

   