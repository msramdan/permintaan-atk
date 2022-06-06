<div id="content" class="app-content">
    <h1 class="page-header">KELOLA DATA BARANG</h1>
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">List Data barang </h4>
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
                                    <div style="padding-bottom: 10px;">
                                        <?php echo anchor(site_url('barang/create'), '<i class="fas fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm tambah_data"'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body" style="overflow-x: scroll; ">
                                <table id="data-table-default" class="table table-bordered table-hover table-td-valign-middle text-white">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Desk</th>
                                            <th>Photo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody><?php $no = 1;
                                            foreach ($barang_data as $barang) {
                                            ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?php echo $barang->kode_barang ?></td>
                                                <td><?php echo $barang->nama_barang ?></td>
                                                <td><?php echo $barang->jumlah ?></td>
                                                <td><?php echo $barang->desk ?></td>
                                                <td>
													<a id="view_gambar" href="#modal-dialog" data-bs-toggle="modal" <?php if ($barang->photo == '' || $barang->photo == null) { ?> data-photo="default.png" <?php } else { ?> data-photo="<?php echo $barang->photo ?>" <?php } ?> data-nama_barang="<?php echo $barang->nama_barang ?>">
														<?php if ($barang->photo == '' || $barang->photo == null) { ?>
															<img src="<?= base_url() ?>assets/assets/img/barang/default.png" class="rounded h-30px my-n1 mx-n1" />
														<?php } else { ?>
															<img src="<?= base_url() ?>assets/assets/img/barang/<?php echo $barang->photo ?>" class="rounded h-30px my-n1 mx-n1" />
														<?php } ?>

													</a>
												</td>
                                                <td style="text-align:center" width="">
                                                    <?php
                                                    echo anchor(site_url('barang/update/' . encrypt_url($barang->barang_id)), '<i class="fas fa-pencil-alt" aria-hidden="true"></i>', 'class="btn btn-primary btn-sm update_data"');
                                                    echo '  ';
                                                    echo anchor(site_url('barang/delete/' . encrypt_url($barang->barang_id)), '<i class="fas fa-trash-alt" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm delete_data" Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                                                    ?>
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