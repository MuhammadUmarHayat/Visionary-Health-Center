 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">
        <img src="logo.jpg" width="50" height="50" alt="XYZ Foundation Logo">
        EyeCare Center
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
            <div class="d-flex justify-content-center my-4">
            
            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="Aboutus.php">AboutUs</a></li>
                <li class="nav-item"><a class="nav-link" href="allDoctors.php">Specialists</a></li>
                <li class="nav-item"><a class="nav-link" href="allTest.php">Labs</a></li>
                <li class="nav-item"><a class="nav-link" href="allService.php">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="contactus.php">ContactUs</a></li>


                <li class="nav-item dropdown">
            <a
                class="nav-link dropdown-toggle"
                href="#"
                id="patientDropdown"
                role="button"
                data-toggle="dropdown"
                aria-expanded="false"
            >
                Registration/Login
            </a>
            <div class="dropdown-menu" aria-labelledby="patientDropdown">
            
                <a class="dropdown-item" href="patient_registration.php">patient Registration</a>
                <a class="dropdown-item" href="doctor_registration.php">Doctor Registration</a>
                <a class="dropdown-item" href="login.php">Login</a>
            </div>
        </li>
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