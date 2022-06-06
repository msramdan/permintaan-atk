<div id="content" class="app-content">
	<div class="row">

		<div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-blue">
				<div class="stats-icon"><i class="fa fa-cube"></i></div>
				<div class="stats-info">
					<h4>DATA BARANG</h4>
					<?php
					$total_barang = $this->db->get('barang')->num_rows();
					?>
					<p><?= $total_barang ?> Data</p>
				</div>
				<div class="stats-link">
					<a href="<?= base_url() ?>barang">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
				</div>
			</div>
		</div>


		<div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-info">
				<div class="stats-icon"><i class="fa fa-list"></i></div>
				<div class="stats-info">
					<h4>DATA PERMINTAAN</h4>
					<?php
					$total_permintaan = $this->db->get('permintaan')->num_rows();
					$total_waiting = $this->db->get_where('permintaan', array('status' => 'Waiting'))->num_rows();
					?>
					<p><?= $total_permintaan ?> Data</p>
				</div>
				<div class="stats-link">
					<a href="<?= base_url() ?>permintaan">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
				</div>
			</div>
		</div>


		<div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-orange">
				<div class="stats-icon"><i class="fa fa-check"></i></div>
				<div class="stats-info">
					<h4>PERMINTAAN APPROVED</h4>
					<?php
					$total_approved = $this->db->get_where('permintaan', array('status' => 'Approved'))->num_rows();
					?>
					<p><?= $total_approved ?> Data</p>
				</div>
				<div class="stats-link">
					<a href="<?= base_url() ?>permintaan">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
				</div>
			</div>
		</div>


		<div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-red">
				<div class="stats-icon"><i class="fa fa-times"></i></div>
				<div class="stats-info">
					<h4>PERMINTAAN REJECT</h4>
					<?php
					$total_reject = $this->db->get_where('permintaan', array('status' => 'Reject'))->num_rows();
					?>
					<p><?= $total_reject ?> Data</p>
				</div>
				<div class="stats-link">
					<a href="<?= base_url() ?>permintaan">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
				</div>
			</div>
		</div>

	</div>

	<div class="row">
		<div class="col-xl-6 ui-sortable">
			<div class="panel panel-inverse" data-sortable-id="table-basic-1">
				<div class="panel-heading ui-sortable-handle">
					<h4 class="panel-title">5 Permintaan Barang Terbaru</h4>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-bordered table-hover table-td-valign-middle text-white">
							<tr>
								<th>No</th>
								<th>Kode Permintaan</th>
								<th>Nama Karyawan</th>
								<th>Tanggal</th>
								<th>Status</th>
							</tr>
							<tbody><?php $no = 1;
									foreach ($permintaan_data as $permintaan) {
									?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?php echo $permintaan->kode_permintaan ?></td>
										<td><?php echo $permintaan->nama_karyawan ?></td>
										<td><?php echo $permintaan->tanggal_permintaan ?></td>
										<td><?php echo $permintaan->status ?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>

				</div>
			</div>
		</div>

		<div class="col-xl-6 ui-sortable">
			<div class="panel panel-inverse" data-sortable-id="table-basic-1">
				<div class="panel-heading ui-sortable-handle">
					<h4 class="panel-title">Permintaan ( Waiting VS Approved VS Reject )</h4>
				</div>
				<div class="panel-body">
					<div id="nv-pie-chart" class="h-250px"></div>
				</div>
			</div>
		</div>

	</div>
</div>
<script src="<?= base_url() ?>assets/assets/js/demo/dashboard-v2.js" type="beba54df5f87d24c2458d535-text/javascript"></script>
<link href="<?= base_url() ?>assets/assets/plugins/nvd3/build/nv.d3.css" rel="stylesheet" />
<script src="<?= base_url() ?>assets/assets/plugins/d3/d3.min.js"></script>
<script src="<?= base_url() ?>assets/assets/plugins/nvd3/build/nv.d3.min.js"></script>
<script>
	var pieChartData = [{
			'label': 'Waiting',
			'value': <?= $total_waiting ?>,
			'color': 'grey'
		},
		{
			'label': 'Approved',
			'value': <?= $total_approved ?>,
			'color': 'green'
		},
		{
			'label': 'Reject',
			'value': <?= $total_reject ?>,
			'color': 'red'
		},
	];

	nv.addGraph(function() {
		var pieChart = nv.models.pieChart()
			.x(function(d) {
				return d.label
			})
			.y(function(d) {
				return d.value
			})
			.showLabels(true)
			.labelThreshold(.05);

		d3.select('#nv-pie-chart').append('svg')
			.datum(pieChartData)
			.transition().duration(350)
			.call(pieChart);

		return pieChart;
	});
</script>