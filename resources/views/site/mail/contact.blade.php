
<!DOCTYPE html>
<html>
<head>
    <title>Contact Information</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        td {
            background-color: #ffffff;
        }
        tr:nth-child(even) td {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Name Catering</th>

                <th>Email</th>
                <th>Date</th>
                <th>Time</th>
                <th>Persons</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $details['name'] ?? 'N/A' }}</td>
                <td>{{ $details['namecatering'] ?? 'N/A' }}</td>

                <td>{{ $details['email'] ?? 'N/A' }}</td>
                <td>{{ $details['date'] ?? 'N/A' }}</td>
                <td>{{ $details['time'] ?? 'N/A' }}</td>
                <td>{{ $details['persons'] ?? 'Not specified' }}</td>
                <td>{{ $details['phone'] ?? 'N/A' }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>