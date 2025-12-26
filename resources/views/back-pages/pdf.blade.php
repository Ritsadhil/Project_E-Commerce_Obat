<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Obat</title>
    <style>
        body { font-family: sans-serif; }
        header { text-align: center; margin-bottom: 20px; }
        header h1 { margin: 0; font-size: 20px; color: #333; }
        header p { margin: 5px 0; font-size: 12px; color: #666; }
        
        th, td { padding: 8px; text-align: left; font-size: 12px; }
        th { background-color: #00897b; color: white; }
    </style>
</head>
<body>
    <header>
        <h1>LAPORAN DATA OBAT</h1>
        <p>MedStore</p>
    </header>
        <table width="100%" border="1" cellspacing="0" cellpadding="5">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Obat</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($medicines as $index => $medicine)
                    <tr>
                        <td align="center">{{ $index + 1 }}</td>
                        <td>{{ $medicine->name }}</td>
                        <td>{{ $medicine->category->name ?? '-' }}</td>
                        <td>Rp {{ number_format($medicine->price, 0, ',', '.') }}</td>
                        <td align="center">{{ $medicine->stock }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</body>
</html>