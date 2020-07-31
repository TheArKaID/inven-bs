<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<style>
  body {
    font-size: 18px;
    font-family: Arial, Helvetica, sans-serif;
  }
  th{
    text-align: start;
  }
  .page-break {
    page-break-after: always;
  }
</style>

<body>
  <table class="center" border="1" cellpadding="0" cellspacing="0">
    <tr>
      <td rowspan="3"><img src="assets/img/sdmuhbrosotmini.png" width="75px"></td>
      <td colspan="2">Barang Milik {{$sekolah}}</td>
    </tr>
    <tr>
      <th>Kode Barang</th>
      <td>{{ $commodity->item_code }}</td>
    </tr>
    <tr>
      <th>Tanggal Beli</th>
      <td>{{ $commodity->date_of_purchase }}</td>
    </tr>
  </table>
</body>

</html>