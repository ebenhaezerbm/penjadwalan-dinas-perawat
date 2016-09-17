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
                            <a href="<?php echo base_url('c_Jabatan/add_jabatan'); ?>" class="btn btn-info">Tambah Jabatan</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Slug</th>
                                            <th class="text-center">Title</th>
                                            <th class="text-center">Total</th>
                                            <th colspan="2" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
if ($jabatan):
    $i = 0;
    foreach ($jabatan as $data): $i++;?>
						                                                    <tr>
						                                                        <td class="text-center">
						                                                        	<?php echo $i; ?>
						                                                		</td>
						                                                        <td><?php echo $data->slug; ?></td>
						                                                        <td><?php echo $data->name; ?></td>
						                                                        <td><?php echo $data->count; ?></td>
						                                                        <td><a class="btn-action btn btn-warning" href="<?php echo base_url('c_Jabatan/edit_jabatan/' . $data->ID); ?>"><i class="fa fa-pencil-square-o"></i></a></td><td><a class="btn-action btn btn-danger" href="<?php echo base_url('c_Jabatan/delete_jabatan/' . $data->ID); ?>"><i class="fa fa-trash-o"></i></a></td>
						                                                    </tr>
						                                                    <?php
    endforeach;
else: ?>
                                            	<tr>
                                            		<td colspan="6" class="text-center"><?php echo 'Data tidak ditemukan.'; ?></td>
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