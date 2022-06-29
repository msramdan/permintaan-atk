<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
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
</head>


<body>
    <div class="container">
        <table class="table" id="table">
            <tbody>
                <tr>
                    <td>Kode Permintaan</td>
                    <td><?php echo $data[0]['code'] ?></td>
                </tr>
                <tr>
                    <td>Nama Karyawan</td>
                    <td><?php echo $data[0]['name'] ?></td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td><?php echo $data[0]['nip'] ?></td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td><?php echo $data[0]['jabatan'] ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td><?php echo $data[0]['status'] ?></td>
                </tr>
            </tbody>
        </table>
        <table class="mt-5 table table-bordered">
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