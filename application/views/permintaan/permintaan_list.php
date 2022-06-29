<div class="modal fade" id="ajaxModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Permintaan</h5>

                <button type="button" class="close no-print" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Kode Permintaan</th>
                                        <td><span id="kode_permintaan"></span></td>
                                    </tr>
                                    <tr>
                                        <th>Nama Karyawan</th>
                                        <td><span id="nama_karyawan"></span></td>
                                    </tr>
                                    <tr>
                                        <th>NIP</th>
                                        <td><span id="nip"></span></td>
                                    </tr>
                                    <tr>
                                        <th>Jabatan</th>
                                        <td><span id="jabatan"></span></td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Permintaan</th>
                                        <td><span id="tanggal_permintaan"></span></td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td><span id="status"></span></td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <span id="result"></span>
                            <div id="result_tunggu"></div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">

                <a href="#" id="pdf" class="btn btn-warning">Download PDF</a>
                <button type="button" class="btn btn-primary" onclick="print()">Print</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="content" class="app-content">
    <h1 class="page-header">KELOLA DATA PERMINTAAN</h1>
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">List Data permintaan </h4>
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
            </div>
        </div>
        <form action="<?= base_url() ?>permintaan" method="POST" class="row mx-5">
            <div class="form-group col-sm-2">
                <label for=" exampleInputEmail1">Start Date</label>
                <input type="date" class="form-control" id="startDate" name="startDate" value="<?php echo !empty($startDate) ? $startDate : ''; ?>">
            </div>
            <div class="form-group col-sm-2">
                <label for=" exampleInputEmail1">End Date</label>
                <input type="date" class="form-control" id="endDate" name="endDate" value="<?php echo !empty($endDate) ? $endDate : ''; ?>">
            </div>
            <div class="col-sm-3">
                <button type="submit" id="" class="btn btn-primary mt-3 ml-2">Filter</button>
                <?php if (!empty($endDate) && !empty($startDate)) { ?>
                    <a href="<?= base_url() ?>/Permintaan" class="btn btn-warning mt-3">Reset</a>
                <?php } ?>
            </div>
        </form>


        <div class="panel-body">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="box-body">
                            <div class='row'>
                                <div class='col-md-9'>
                                    <!-- <div style="padding-bottom: 10px;">
                                        <?php echo anchor(site_url('permintaan/create'), '<i class="fas fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm tambah_data"'); ?>
                                    </div> -->
                                </div>
                            </div>
                            <div class="box-body" style="overflow-x: scroll; ">
                                <table id="data-table-default" class="table table-bordered table-hover table-td-valign-middle text-white">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Permintaan</th>
                                            <th>Nama Karyawan</th>
                                            <th>Nip</th>
                                            <th>Jabatan</th>
                                            <th>Tanggal Permintaan</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody><?php $no = 1;
                                            foreach ($permintaan_data as $permintaanKey => $permintaanVal) {
                                            ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?php echo $permintaanVal['kode_permintaan'] ?></td>
                                                <td><?php echo $permintaanVal['nama_karyawan'] ?></td>
                                                <td><?php echo $permintaanVal['nip'] ?></td>
                                                <td><?php echo $permintaanVal['jabatan'] ?></td>
                                                <td><?php echo $permintaanVal['tanggal_permintaan'] ?></td>
                                                <td><?php echo $permintaanVal['status'] ?></td>
                                                <td style="text-align:center" width="250px">
                                                    <?php if ($permintaanVal['status'] == "Waiting") { ?>
                                                        <a href="<?php base_url() ?>permintaan/approved/<?= $permintaanVal['permintaan_id'] ?>" id="download" class="btn btn-md btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Approved</a>
                                                        <a href="<?php base_url() ?>permintaan/reject/<?= $permintaanVal['permintaan_id'] ?>" id="download" class="btn btn-md btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Reject</a>
                                                    <?php } else { ?>
                                                        <button type="button" class="btn btn-md btn-primary" disabled><i class="fa fa-check" aria-hidden="true"></i> Approved</button>
                                                        <button type="button" class="btn btn-md btn-danger" disabled><i class="fa fa-times" aria-hidden="true"></i> Reject</button>
                                                    <?php } ?>

                                                    <a href="#" class="btn btn-success btn-sm" title="Detail" data-toggle="modal" data-target="#ajaxModel" data-id="<?= $permintaanVal['permintaan_id'] ?>" data-kode_permintaan="<?= $permintaanVal['kode_permintaan'] ?>" data-nama_karyawan="<?= $permintaanVal['nama_karyawan'] ?>" data-nip="<?= $permintaanVal['nip'] ?>" data-jabatan="<?= $permintaanVal['jabatan'] ?>" data-tanggal_permintaan="<?= $permintaanVal['tanggal_permintaan'] ?>" data-status="<?= $permintaanVal['status'] ?>" id="detailtransaksi">
                                                        <i class="fas fa-eye"></i> Detail
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).on('click', '#detailtransaksi', function() {
            var id = $(this).data('id');
            var kode_permintaan = $(this).data('kode_permintaan');
            var nama_karyawan = $(this).data('nama_karyawan');
            var nip = $(this).data('nip');
            var jabatan = $(this).data('jabatan');
            var status = $(this).data('status');
            var tanggal_permintaan = $(this).data('tanggal_permintaan');

            $('#ajaxModel #kode_permintaan').text(kode_permintaan);
            $('#ajaxModel #nama_karyawan').text(nama_karyawan);
            $('#ajaxModel #nip').text(nip);
            $('#ajaxModel #jabatan').text(jabatan);
            $('#ajaxModel #status').text(status);
            $('#ajaxModel #tanggal_permintaan').text(tanggal_permintaan);

            $.ajax({
                url: '<?= base_url() ?>permintaan/getById/' + id,
                type: 'GET',
                data: {},
                success: function(html) {
                    $("#result").html(html);
                    $("#result_tunggu").html('');
                    $('#pdf').attr("href", "<?php echo base_url('permintaan/pdf/') ?>" + id)

                }
            });

        })
        $('.updateData').click(function() {
            $('#ajaxModelEdit').modal('show');
        });

        function print() {
            var button = $('#ajaxModel').find('button');
            $.each(button, function(i, val) {
                $(button[i]).hide()
            });
            var divContents = $('#ajaxModel').html();
            var a = window.open('', '', 'height=500, width=500');
            a.document.write(divContents);
            a.document.close();
            a.print();

            var button = $('#ajaxModel').find('button');
            $.each(button, function(i, val) {
                $(button[i]).show()
            });
        }

        function date() {
            var startDate = $('#startDate').val()
            var endDate = $('#endDate').val()
            if (startDate > endDate) {
                alert('Tanggal pertama Tidak Boleh lebih besar dari akhir')
                var now = new Date();
                var day = ("0" + now.getDate()).slice(-2);
                var month = ("0" + (now.getMonth() + 1)).slice(-2);
                var today = now.getFullYear() + "-" + (month) + "-" + (day);
                $('#endDate').val(today);
                $('#startDate').val(today);
                return
            }
            $("#export").attr("href", "<?= base_url('Permintaan/filterDate') ?>/" + startDate + "/" + endDate)
        }
        $('#startDate,#endDate').change(function() {
            if ($('#startDate').val() !== '' && $('#endDate').val() !== '')
                date()
        })
    </script>