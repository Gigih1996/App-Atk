<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    {{-- <title>Hello, world!</title> --}}
</head>

<body>
    <h2 class="text-center">LAPORAN PEMAKAIAN BARANG</h2>
    <h3 class="text-center">PERIODE {{ $start_date }} - {{ $end_date }}</h3>
    <br>
    <br>
    <table class="table table-bordered ">
        <tr>
            <th class="text-center">No.</th>
            <th>Nama Barang</th>
            <th>Nama Divisi </th>
            <th>Total Pemakaian</th>
            <th class="text-center">Persentase Pemakaian</th>
        </tr>

        @foreach ($sql_transaction as $key => $item)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $item->products }}</td>
                <td>{{ $item->departement }}</td>
                <td>{{ $item->total_sum }}</td>
                <td>{{ number_format($item->persen) }}%</td>
            </tr>
        @endforeach

    </table>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
