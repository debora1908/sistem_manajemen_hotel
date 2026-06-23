<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Kamar Hotel</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 500px;
            margin: 50px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #2c3e50;
        }

        label {
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }

        .harga {
            background-color: #ecf0f1;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Pemesanan Kamar Hotel</h2>

    <form>
        <label>Nama Pemesan</label>
        <input type="text" placeholder="Masukkan nama">

        <label>Tanggal Check-In</label>
        <input type="date">

        <label>Tanggal Check-Out</label>
        <input type="date">

        <label>Jenis Kamar</label>
        <select>
            <option>Standard - Rp300.000</option>
            <option>Deluxe - Rp500.000</option>
            <option>Suite - Rp800.000</option>
        </select>

        <label>Jumlah Kamar</label>
        <input type="number" min="1" value="1">

        <div class="harga">
            <strong>Total Harga:</strong> Rp0
        </div>

        <button type="submit">Pesan Sekarang</button>
    </form>
</div>

</body>
</html>