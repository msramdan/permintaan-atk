<div id="content" class="app-content">
<div class="col-xl-12 ui-sortable">
<div class="panel panel-inverse" data-sortable-id="form-stuff-1" style="" data-init="true">

<div class="panel-heading ui-sortable-handle">
<h4 class="panel-title">KELOLA DATA PERMINTAAN</h4>
<div class="panel-heading-btn">
<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand" data-bs-original-title="" title="" data-tooltip-init="true"><i class="fa fa-expand"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
</div>
</div>
<div class="panel-body">
        
            <form action="<?php echo $action; ?>" method="post">
            <thead>
            <table id="data-table-default" class="table  table-bordered table-hover table-td-valign-middle">
	    <tr><td width='200'>Kode Permintaan <?php echo form_error('kode_permintaan') ?></td><td><input type="text" class="form-control" name="kode_permintaan" id="kode_permintaan" placeholder="Kode Permintaan" value="<?php echo $kode_permintaan; ?>" /></td></tr>
	    <tr><td width='200'>Nama Karyawan <?php echo form_error('nama_karyawan') ?></td><td><input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" placeholder="Nama Karyawan" value="<?php echo $nama_karyawan; ?>" /></td></tr>
	    <tr><td width='200'>Nip <?php echo form_error('nip') ?></td><td><input type="text" class="form-control" name="nip" id="nip" placeholder="Nip" value="<?php echo $nip; ?>" /></td></tr>
	    <tr><td width='200'>Jabatan <?php echo form_error('jabatan') ?></td><td><input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan" value="<?php echo $jabatan; ?>" /></td></tr>
	    <tr><td width='200'>Tanggal Permintaan <?php echo form_error('tanggal_permintaan') ?></td><td><input type="date" class="form-control" name="tanggal_permintaan" id="tanggal_permintaan" placeholder="Tanggal Permintaan" value="<?php echo $tanggal_permintaan; ?>" /></td></tr>
	    <tr><td width='200'>Status <?php echo form_error('status') ?></td><td><input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="permintaan_id" value="<?php echo $permintaan_id; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('permintaan') ?>" class="btn btn-info"><i class="fas fa-undo"></i> Kembali</a></td></tr>
</thead>
	</table></form>        </div>
</div>
</div>
</div>