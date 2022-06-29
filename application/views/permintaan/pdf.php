<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        #table {
            font-family: sans-serif;
            border-collapse: collapse;
            width: 100%;
            font-size: 12px;
            text-align: left;
            /* line-height: 10px */
        }

        #table td,
        #table th {
            border: 1px solid #ddd;
            padding: 4px;
        }

        #table th {
            padding-top: 5px;
            padding-bottom: 5px;
            text-align: left;
            background-color: #fff;
            color: black;
            text-align: left;
        }
    </style>
    <title>Laporan Permintaan</title>
    <style>
        #table {
            font-family: sans-serif;
            border-collapse: collapse;
            width: 100%;
            font-size: 12px;
            text-align: left;
            line-height: 14px
        }

        #table td,
        #table th {
            border: 1px solid #ddd;
            padding: 4px;
        }

        #table th {
            padding-top: 5px;
            padding-bottom: 5px;
            text-align: left;
            background-color: #fff;
            color: black;
            text-align: left;
        }
    </style>
</head>


<body>
    <div class="container">
        <center>
            <h4>Laporan Permintaan</h4>
        </center>

        <hr>
        <table style="font-family: sans-serif;
                border-collapse: collapse;
                width: 100%;
                font-size: 12px;
                text-align: left;">
            <tbody>
                <tr>
                    <td>Kode Permintaan</td>
                    <td>:</td>
                    <td><?php echo $data[0]['code'] ?></td>
                </tr>
                <tr>
                    <td>Nama Karyawan</td>
                    <td>:</td>
                    <td><?php echo $data[0]['name'] ?></td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td>:</td>
                    <td><?php echo $data[0]['nip'] ?></td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td><?php echo $data[0]['jabatan'] ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td><?php echo $data[0]['status'] ?></td>
                </tr>
            </tbody>
        </table>
        <h4>Detail Item Permintaan</h4>
        <!-- <hr> -->
        <table id="table">
            <thead>
                <tr>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $dataKey => $dataValue) { ?>
                    <tr>
                        <td><?php echo $dataValue['kode_barang'] ?></td>
                        <td><?php echo $dataValue['nama_barang'] ?></td>
                        <td><?php echo $dataValue['jumlah'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>


</body>

</html>