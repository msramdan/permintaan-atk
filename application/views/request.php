<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>FORM PERMINTAAN BARANG</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <link href="<?= base_url() ?>assets/assets/css/vendor.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/assets/css/transparent/app.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
</head>

<body class='pace-top'>

    <div class="app-cover"></div>
    <div id="app" class="app">

        <div class="coming-soon">
            <div class="coming-soon-content">
                <div class="col-md-8 offset-md-2 ui-sortable">
                    <div class="panel panel-inverse" data-sortable-id="form-stuff-1" data-init="true">

                        <div class="panel-heading ui-sortable-handle">
                            <h4 class="panel-title">FORM PERMINTAAN BARANG</h4>
                        </div>
                        <div class="panel-body">

                            <div class="card-body">

                                <form action="" method="POST" id="form-purchase">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <input class="form-control" id="kode" type="text" value="<?= $kode ?>" placeholder="Kode" name="nama" autocomplete="off" readonly>
                                            </div>

                                            <div class="mb-3">
                                                <input class="form-control" id="nama" type="text" value="" placeholder="Nama" name="nama" autocomplete="off">
                                            </div>

                                            <div class="mb-3">
                                                <input class="form-control" id="nip" type="text" value="" placeholder="NIP" name="nip" autocomplete="off">
                                            </div>

                                            <div class="mb-3">
                                                <input class="form-control" id="tanggal" type="date" readonly value="<?= date('Y-m-d') ?>" placeholder="NAMA" name="nama" autocomplete="off">
                                            </div>

                                            <div class="mb-3">
                                                <select name="jabatan_id" class="form-control" id="jabatan_id">
                                                    <option value="" style="color:black">-- Pilih Jabatan --</option>
                                                    <option value="Subbag Umum" style="color:black">Subbag Umum</option>
                                                    <option value="Subbag SDM" style="color:black">Subbag SDM</option>
                                                    <option value="Subbag Keuangan" style="color:black">Subbag Keuangan</option>
                                                    <option value="Subbag Humas" style="color:black">Subbag Humas</option>
                                                    <option value="Subbag Hukum" style="color:black">Subbag Hukum</option>
                                                    <option value="Pemeriksa" style="color:black">Pemeriksa</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 div-periksa" style="display: none;">
                                                <input class="form-control" id="team" type="text" placeholder="team" name="team" autocomplete="off">
                                            </div>
                                            <input type="hidden" name="kode-produk" id="kode-produk">
                                            <input type="hidden" name="index_tr" id="index-tr">

                                            <div class="mb-3">
                                                <select name="produk" id="produk" class="form-control" id="produk">
                                                    <option value="" disabled selected>-- Pilih Barang --</option>
                                                    <?php $no = 1;
                                                    foreach ($barang_data as $barang) { ?>
                                                        <option value="<?= $barang->barang_id ?>" style="color:black"><?= $barang->nama_barang ?></option>
                                                    <?php } ?>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 offset-md-6">
                                            <input class="form-control" type="number" id="qty" name="qty" placeholder="Jumlah" min="1">
                                        </div>

                                        <div class="col-md-2 mb-3">
                                            <button type="button" class="btn btn-info  btn-block" id="btn-update" style="display: none;">
                                                <i class="fas fa-save me-1"></i>
                                                Update
                                            </button>
                                            <button type="button" id="btn-add" class="btn btn-primary btn-block" id="btn-add">
                                                <i class="fas fa-cart-plus me-1"></i>
                                                Add
                                            </button>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <table class="table table-hover table-bordered table-sm mt-3" id="tbl-cart">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama Barang</th>
                                                    <th>Jumlah</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row mt-4">
                                            <div class="col-md-2">
                                                <div class="form-group mb-2">
                                                    <button type="submit" class="btn btn-primary d-block w-100 mb-2" id="btn-save" disabled="">
                                                        Simpan
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
    </div>
    <script src="<?= base_url() ?>assets/assets/js/vendor.min.js" type="a18806d67f21ea51b29e0428-text/javascript"></script>
    <script src="<?= base_url() ?>assets/assets/js/app.min.js" type="a18806d67f21ea51b29e0428-text/javascript"></script>
    <script src="<?= base_url() ?>assets/assets/js/demo/coming-soon.demo.js" type="a18806d67f21ea51b29e0428-text/javascript"></script>
    <script src="<?= base_url() ?>assets/assets/js/rocket-loader.min.js" data-cf-settings="beba54df5f87d24c2458d535-|49" defer=""></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/assets/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/assets/js/sweetalert.js"></script>
    <script src="<?= base_url() ?>assets/assets/js/dataflash.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script>
        const btnAdd = $('#btn-add')
        const produk = $('#produk')
        const qty = $('#qty')
        const tblCart = $('#tbl-cart')
        const kodeProduk = $('#kode-produk')
        const btnUpdate = $('#btn-update')
        const btnSave = $('#btn-save')
        const kode = $('#kode')
        const tanggal = $('#tanggal')
        const jabatan = $('#jabatan_id')
        const nama = $('#nama')
        const nip = $('#nip')
        const team = $('#team')

        $('#form-purchase').submit(function(e) {
            e.preventDefault()
            let pembelian = {
                team: team.val(),
                nama: nama.val(),
                nip: nip.val(),
                tanggal: tanggal.val(),
                jabatan: jabatan.val(),
                kode: kode.val(),
                produk: $('input[name="produk[]"]').map(function() {
                    return $(this).val()
                }).get(),
                qty: $('input[name="qty[]"]').map(function() {
                    return $(this).val()
                }).get(),
            }

            if (!kode.val()) {
                kode.focus()
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Kode pembelian tidak boleh kosong'
                })

            } else if (!nama.val()) {
                nama.focus()
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Nama tidak boleh kosong'
                })
            } else if (!nip.val()) {
                nip.focus()
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'NIP tidak boleh kosong'
                })
            } else if (!tanggal.val()) {
                tanggal.focus()
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Tanggal tidak boleh kosong'
                })
            } else if (!jabatan.val()) {
                jabatan.focus()
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Jabatan tidak boleh kosong'
                })
            } else if (team.val() == '' && jabatan.val() == 'Pemeriksa') {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Team tidak boleh kosong'
                })
            } else {
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url() ?>request/simpan',
                    data: pembelian,
                    success: function(res) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Simpan data',
                            text: 'Berhasil'
                        }).then(function() {
                            window.location = '<?= base_url() ?>request'
                        })
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!'
                        })
                    }
                })

            }


        })



        produk.change(function() {

            qty.prop('type', 'text')
            qty.prop('disabled', true)
            qty.val('Loading...')

            $.ajax({
                url: '<?= base_url() ?>barang/getBarangById/' + $(this).val(),
                type: "GET",
                contentType: "application/json",
                dataType: "json",
                success: function(res) {
                    kodeProduk.val(res.kode_barang)
                    setTimeout(() => {
                        qty.prop('type', 'number')
                        qty.prop('disabled', false)
                        qty.val('')
                        qty.focus()
                    }, 500)

                }
            })
        })

        btnAdd.click(function() {
            if (!produk.val()) {
                produk.focus()

                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Produk tidak boleh kosong'
                })

            } else if (!qty.val() || qty.val() < 1) {
                qty.focus()
                qty.val('')

                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Qty tidak boleh kosong dan minimal 1'
                })

            } else {
                // cek duplikasi produk
                $('input[name="produk[]"]').each(function() {
                    let index = $(this).parent().parent().index()
                    if ($(this).val() == produk.val()) {
                        tblCart.find('tbody tr:eq(' + index + ')').remove()
                        generateNo()
                    }
                })

                tblCart.find('tbody').append(`
                    <tr>
                        <td>${tblCart.find('tbody tr').length + 1}</td>
                        <td>
                            ${produk.find('option:selected').text()}
                            <input type="hidden" class="produk-hidden" name="produk[]" value="${produk.val()}">
                        </td>
                        <td>
                            ${qty.val()}
                            <input type="hidden" class="qty-hidden" name="qty[]" value="${qty.val()}">
                        </td>
                        <td>
                            <button class="btn btn-warning btn-xs me-1 btn-edit" type="button">
                                <i class="fas fa-edit"></i>
                            </button>

                            <button class="btn btn-danger btn-xs btn-delete" type="button">
                                <i class="fas fa-times"></i>
                            </button>
                        </td>
                    </tr>
                `)

                generateNo()
                clearForm()
                cekTableLength()
                produk.focus()
            }
        })

        btnUpdate.click(function() {
            let index = $('#index-tr').val()

            if (!produk.val()) {
                produk.focus()

                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Produk tidak boleh kosong'
                })

            } else if (!qty.val() || qty.val() < 1) {
                qty.focus()
                qty.val('')

                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Qty tidak boleh kosong dan minimal 1'
                })

            } else {
                // cek duplikasi pas update
                $('input[name="produk[]"]').each(function(i) {
                    // i = index each
                    if ($(this).val() == produk.val() && i != index) {
                        tblCart.find('tbody tr:eq(' + i + ')').remove()
                    }
                })

                $('#tbl-cart tbody tr:eq(' + index + ')').html(`
                    <td></td>
                    <td>
                        ${produk.find('option:selected').text()}
                        <input type="hidden" class="produk-hidden" name="produk[]" value="${produk.val()}">
                    </td>
                    <td>
                        ${qty.val()}
                        <input type="hidden" class="qty-hidden" name="qty[]" value="${qty.val()}">
                    </td>
                    <td>
                        <button class="btn btn-warning btn-xs me-1 btn-edit" type="button">
                            <i class="fas fa-edit"></i>
                        </button>

                        <button class="btn btn-danger btn-xs btn-delete" type="button">
                            <i class="fas fa-times"></i>
                        </button>
                    </td>
                `)

                clearForm()
                generateNo()
                btnUpdate.hide()
                btnAdd.show()
            }
        })

        $(document).on('click', '.btn-edit', function(e) {
            e.preventDefault()
            let index = $(this).parent().parent().index()
            btnAdd.hide()
            btnUpdate.show()
            produk.val($('.produk-hidden:eq(' + index + ')').val())
            qty.val($('.qty-hidden:eq(' + index + ')').val())
            $('#index-tr').val(index)
        })

        $(document).on('click', '.btn-delete', function(e) {
            $(this).parent().parent().remove()
            generateNo()
            cekTableLength()
        })

        function generateNo() {
            let no = 1
            tblCart.find('tbody tr').each(function() {
                $(this).find('td:nth-child(1)').html(no)
                no++
            })
        }

        function clearForm() {
            kodeProduk.val('')
            produk.val('')
            qty.val('')
        }

        function cekTableLength() {
            let cek = tblCart.find('tbody tr').length

            if (cek > 0) {
                btnSave.prop('disabled', false)
            } else {
                btnSave.prop('disabled', true)
            }
        }
        $('#jabatan_id').change(function() {
            var value = $(this).val()
            if (value == 'Pemeriksa') {
                $('.div-periksa').show()
            } else {
                $('#team').val('');
                $('.div-periksa').hide()
            }
        })
    </script>
</body>

</html>