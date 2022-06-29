<div id="content" class="app-content">
	<div class="col-xl-12 ui-sortable">
		<div class="panel panel-inverse" data-sortable-id="form-stuff-1" style="" data-init="true">

			<div class="panel-heading ui-sortable-handle">
				<h4 class="panel-title">KELOLA DATA BARANG</h4>
				<div class="panel-heading-btn">
					<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand" data-bs-original-title="" title="" data-tooltip-init="true"><i class="fa fa-expand"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="panel-body">

				<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
					<thead>
						<table id="data-table-default" class="table  table-bordered table-hover table-td-valign-middle">


							<?php if ($this->uri->segment(2) == 'create' || $this->uri->segment(2) == 'create_action') { ?>
								<tr>
									<td width='200'>Kode Barang <?php echo form_error('kode_barang') ?></td>
									<td><input type="text" class="form-control" name="kode_barang" id="kode_barang" readonly placeholder="Kode Barang" value="<?php echo $kode; ?>" /></td>
								</tr>
							<?php } else { ?>
								<tr>
									<td width='200'>Kode Barang <?php echo form_error('kode_barang') ?></td>
									<td><input type="text" class="form-control" name="kode_barang" id="kode_barang" readonly placeholder="Kode Barang" value="<?php echo $kode_barang; ?>" /></td>
								</tr>
							<?php } ?>


							<tr>
								<td width='200'>Nama Barang <?php echo form_error('nama_barang') ?></td>
								<td><input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="<?php echo $nama_barang; ?>" /></td>
							</tr>
							<tr>
								<td width='200'>Jumlah <?php echo form_error('jumlah') ?></td>
								<td><input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo $jumlah; ?>" /></td>
							</tr>

							<tr>
								<td width='200'>Desk <?php echo form_error('desk') ?></td>
								<td> <textarea class="form-control" rows="3" name="desk" id="desk" placeholder="Desk"><?php echo $desk; ?></textarea></td>
							</tr>
							<?php if ($this->uri->segment(2) == 'create' || $this->uri->segment(2) == 'create_action') { ?>
								<tr>
									<td width='200'>photo <?php echo form_error('photo') ?></td>
									<td><input type="file" class="form-control" name="photo" id="photo" placeholder="photo" required="" value="" onchange="return validasiEkstensi()" />
										<!-- <div id="preview"></div> -->
									</td>
								</tr>
							<?php } else { ?>
								<div class="form-group">
									<tr>
										<td width='200'>Photo <?php echo form_error('photo') ?></td>
										<td>
											<a href="#modal-dialog" data-bs-toggle="modal"><img src="<?php echo base_url(); ?>assets/assets/img/barang/<?= $photo ?>" style="width: 150px;height: 150px;border-radius: 5%;"></img></a>
											<input type="hidden" name="photo_lama" value="<?= $photo ?>">
											<p style="color: red">Note :Pilih photo Jika Ingin Merubah photo</p>
											<input type="file" class="form-control" name="photo" id="photo" placeholder="photo" value="" onchange="return validasiEkstensi()" />
											<!-- <div id="preview"></div> -->
										</td>

									</tr>
								</div>
							<?php } ?>
							<tr>
								<td></td>
								<td><input type="hidden" name="barang_id" value="<?php echo $barang_id; ?>" />
									<button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> <?php echo $button ?></button>
									<a href="<?php echo site_url('barang') ?>" class="btn btn-info"><i class="fas fa-undo"></i> Kembali</a>
								</td>
							</tr>
					</thead>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function validasiEkstensi() {
		var inputFile = document.getElementById('photo');
		var pathFile = inputFile.value;
		var ekstensiOk = /(\.jpg|\.jpeg|\.png)$/i;
		if (!ekstensiOk.exec(pathFile)) {
			alert('Silakan upload file yang memiliki ekstensi .jpeg/.jpg/.png');
			inputFile.value = '';
			return false;
		} else {
			// Preview photo
			if (inputFile.files && inputFile.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					document.getElementById('preview').innerHTML = '<iframe src="' + e.target.result + '" style="height:150px; width:200px"/>';
				};
				reader.readAsDataURL(inputFile.files[0]);
			}
		}
	}
</script>