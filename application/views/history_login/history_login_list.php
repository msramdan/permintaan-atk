<div id="content" class="app-content">
    <h1 class="page-header">KELOLA DATA HISTORY_LOGIN</h1>
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">List Data history_login </h4>
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
                                    </div>
                                </div>
                            </div>
                            <div class="box-body" style="overflow-x: scroll; ">
                                <div class="panel-body">
                                    <table id="data-table-default" class="table table-bordered table-hover table-td-valign-middle text-white">
                                        <thead>
                                            <tr>
                                                <th width="1%">No</th>
                                                <th>User</th>
                                                <th>Info</th>
                                                <th>Tanggal</th>
                                                <th>User Agent</th>
                                            </tr>
                                        </thead>
                                        <tbody><?php $no = 1;
                                                foreach ($history_login_data as $history_login) {
                                                ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?php echo $history_login->username ?></td>
                                                    <td><?php echo $history_login->info ?></td>
                                                    <td><?php echo $history_login->tanggal ?></td>
                                                    <td><?php echo $history_login->user_agent ?></td>
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
    </div>