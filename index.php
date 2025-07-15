<?php
session_start(); // Start the session to access session data
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docto AI - Welcome</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* General styling */
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        /* Background video styling */
        .bg-video {
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -1;
            transform: translate(-50%, -50%);
            filter: brightness(70%);
        }

        /* Button container styling */
        .button-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 80px;
            z-index: 1;
            max-width: 900px;
            padding: 20px;
            backdrop-filter: blur(10px);
            border-radius: 15px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-items: center;
        }

        /* Individual button styling */
        .center-box {
            background: linear-gradient(90deg, #0adfd1, #00c6ff);
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            cursor: pointer;
            color: #fff;
            font-size: 18px;
            text-decoration: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            white-space: nowrap;
            text-overflow: ellipsis;
            width: 100%;
            max-width: 250px;
        }

        /* Button hover effect */
        .center-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
            background: linear-gradient(90deg, #00c6ff, #0adfd1);
        }

        .center-box h1 {
            margin: 0;
            font-weight: normal;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
            font-size: inherit;
        }

        /* Top button styling */
        .top-btn {
            margin: 0;
            position: absolute;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: #fff;
            z-index: 2;
        }

        /* Login, user info, and ambulance button styling */
        .login-btn {
            
            top: 10px;
            right: 10px;
            background-color: #007BFF;
        }

        .user-info {
            top: 10px;
            right: 10px;
            background-color: #28a745;
        }

        .ambulance-btn {
            top: 10px;
            left: 10px;
            background-color: #FF0000;
            color: #fff;
        }
    </style>
</head>
<body>
    <!-- Background video -->
    <video autoplay muted loop class="bg-video">
        <source src="images/bg2.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <!-- Ambulance Button at the Top Left Corner -->
    <button class="top-btn ambulance-btn" onclick="promptDoctorCall()">Ambulance</button>

    <!-- Display either Login button or User Info -->
    <?php if (isset($_SESSION['user_id'])): ?>
        <div class="top-btn user-info">
            Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?> (ID: <?php echo $_SESSION['user_id']; ?>)
        </div>
    <?php else: ?>
        <button class="top-btn login-btn" onclick="window.location.href='sign/login.html'">Login</button>
    <?php endif; ?>

    <!-- Main button container with links -->
    <div class="button-container">
        <a href="nav.html" class="center-box">
            <h1>Try DOCTO AI</h1>
        </a>
        <a href="booking.html" class="center-box">
            <h1>BOOK CONSULTATION</h1>
        </a>
        <a href="selection.html" class="center-box">
            <h1>TEST AVAILABILITY</h1>
        </a>
        <a href="folkmedicine.html" class="center-box">
            <h1>FOLK MEDICINE</h1>
        </a>
        <a href="symptom.html" class="center-box">
            <h1>SYMPTOM CHECKER</h1>
        </a>
        <a href="medicine availability.html" class="center-box">
            <h1>MEDICINE AVAILABILITY</h1>
        </a>
        <a href="userdoctor.html" class="center-box">
            <h1>TO CONNECT</h1>
        </a>

        <a href="medicineupdate.html" class="center-box">
            <h1>MEDICINE UPDATE</h1>
        </a>
        <a href="hospitalavailability.html" class="center-box">
            <h1>HOSPITAL UPDATE</h1>
        </a>
        <a href="doctorschedule.html" class="center-box">
            <h1>DOCTOR UPDATE</h1>
        </a>
        <a href="ourservice.html" class="center-box">
            <h1>OUR SERVICE</h1>
        </a>
    </div>

    <!-- Script for the ambulance button functionality -->
    <script>
        function promptDoctorCall() {
            var ambulanceNumber = "tel:+your_ambulance_number";
            var doctorNumber = "tel:+your_doctor_number";

            window.location.href = ambulanceNumber;
            setTimeout(function() {
                var callDoctor = confirm("Do you want to call the doctor for first aid?");
                if (callDoctor) {
                    window.location.href = doctorNumber;
                }
            }, 2000);
        }
    </script>
</body>
</html>
