<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>
<body>
    <h3>{{ $details['title'] }}</h3>
    <p>Dengan Hormat</p> 
    <p>Kepada bapa/ibu {{ $details['nama'] }}, diharapkan menghadap kepada kasi promosi anjungan sumatera barat TMII untuk melakukan pembayaran pada kerusakan atau kehilangan yang 
            disebabkan oleh peminjaman </p><br>
    <table border="1">
        <tr>
            <td>Nama :</td>
            <td>{{ $details['name'] }}</td>
        </tr>
        <tr>
            <td>No HP :</td>
            <td>{{ $details['nohp'] }}</td>
        </tr>
        <tr>
            <td>Email :</td>
            <td>{{ $details['email'] }}</td>
        </tr>
        <tr>
            <td>Tanggal Peminjaman :</td>
            <td>{{ $details['tanggal'] }}</td>
        </tr>
    </table>
    <p>demikian kami sampaikan, kami tunggu 1×24 jam.</p><br>
    <p>terimakasih.</p><br>
</body>
</html>