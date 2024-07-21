<!DOCTYPE html>
<html>
<head>
    <title>Report Log System Detail</title>
    <style>
        .container {
            width: 100%;
            max-width: 800px; /* Sesuaikan dengan lebar PDF */
            margin: 0 auto;
        }
        .detail-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            table-layout: fixed; /* Tetapkan tata letak tabel ke fixed */
        }
        .detail-table th, .detail-table td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
            word-wrap: break-word; /* Pastikan teks dalam tabel terbungkus jika terlalu panjang */
        }
        .detail-table th {
            background-color: #f2f2f2;
        }
        .header {
            background-color: #f2f2f2;
            padding: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Report Log System Detail</h1>
        <table class="detail-table">
            <tr>
                <th>ID</th>
                <td>{{ $data->id }}</td>
            </tr>
            <tr>
                <th>User</th>
                <td>{{ $data->user->name }}</td>
            </tr>
            <tr>
                <th>IP Address</th>
                <td>{{ $data->ip_address }}</td>
            </tr>
            <tr>
                <th>Device</th>
                <td>{{ $data->device }}</td>
            </tr>
            <tr>
                <th>Browser Name</th>
                <td>{{ $data->browser_name }}</td>
            </tr>
            <tr>
                <th>Browser Version</th>
                <td>{{ $data->browser_version }}</td>
            </tr>
            <tr>
                <th>Module</th>
                <td>{{ $data->module }}</td>
            </tr>
            <tr>
                <th>Action</th>
                <td>{{ $data->action }}</td>
            </tr>
            <tr>
                <th>Data ID</th>
                <td>{{ $data->data_id }}</td>
            </tr>
            <tr>
                <th>Data</th>
                <td>{{ $data->data }}</td>
            </tr>
            <tr>
                <th>Created At</th>
                <td>{{ $data->created_at }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
