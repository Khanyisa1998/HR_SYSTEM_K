<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Employee</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            color: #fff;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 40px;
        }

        .form-container {
            max-width: 800px;
            margin: auto;
            background-color: #1e1e1e;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 188, 212, 0.3);
        }

        .form-container h2 {
            text-align: center;
            color: #00bcd4;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #ccc;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background-color: #2c2c2c;
            color: #fff;
        }

        input[type="file"] {
            background-color: transparent;
        }

        button {
            width: 100%;
            padding: 15px;
            background-color: #00bcd4;
            color: #111;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: #00a2bb;
        }
    </style>
</head>
<body>

<a href="{{ url('/admin/dashboard') }}" style="
    position: absolute;
    top: 30px;
    right: 40px;
    background-color: #00bcd4;
    color: #111;
    padding: 10px 20px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: bold;
    transition: 0.3s;
">← Back to Dashboard</a>



<div class="form-container">
    <h2>Add New Employee</h2>

    <h3 style="color: #00bcd4;">Employee Details</h3>
    <form method="POST" action="{{ route('employee.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Employee First Name</label>
            <input type="text" name="name" required>
        </div>

        <div class="form-group">
            <label for="surname">Employee Surname</label>
            <input type="text" name="surname" required>
        </div>

        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="home_address">Home Address</label>
            <textarea name="home_address" rows="2" required></textarea>
        </div>

        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" name="phone" required>
        </div>
       

        <h3 style="color: #00bcd4;">Next of Kin Details</h3>

      <div class="form-group">
      <label for="kin_name">Next of Kin First Name</label>
      <input type="text" name="kin_name" required>
      </div>

    <div class="form-group">
    <label for="kin_surname">Next of Kin Surname</label>
    <input type="text" name="kin_surname" required>
    </div>
                                                                    
    <div class="form-group">
            <label for="Kin_phoneNo">Next of Kin Phone Number</label>
            <input type="text" name="kin_phone" required>
        </div>

    <div class="form-group">
    <label for="kin_relationship">Relationship</label>
    <select name="kin_relationship" required>
        <option value="">-- Select Relationship --</option>
        <option value="Brother">Brother</option>
        <option value="Sister">Sister</option>
        <option value="Mother">Mother</option>
        <option value="Father">Father</option>
        <option value="Other">Other</option>
    </select>
</div>

    <h3 style="color: #00bcd4;">Employee Documents</h3>
        <div class="form-group">
            <label for="employee_id">Upload Employee ID</label>
            <input type="file" name="employee_id" accept=".pdf,.png,.jpg,.jpeg" required>
        </div>

        <div class="form-group">
            <label for="contract">Upload Contract</label>
            <input type="file" name="contract" accept=".pdf" required>
        </div>

        <button type="submit">Add Employee</button>
    </form>
</div>

</body>
</html>
