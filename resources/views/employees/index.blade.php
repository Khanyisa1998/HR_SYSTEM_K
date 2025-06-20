<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List of Employees</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f0f0f0;
            padding: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px 15px;
            border: 1px solid #ccc;
        }
        th {
            background: #00bcd4;
            color: #fff;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
        a {
            color: #007bff;
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

<h2>List of Employees</h2>

<table>
    <thead>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Next Of Kin Name</th>
            <th>Next Of Kin Surname</th>
            <th>Next Of Kin Relationship</th>
            <th>Next Of Kin Phone Number</th>
            <th>ID Document</th>
            <th>Contract</th>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as $emp)
            <tr>
                <td>{{ $emp->employee_code }}</td>
                <td>{{ $emp->name }}</td>
                <td>{{ $emp->surname }}</td>
                <td>{{ $emp->email }}</td>
                <td>{{ $emp->phone }}</td>
                <td>{{ $emp->kin_name }}</td>
                <td>{{ $emp->kin_surname }}</td>
                <td>{{ $emp->kin_relationship }}</td>
                <td>{{ $emp->kin_phone }}</td>
                <td>
                    @if($emp->employee_id_path)
                        <a href="{{ asset('storage/' . $emp->employee_id_path) }}" target="_blank">View</a>
                    @else
                        N/A
                    @endif
                </td>
                <td>
                    @if($emp->contract_path)
                        <a href="{{ asset('storage/' . $emp->contract_path) }}" target="_blank">View</a>
                    @else
                        N/A
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
