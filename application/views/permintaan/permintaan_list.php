<div class="modal fade" id="ajaxModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Permintaan</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                        <h5>Detail Barang</h5>
                        <div class="table-responsive">
                            <span id="result"></span>
                            <div id="result_tunggu"></div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">

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
                                            foreach ($permintaan_data as $permintaan) {
                                            ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?php echo $permintaan->kode_permintaan ?></td>
                                                <td><?php echo $permintaan->nama_karyawan ?></td>
                                                <td><?php echo $permintaan->nip ?></td>
                                                <td><?php echo $permintaan->jabatan ?></td>
                                                <td><?php echo $permintaan->tanggal_permintaan ?></td>
                                                <td><?php echo $permintaan->status ?></td>
                                                <td style="text-align:center" width="250px">
                                                    <?php if ($permintaan->status == "Waiting") { ?>
                                                        <a href="<?php base_url() ?>permintaan/approved/<?= $permintaan->permintaan_id ?>" id="download" class="btn btn-md btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Approved</a>
                                                        <a href="<?php base_url() ?>permintaan/reject/<?= $permintaan->permintaan_id ?>" id="download" class="btn btn-md btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Reject</a>
                                                    <?php } else { ?>
                                                        <button type="button" class="btn btn-md btn-primary" disabled><i class="fa fa-check" aria-hidden="true"></i> Approved</button>
                                                        <button type="button" class="btn btn-md btn-danger" disabled><i class="fa fa-times" aria-hidden="true"></i> Reject</button>
                                                    <?php } ?>

                                                    <a href="#" class="btn btn-success btn-sm" title="Detail" data-toggle="modal" data-target="#ajaxModel"
                                                    data-id="<?= $permintaan->permintaan_id ?>"
                                                    data-kode_permintaan="<?= $permintaan->kode_permintaan ?>"
                                                    data-nama_karyawan="<?= $permintaan->nama_karyawan ?>"
                                                    data-nip="<?= $permintaan->nip ?>"
                                                    data-jabatan="<?= $permintaan->jabatan ?>"
                                                    data-tanggal_permintaan="<?= $permintaan->tanggal_permintaan ?>" data-status="<?= $permintaan->status ?>" id="detailtransaksi">
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
                }
            });


        })


        $('.updateData').click(function() {
            $('#ajaxModelEdit').modal('show');
        });
    </script>