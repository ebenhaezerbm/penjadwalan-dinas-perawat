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
                            <a href="<?php echo base_url('c_Perawat/add_perawat'); ?>" class="btn btn-info">Tambah Perawat</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped b-t b-light">
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
// echo "<pre>";
// print_r($perawat);
// echo "</pre>";
if ($perawat) {
    $i = 0;
    foreach ($perawat as $data) {
        echo '<tr>
                                                        <td class="text-center">
                                                            ' . $i . '
                                                        </td>

                                                        <td>' . $data['NIP'] . '</td>
                                                        <td>' . $data['name'] . '</td>
                                                        <td>' . (($data['gender']) ? 'female' : 'Perempuan') . '</td>
                                                        <td>' . $data['place_of_birth'] . '</td>
                                                        <td>' . $data['date_of_birth'] . '</td>
                                                        <td>' . $data['address'] . '</td>
                                                        <td>';

        $pendidikan = $this->m_Pendidikan->get_pendidikan_by_slug($data['education']);
        echo $pendidikan->name;
        echo '
                                                        </td>
                                                        <td>';

        $jabatan = $this->m_Jabatan->get_jabatan_by_slug($data['occupation']);
        echo $jabatan->name;

        echo '</td>
                                                        <td>' . $data['phone'] . '</td>
                                                        <td><a class="btn btn-warning" href="' . base_url('c_Perawat/edit_perawat/' . $data['ID']) . '" ><i class="fa fa-pencil-square-o"></i></a></td>
                                                        <td><a class="btn btn-danger" href="#" data-id="' . $data['ID'] . '"><i class="fa fa-trash-o"></i></a></td>
                                                    </tr>';

        $i++;}
} else {
    echo '<tr>
                                                    <td colspan="12" class="text-center">Data tidak ditemukan.</td>
                                                </tr>';
}
echo "</tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>";