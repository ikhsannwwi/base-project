<!DOCTYPE html>
<html>
<head>
    <title>Report Log System</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Report Log System</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Module</th>
                <th>Action</th>
                <th>DateTime</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $row)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $row->user->name }}</td>
                    <td>{{ $row->module }}</td>
                    <td>{{ $row->action }}</td>
                    <td>{{ $row->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
