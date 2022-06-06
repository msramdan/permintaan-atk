<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Permintaan ATK</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<link href="<?= base_url() ?>assets/assets/css/vendor.min.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/assets/css/transparent/app.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="<?= base_url() ?>assets/assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/assets/plugins/bootstrap-calendar/css/bootstrap_calendar.css" rel="stylesheet" />

	<link href="<?= base_url() ?>assets/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.min.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
	<script src="<?= base_url() ?>assets/assets/ckeditor/ckeditor.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url() ?>assets/assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>

	<script src="<?= base_url() ?>assets/assets/js/vendor.min.js" type="beba54df5f87d24c2458d535-text/javascript"></script>
	<script src="<?= base_url() ?>assets/assets/js/app.min.js" type="beba54df5f87d24c2458d535-text/javascript"></script>
	<script src="<?= base_url() ?>assets/assets/js/theme/transparent.min.js" type="beba54df5f87d24c2458d535-text/javascript"></script>
	<script src="<?= base_url() ?>assets/assets/plugins/bootstrap-calendar/js/bootstrap_calendar.min.js" type="beba54df5f87d24c2458d535-text/javascript"></script>

	<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
</head>

<body>


	<div class="app-cover"></div>


	<!-- <div id="loader" class="app-loader">
		<span class="spinner"></span>
	</div> -->
	<div id="app" class="app app-header-fixed app-sidebar-fixed">

		<div id="header" class="app-header">

			<div class="navbar-header">
				<a href="#" class="navbar-brand"><span class="navbar-logo"></span> Permintaan ATK</a>
				<button type="button" class="navbar-mobile-toggler" data-toggle="app-sidebar-mobile">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>



			<div class="navbar-nav">

				<div class="navbar-item navbar-user dropdown">
					<a href="#" class="navbar-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
						<img src="<?= base_url() ?>assets/assets/img/user/admin.png" alt="" />
						<span>
							<span class="d-none d-md-inline"><?= ucfirst($this->fungsi->user_login()->username) ?></span>
							<b class="caret"></b>
						</span>
					</a>
					<div class="dropdown-menu dropdown-menu-end me-1">
						<a href="<?= base_url() ?>Auth/logout" class="dropdown-item">Log Out</a>
					</div>
				</div>
			</div>

		</div>


		<div id="sidebar" class="app-sidebar">

			<div class="app-sidebar-content" data-scrollbar="true" data-height="100%">

				<div class="menu">
					<div class="menu-profile">
						<a href="javascript:;" class="menu-profile-link" data-toggle="app-sidebar-profile" data-target="#appSidebarProfileMenu">
							<div class="menu-profile-cover with-shadow"></div>
							<div class="menu-profile-image">
								<img src="<?= base_url() ?>assets/assets/img/user/admin.png" alt="" /> -->
							</div>
							<div class="menu-profile-info">
								<div class="d-flex align-items-center">
									<div class="flex-grow-1">
										<?= ucfirst($this->fungsi->user_login()->username) ?>
									</div>
								</div>
							</div>
						</a>
					</div>

					<div class="menu-header">Main Menu</div>
					<div class="menu-item <?= $this->uri->segment(1) == 'dashboard' ? 'active' : '' ?>">
						<a href="<?= base_url() ?>dashboard" class="menu-link ">
							<div class="menu-icon">
								<i class="fa fa-home"></i>
							</div>
							<div class="menu-text">Dashboard</div>
						</a>
					</div>
					<div class="menu-item <?= $this->uri->segment(1) == 'barang' ? 'active' : '' ?>">
						<a href="<?= base_url() ?>barang" class="menu-link ">
							<div class="menu-icon">
								<i class="fa fa-cube"></i>
							</div>
							<div class="menu-text">Data Barang</div>
						</a>
					</div>
					<div class="menu-item <?= $this->uri->segment(1) == 'permintaan' ? 'active' : '' ?>">
						<a href="<?= base_url() ?>permintaan" class="menu-link ">
							<div class="menu-icon">
								<i class="fa fa-list"></i>
							</div>
							<div class="menu-text">List Permintaan</div>
						</a>
					</div>

					<div class="menu-item has-sub <?= $this->uri->segment(1) == 'user' || $this->uri->segment(1) == 'history_login' || $this->uri->segment(1) == 'backup' ? 'active' : '' ?>">
						<a href="javascript:;" class="menu-link">
							<div class="menu-icon">
								<i class="fa fa-cogs"></i>
							</div>
							<div class="menu-text">Setting</div>
							<div class="menu-caret"></div>
						</a>
						<div class="menu-submenu">
							<div class="menu-item <?= $this->uri->segment(1) == 'user' ? 'active' : '' ?>">
								<a href="<?= base_url() ?>user" class="menu-link">
									<div class="menu-text">Data User</div>
								</a>
							</div>
							<div class="menu-item  <?= $this->uri->segment(1) == 'history_login' ? 'active' : '' ?>">
								<a href="<?= base_url() ?>history_login" class="menu-link">
									<div class="menu-text">History Login</div>
								</a>
							</div>
							<div class="menu-item  <?= $this->uri->segment(1) == 'backup' ? 'active' : '' ?>">
								<a href="<?= base_url() ?>backup" class="menu-link">
									<div class="menu-text">Backup Database</div>
								</a>
							</div>
						</div>
					</div>


					<div class="menu-item d-flex">
						<a href="javascript:;" class="app-sidebar-minify-btn ms-auto" data-toggle="app-sidebar-minify"><i class="fa fa-angle-double-left"></i></a>
					</div>

				</div>

			</div>

		</div>
		<div class="app-sidebar-bg"></div>
		<div class="app-sidebar-mobile-backdrop"><a href="#" data-dismiss="app-sidebar-mobile" class="stretched-link"></a></div>
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
		<?php if ($this->session->flashdata('message')) : ?>
		<?php endif; ?>

		<div class="flash-data2" data-flashdata2="<?= $this->session->flashdata('error'); ?>"></div>
		<?php if ($this->session->flashdata('error')) : ?>
		<?php endif; ?>


		<!-- isi -->
		<?php echo $contents ?>
		<script>
			// create base url from php
			var baseURL = '<?php echo base_url(); ?>';
			// create site url from php
			var siteURL = '<?php echo site_url(); ?>';
		</script>

		<script src="<?= base_url() ?>assets/assets/js/rocket-loader.min.js" data-cf-settings="beba54df5f87d24c2458d535-|49" defer=""></script>

		<script src="<?= base_url() ?>assets/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
		<script src="<?= base_url() ?>assets/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
		<script src="<?= base_url() ?>assets/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
		<script src="<?= base_url() ?>assets/assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/js/sweetalert.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/js/sweetalert.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> <!-- untuk sweet alret -->
		<script src="<?php echo base_url(); ?>assets/assets/js/dataflash.js"></script>
		<script src="<?= base_url() ?>assets/assets/plugins/chart.js/dist/chart.min.js"></script>
</body>

</html>



<script>
	//datatable
	$('#data-table-default').DataTable({
		responsive: true
	});
	$('#data-table-default2').DataTable({
		responsive: true
	});
	//ckeditor
	$('#wysihtml5').wysihtml5();
</script>