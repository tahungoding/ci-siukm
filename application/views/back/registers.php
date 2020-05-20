                <div class="content">
                      
                    
                    <!-- Start Content-->
                    <div class="container-fluid">


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <div class="row">
                                    <div class="col-md-6 col-lg-6 col-sm-12 ">
                                    <h4 class="header-title">Pendaftar </h4>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12">
                                    <?php if($status->pendaftaran == 1){ ?>
                                    <form method="POST" class="text-right">
                                        <button class="btn btn-danger" type="submit" name="tutup"><i class="fa fa-door-closed"></i> Tutup Pendaftaran</button>
                                    </form></div>
                                    <?php }else{ ?>
                                    <form method="POST" class="text-right">
                                        <button class="btn btn-primary" type="submit" name="buka"><i class="fa fa-door-open"></i> Buka Pendaftaran</button>
                                    </form></div>
                                    <?php } ?>
                                    </div>
                                    <p>
                                    <?php if ($this->session->flashdata('success')) { ?>
                                    <div class="alert alert-success">
                                        <?=$this->session->flashdata('success')?>
                                    </div>
                                    <?php } ?> <?php if ($this->session->flashdata('error')){ ?>
                                        <div class="alert alert-danger">
                                            <?=$this->session->flashdata('error')?>
                                        </div>  
                                    <?php } ?>
                                    </p>
                                    <label class="form-inline mb-3">
                                        Show
                                        <select id="demo-show-entries" class="form-control form-control-sm mb-0 ml-1 mr-1">
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                        </select>
                                        entries
                                    </label>
                                    <div class="table-responsive">
                                    <table id="demo-foo-pagination" class="table mb-0 table-bordered toggle-arrow-tiny" data-page-size="10">
                                        <thead>
                                        <tr>
                                            <th data-toggle="true">No</th>
                                            <th> NIM </th>
                                            <th> Nama </th>
                                            <th> Divisi </th>
                                            <th data-hide="phone"> Telp  </th>
                                            <th> Action </th>
                                            <th data-hide="all"> Program Studi </th>
                                            <th data-hide="all"> Angkatan </th>
                                            <th data-hide="all"> Alasan Bergabung </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if (!$registers) {
                                            echo "<td colspan='9'>Belum ada data</td>";
                                        }
                                        $no = 1;
                                        foreach($registers as $pendaftar) { ?>
                                        <tr>
                                            <td><?=$no?></td>
                                            <td><?=$pendaftar->nim?></td>
                                            <td><?=$pendaftar->nama?></td>
                                            <td><?=$pendaftar->nama_divisi?></td>
                                            <td><?=$pendaftar->no_hp?></td>
                                            <td>
                                            <form method="POST" name="form<?=$pendaftar->id_anggota?>">
                                                <input type="hidden" name="verifikasi">
                                                <input type="hidden" name="id_anggota" value="<?=$pendaftar->id_anggota?>" />
                                                <input type="hidden" name="nim" value="<?=$pendaftar->nim?>" />
                                                <button type="submit"
                                                	class="btn btn-primary fa fa-check"
                                                	onclick="confirmDelete(<?=$pendaftar->id_anggota?>, event)"> </button>
                                            </form>
                                            </td>
                                            <td><?=$pendaftar->program_studi?></td>
                                            <td><?=$pendaftar->angkatan?></td>
                                            <td><?=$pendaftar->alasan?></td>
                                        </tr>
                                        <?php $no++; } ?>
                                        </tbody>
                                        <tfoot>
                                        <tr class="active">
                                            <td colspan="6 ">
                                                <div class="text-right">
                                                    <ul class="pagination pagination-split justify-content-center footable-pagination"></ul>
                                                </div>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->