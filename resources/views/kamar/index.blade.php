<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Kamar Hotel</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; padding: 30px; background: #f4f6f9; }
        h1 { color: #2c3e50; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background: #fff; }
        th, td { padding: 15px; text-align: left; border: 1px solid #ddd; }
        th { background: #2c3e50; color: white; }
    </style>
</head>
<body>

    <h1>Daftar Kamar Hotel - Percobaan Kelompok</h1>
    
    <table>
        <thead>
            <tr>
                <th>Nomor Kamar</th>
                <th>Tipe Kamar</th>
                <th>Harga per Malam</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kamar as $k)
            <tr>
                <td><b>{{ $k['nomor'] }}</b></td>
                <td>{{ $k['tipe'] }}</td>
                <td style="color: #27ae60; font-weight: bold;">{{ $k['harga'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>