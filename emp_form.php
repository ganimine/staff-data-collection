<?php
// Optional: session_start();
// Optional: include("auth.php") to restrict access
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Employee Data Entry Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="theme-color" content="#4CAF50">
  <link rel="icon" href="favicon.ico">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
  <link rel="stylesheet" href="styles.css"> <!-- Your custom CSS -->
  <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Header Image */
        .header-image img {
            width: 100%;
            height: auto;
            display: block;
        }

        h2 {
            text-align: center;
            margin: 20px 0;
        }

        .logout-btn {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 15px;
        }

        form {
            display: flex;
            flex-direction: column;
            max-width: 500px;
            width: 100%;
        }

        input, button {
            padding: 10px;
            margin: 10px 0;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border: none;
        }

        button:hover {
            background-color: #45a049;
        }

        @media (max-width: 600px) {
            h2 {
                font-size: 18px;
            }

            input, button {
                font-size: 14px;
                padding: 8px;
            }
        }
    </style>
</head>
<body>

    <!-- Header Image -->
    <div class="header-image">
        <img src="logo.png" alt="Header Image">
    </div>

    <!-- Logout Button -->
    <div class="logout-btn">
        <form action="logout.php" method="post">
            <button type="submit">Logout</button>
        </form>
    </div>

<h2>Employee Data Entry Form</h2>

<form method="POST" action="saveemp.php">

<!-- A. Basic Details -->
<h3>A. Basic Details</h3>
<input type="text" name="first_name" required placeholder="First Name">
<input type="text" name="last_name" required placeholder="Last Name">
<input type="text" name="father_name" required placeholder="Father's Name">
<select name="gender">
  <option>Male</option>
  <option>Female</option>
  <option>Other</option>
</select>
<input type="date" name="dob" required>
<input type="text" name="caste" required placeholder="Caste">

<!-- B. Academic Education -->
<h3>B. Academic Education</h3>
<h4>Post Graduation</h4>
<input type="text" name="pg_degree" placeholder="Degree Name">
<input type="text" name="pg_university" placeholder="University Name">
<input type="number" name="pg_total" placeholder="Total Marks">
<input type="number" name="pg_secured" placeholder="Marks Secured">

<h4>Under Graduation</h4>
<input type="text" name="ug_degree" placeholder="Degree Name">
<input type="text" name="ug_university" placeholder="University Name">
<input type="number" name="ug_total" placeholder="Total Marks">
<input type="number" name="ug_secured" placeholder="Marks Secured">

<!-- C. Professional Education -->
<h3>C. Professional Education</h3>
<label><input type="checkbox" name="bed" value="1"> B.Ed</label>
<input type="text" name="bed_university" placeholder="B.Ed University Name">
<input type="number" name="bed_total" placeholder="B.Ed Total Marks">
<input type="number" name="bed_secured" placeholder="B.Ed Marks Secured">
<label><input type="checkbox" name="med" value="1"> M.Ed</label>
<input type="text" name="med_university" placeholder="M.Ed University Name">
<input type="number" name="med_total" placeholder="M.Ed Total Marks">
<input type="number" name="med_secured" placeholder="M.Ed Marks Secured">

<!-- D. CTET -->
<h3>D. CTET Details</h3>
<select name="ctet_qualified" id="ctet_qualified" onchange="toggleCTET()">
  <option value="No">No</option>
  <option value="Yes">Yes</option>
</select>
<div id="ctet_fields" style="display:none">
  <input type="text" name="ctet_ht" placeholder="CTET HT No">
  <input type="text" name="ctet_session" placeholder="Session">
</div>

<!-- E. TET -->
<h3>E. TET Details</h3>
<select name="tet_qualified" id="tet_qualified" onchange="toggleTET()">
  <option value="No">No</option>
  <option value="Yes">Yes</option>
</select>
<div id="tet_fields" style="display:none">
  <input type="text" name="tet_ht" placeholder="TET HT No">
  <input type="text" name="tet_session" placeholder="Session">
  <input type="number" name="tet_marks" id="tet_marks" placeholder="Marks" max="150">
</div>

<!-- F. Employment -->
<h3>F. Employment Details</h3>
<input type="text" name="institution" placeholder="Institution Name">
<input type="text" name="post_hold" placeholder="Post Held">
<label>Date of Joining</label>
<input type="date" name="doj" id="doj" onchange="calculateService()">
<label>Date of Termination</label>
<input type="date" name="dot" id="dot" onchange="calculateService()">
<label>Still Working?</label>
<select name="still_working" id="still_working" onchange="calculateService()">
  <option value="No">No</option>
  <option value="Yes">Yes</option>
</select>
<label>Total Service</label>
<input type="text" id="service_duration" name="service_duration" readonly>

<!-- G. Address -->
<h3>G. Address</h3>
<input type="text" name="mobile" placeholder="Mobile Number">
<input type="email" name="email" placeholder="Email">
<input type="text" name="hno" placeholder="House No">
<input type="text" name="street" placeholder="Street">
<input type="text" name="village" placeholder="Village">
<input type="text" name="mandal" placeholder="Mandal">
<input type="text" name="district" placeholder="District">
<input type="text" name="pincode" placeholder="PIN Code">

<input type="submit" value="Submit">


</form>

<!-- Footer -->
<footer class="text-center mt-4">
  <p>&copy; 2025 RC, Khammam @ TGEMRS, Hyderabad. All rights reserved.</p>
  <p>Contact: <a href="mailto:rckhammam2016@gmail.com">rckhammam2016@gmail.com</a></p>
</footer>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script>
  $(document).ready(function() {
    $('input[type="date"]').datepicker({ format: 'yyyy-mm-dd', autoclose: true });
    $('select').select2();
  });

  function toggleCTET() {
    document.getElementById('ctet_fields').style.display = (document.getElementById('ctet_qualified').value === 'Yes') ? 'block' : 'none';
  }
  function toggleTET() {
    document.getElementById('tet_fields').style.display = (document.getElementById('tet_qualified').value === 'Yes') ? 'block' : 'none';
  }
  function calculateService() {
    const doj = document.getElementById("doj").value;
    const dot = document.getElementById("dot");
    const sw = document.getElementById("still_working").value;
    const output = document.getElementById("service_duration");
    if (!doj) return output.value = "";

    let start = new Date(doj);
    let end = sw === "Yes" ? new Date() : new Date(dot.value || null);
    if (!end || end < start) return output.value = "Invalid";

    let years = end.getFullYear() - start.getFullYear();
    let months = end.getMonth() - start.getMonth();
    let days = end.getDate() - start.getDate();
    if (days < 0) { months--; days += new Date(end.getFullYear(), end.getMonth(), 0).getDate(); }
    if (months < 0) { years--; months += 12; }

    output.value = `${years} Years, ${months} Months, ${days} Days`;
    dot.disabled = (sw === "Yes");
  }

  document.getElementById("tet_marks").addEventListener("input", function () {
    if (parseInt(this.value) > 150) {
      alert("❌ TET Marks cannot exceed 150.");
      this.value = '';
    }
  });

  window.onload = function() {
    toggleCTET(); toggleTET();
  };
</script>
</body>
</html>
