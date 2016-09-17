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
                
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Perawat
                        </div>
                        <div class="panel-body">
                            <form method="POST" action="<?php echo base_url('c_Perawat/update_perawat'); ?>" role="form">
                                <input type="hidden" name="ID" value="<?php echo $perawat->ID; ?>" />
                                <div class="form-group">
                                    <label for="nip">NIP</label>
                                    <input type="text" class="form-control" id="nip" name="nip" value="<?php echo $perawat->NIP; ?>" placeholder="Nomor Induk Pegawai" />
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $perawat->name; ?>" placeholder="Nama Perawat" />
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="gender" id="optionsRadios1" value="male" <?php echo ( $perawat->gender == 'male' ) ? 'checked' : '' ; ?> />
                                            Laki-laki
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="gender" id="optionsRadios2" value="female" <?php echo ( $perawat->gender == 'female' ) ? 'checked' : '' ; ?> />
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="date-of-birth">Tanggal lahir</label>
                                    <input type="text" class="form-control" id="date-of-birth" name="date_of_birth" value="<?php echo $perawat->date_of_birth; ?>" placeholder="Tanggal lahir" />
                                </div>
                                <div class="form-group">
                                    <label for="place-of-birth">Tempat lahir</label>
                                    <input type="text" class="form-control" id="place-of-birth" name="place_of_birth" value="<?php echo $perawat->place_of_birth; ?>" placeholder="Tempat lahir" />
                                </div>
                                <div class="form-group">
                                    <label for="place-of-birth">Alamat <small><em>(Tempat tinggal saat ini)</em></small></label>
                                    <textarea class="form-control" rows="3" name="address" placeholder="Alamat tempat tinggal"><?php echo $perawat->address; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Jenjang Pendidikan</label>
                                    <?php 
                                    	if( $pendidikan ){
                                        	$i = 0;
                                        	foreach ($pendidikan as $data) {
                                                $i++;
                                                $checked = ( $data->slug == $perawat->education ) ? 'checked' : '' ; ?>
                                                <div class="radio">
			                                        <label>
			                                            <input type="radio" name="education" id="educationsOptions<?php echo $i; ?>" value="<?php echo $data->slug; ?>" <?php echo $checked; ?> />
			                                            <?php echo $data->name; ?>
			                                        </label>
			                                    </div>
                                                <?php 
                                            }
                                        }else{
                                            echo '<option>-- Select --</option>';
                                        }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <select name="occupation" class="form-control">
                                        <?php
                                            if( $jabatan ){
                                            	foreach ($jabatan as $data) {
                                                    $selected = ( $data->slug == $perawat->occupation ) ? 'selected' : '' ;
                                                    echo '<option value="'.$data->slug.'" '.$selected.'>'.$data->name.'</option>';
                                                }
                                            }else{
                                                echo '<option>-- Select --</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $perawat->phone; ?>" placeholder="Phone" />
                                </div>
                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>
                            <hr />

                            For more customization for this template or its components please visit official bootstrap website i.e <strong> getbootstrap.com </strong> or
                            <a href="http://getbootstrap.com/css/#forms" target="_blank">click here</a>

                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="alert alert-warning">
                        This is blank page for which you can customize for your project. 
                        Use this admin template 100% free to use for personal and commercial use which is crafted by 
                        <br />
                        <a href="http://www.designbootstrap.com/" target="_blank">DesignBootstrap.com</a> . For more free templates and snippets keep looking <a href="http://www.designbootstrap.com/" target="_blank">DesignBootstrap.com</a> . Hope you will like our work
                    </div>
                </div>
                
            </div>