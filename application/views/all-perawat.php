            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line"><?php echo $title; ?></h1>

                    <?php 
                    	if( $message ){
                    		echo '<div class="alert alert-'.$type.'">'.$message.'</div>'; 
                    	}
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="<?php echo base_url('c_Perawat/add_perawat'); ?>" class="btn btn-info">Tambah Perawat</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">NIP</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Jenis Kelamin</th>
                                            <th class="text-center">Tempat Lahir</th>
                                            <th class="text-center">Tanggal Lahir</th>
                                            <th class="text-center">Alamat</th>
                                            <th class="text-center">Jenjang Pendidikan</th>
                                            <th class="text-center">Jabatan</th>
                                            <th class="text-center">Phone</th>
                                            <th colspan="2" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if( $perawat ) :
                                                $i = 0;
                                            	foreach ($perawat as $data) : $i++; ?>
                                                    <tr>
                                                        <td class="text-center">
                                                        	<?php echo $i; ?>
                                                		</td>
                                                        <td><?php echo $data->NIP; ?></td>
                                                        <td><?php echo $data->name; ?></td>
                                                        <td>
                                                            <?php
                                                                switch ( $data->gender ) {
                                                                    case 'female':
                                                                        echo 'Perempuan';
                                                                        break;
                                                                    
                                                                    default:
                                                                        echo 'Laki-laki';
                                                                        break;
                                                                }
                                                            ?>
                                                        </td>
                                                        <td><?php echo $data->place_of_birth; ?></td>
                                                        <td><?php echo $data->date_of_birth; ?></td>
                                                        <td><?php echo $data->address; ?></td>
                                                        <td>
                                                            <?php 
                                                                $pendidikan = $this->m_Pendidikan->get_pendidikan_by_slug($data->education);
                                                                echo $pendidikan->name; 
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php 
                                                                $jabatan = $this->m_Jabatan->get_jabatan_by_slug($data->occupation);
                                                                echo $jabatan->name; 
                                                            ?>
                                                        </td>
                                                        <td><?php echo $data->phone; ?></td>
                                                        <td><a href="<?php echo base_url('c_Perawat/edit_perawat/'.$data->ID); ?>" class="btn-action btn btn-primary btn-edit">Edit</a></td>
                                                        <td><a href="#" class="btn-action btn btn-danger btn-delete" data-id="<?php echo $data->ID; ?>">Delete</a></td>
                                                    </tr>
                                                    <?php
                                                endforeach;
                                            else : ?>
                                            	<tr>
                                            		<td colspan="12" class="text-center"><?php echo 'Data tidak ditemukan.'; ?></td>
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