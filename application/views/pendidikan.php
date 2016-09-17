            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line"><?php echo $title; ?></h1>

                    <?php
if ($message) {
    echo '<div class="alert alert-' . $type . '">' . $message . '</div>';
}
?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="<?php echo base_url('c_Pendidikan/add_pendidikan'); ?>" class="btn btn-info">Tambah Jenjang Pendidikan</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Slug</th>
                                            <th class="text-center">Title</th>
                                            <th colspan="2" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
if ($pendidikan):
    $i = 0;
    foreach ($pendidikan as $data): $i++;?>
				                                                    <tr>
				                                                        <td class="text-center">
				                                                        	<?php echo $i; ?>
				                                                		</td>
				                                                        <td><?php echo $data->slug; ?></td>
				                                                        <td><?php echo $data->name; ?></td>
				                                                        <td><a class="btn-action btn btn-primary" href="<?php echo base_url('c_Pendidikan/edit_pendidikan/' . $data->ID); ?>"><i class="fa fa-pencil-square-o"></i></a></td>
				                                                        <td><a class="btn-action btn btn-danger" href="<?php echo base_url('c_Pendidikan/delete_pendidikan/' . $data->ID); ?>"><i class="fa fa-trash-o"></i></a></td>
				                                                    </tr>
				                                                    <?php
    endforeach;
else: ?>
                                            	<tr>
                                            		<td colspan="5" class="text-center"><?php echo 'Data tidak ditemukan.'; ?></td>
                                            	</tr>
                                            	<?php
endif;
?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>