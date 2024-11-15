 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
                


                <li class="nav-item"><a class="nav-link" href="addlabtest.php">Lab Tests</a></li>
                <li class="nav-item"><a class="nav-link" href="patientlist.php">Patient List</a></li>
                <li class="nav-item dropdown">
            <a
                class="nav-link dropdown-toggle"
                href="#"
                id="patientDropdown"
                role="button"
                data-toggle="dropdown"
                aria-expanded="false"
            >
            Certifications
            </a>
            <div class="dropdown-menu" aria-labelledby="patientDropdown">
                <a class="dropdown-item" href="add_certifications.php">Add Certifications</a>
                
                <a class="dropdown-item" href="certificationsList.php">Manage Certifications</a>
            </div>
        </li>


                 <li class="nav-item dropdown">
            <a
                class="nav-link dropdown-toggle"
                href="#"
                id="patientDropdown"
                role="button"
                data-toggle="dropdown"
                aria-expanded="false"
            >
            Appointments
            </a>
            <div class="dropdown-menu" aria-labelledby="patientDropdown">
                <a class="dropdown-item" href="add_appointment.php">Make Appointments</a>
                
                <a class="dropdown-item" href="appointments.php">Manage Appointments</a>
            </div>
        </li>

          
        <li class="nav-item dropdown">
            <a
                class="nav-link dropdown-toggle"
                href="#"
                id="patientDropdown"
                role="button"
                data-toggle="dropdown"
                aria-expanded="false"
            >
            Manage
            </a>
            <div class="dropdown-menu" aria-labelledby="patientDropdown">
                <a class="dropdown-item" href="manageAboutUs.php">Manage AboutUs</a>
                
                <a class="dropdown-item" href="manageContactUs.php">Manage ContactUs</a>
                <a class="dropdown-item" href="manageServices.php">Manage Services</a>
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
