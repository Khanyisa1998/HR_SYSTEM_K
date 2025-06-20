<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HR Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #111;
            color: #fff;
        }

        .sidebar {
            position: fixed;
            width: 220px;
            height: 100%;
            background-color: #1e1e1e;
            padding-top: 20px;
        }

        .sidebar h2 {
            text-align: center;
            color: #00bcd4;
            margin-bottom: 30px;
        }

        .sidebar a {
            display: block;
            color: #ccc;
            padding: 15px 25px;
            text-decoration: none;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: #00bcd4;
            color: #111;
        }

        .main-content {
            margin-left: 220px;
            padding: 20px;
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .card {
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 188, 212, 0.3);
        }

        .card h3 {
            font-size: 14px;
            color: #ccc;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 24px;
            color: #00bcd4;
        }

        /* Toggle Switch Style */
        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 26px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            background-color: #ccc;
            border-radius: 34px;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            transition: 0.4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: 0.4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: #00bcd4;
        }

        input:checked + .slider:before {
            transform: translateX(24px);
        }

        /* Light Mode Overrides */
        .dark-mode {
            background-color: #fff;
            color: #111;
        }

        .dark-mode .sidebar {
            background-color: #f0f0f0;
        }

        .dark-mode .sidebar a {
            color: #222;
        }

        .dark-mode .sidebar a:hover {
            background-color: #00bcd4;
            color: #fff;
        }

        .dark-mode .card {
            background-color: #ffffff;
            box-shadow: 0 0 15px rgba(0, 188, 212, 0.3);
        }

        .dark-mode .card h3 {
            color: #555;
        }

        .dark-mode .card p {
            color: #00bcd4;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>HR Admin</h2>
    <a href="#"><i class="fas fa-home"></i> Home</a>
    <a href="{{ route('employee.create') }}"><i class="fas fa-user-plus"></i> Add Employee</a>
    <a href="{{ route('employees.index') }}"><i class="fas fa-users"></i> List of Employees</a>
    <a href="#"><i class="fas fa-envelope-open-text"></i> Leave Requests</a>
    <a href="#"><i class="fas fa-cogs"></i> Management</a>
    <a href="#"><i class="fas fa-building"></i> List of Departments</a>
</div>

<div class="main-content">
    <h1>Welcome To Human Resource Management System </h1>

    <div class="card-grid">
        <div class="card">
            <h3>Total Employees</h3>
            <p>{{ $totalEmployees }}</p>

        </div>
        <div class="card">
            <h3>Departments</h3>
            <p>6</p>
        </div>
        <div class="card">
            <h3>Leave Requests</h3>
            <p>12</p>
        </div>
        <div class="card">
            <h3>Approved Requests</h3>
            <p>8</p>
        </div>
    </div>
</div>

<!-- Dark/Light Mode Toggle -->
<div style="position: absolute; top: 20px; right: 200px;">
    <label class="switch">
        <input type="checkbox" id="modeToggle">
        <span class="slider round"></span>
    </label>
</div>

<!-- Logout Button -->
<div style="position: absolute; top: 20px; right: 30px;">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" style="
            background-color: #e74c3c;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        " onmouseover="this.style.backgroundColor='#c0392b'"
           onmouseout="this.style.backgroundColor='#e74c3c'">
            <i class="fas fa-sign-out-alt"></i> Logout
        </button>
    </form>
</div>

<!-- ✅ Toggle Logic AFTER page is loaded -->
<script>
    window.onload = function () {
        const toggle = document.getElementById('modeToggle');

        // Check saved mode
        if (localStorage.getItem('theme') === 'light') {
            document.body.classList.add('dark-mode');
            toggle.checked = true;
        }

        toggle.addEventListener('change', function () {
            if (this.checked) {
                document.body.classList.add('dark-mode');
                localStorage.setItem('theme', 'light');
            } else {
                document.body.classList.remove('dark-mode');
                localStorage.setItem('theme', 'dark');
            }
        });
    }
</script>

</body>
</html>
