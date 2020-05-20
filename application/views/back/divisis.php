                <div class="content">
                      
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card-box">
                                    <h4 class="header-title">Divisi UKM</h4>
                                    <p class="sub-header">
                                    <?php if ($this->session->userdata('status') != 'anggota') { ?>
                                    <div id="add-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel"
                                        aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <form class="form-horizontal" method="POST">
                                                        <div class="form-group">
                                                            <div class="col-12">
                                                                <label for="nama">Nama Divisi</label>
                                                                <input class="form-control" type="text" name="nama" id="nama" required placeholder="...">
                                                            </div>
                                                        </div>
                                    
                                                        <div class="form-group">
                                                            <div class="col-12">
                                                                <label for="deskripsi">Deskripsi</label>
                                                                <textarea name="deskripsi" class="form-control" id="" cols="10" rows="3"></textarea>
                                                            </div>
                                                        </div>
                                    
                                                        <div class="form-group account-btn text-center mt-2">
                                                            <div class="col-12">
                                                                <button class="btn width-lg btn-info waves-effect waves-light"
                                                                    type="submit" name="addDivisi">Submit</button>
                                                            </div>
                                                        </div>
                                    
                                                    </form>
                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     <?php if ($this->session->flashdata('success')) { ?>
                                        <div class="alert alert-success">
                                            <?=$this->session->flashdata('success')?>
                                        </div>
                                        <?php }elseif ($this->session->flashdata('error')){ ?>
                                            <div class="alert alert-danger">
                                                <?=$this->session->flashdata('error')?>
                                            </div>  
                                        <?php } ?>
                                    <button type="button" class="btn btn-info waves-effect waves-light" style="width: 150px;" data-toggle="modal" data-target="#add-modal"><i
                                            class="fab fa-hubspot"></i> Tambah </button>
                                    <?php } ?>
                                    </p>
                                    
                                    <div class="table-responsive" style="overflow-y: hidden;">
                                        <table class="table mb-0">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama</th>
                                                    <th>Deskripsi</th>
                                                    <?php if ($this->session->userdata('status') != 'anggota') { ?>
                                                    <th>Action</th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            $i = 1;
                                            foreach ($lists as $list) { ?>
                                                <tr>
                                                    <th scope="row"><?=$i?></th>
                                                    <td><?=$list->nama?></td>
                                                    <td><?=$list->deskripsi?></td>
                                                    <?php if ($this->session->userdata('status') != 'anggota') { ?>
                                                    <td>
                                                    <div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel"
                                                        aria-hidden="true" style="display: none;">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <form class="form-horizontal" method="POST">
                                                                    <input type="hidden" name="id_divisi" value="<?=$list->id_divisi?>">
                                                                        <div class="form-group">
                                                                            <div class="col-12">
                                                                                <label for="nama">Nama Divisi</label>
                                                                                <input class="form-control" name="nama" value="<?=$list->nama?>" type="text" id="nama" required
                                                                                    placeholder="...">
                                                                            </div>
                                                                        </div>
                                                    
                                                                        <div class="form-group">
                                                                            <div class="col-12">
                                                                                <label for="deskripsi">Deskripsi</label>
                                                                                <textarea name="deskripsi" class="form-control" id="" cols="10" rows="3"><?=$list->deskripsi?></textarea>
                                                                            </div>
                                                                        </div>
                                                    
                                                                        <div class="form-group account-btn text-center mt-2">
                                                                            <div class="col-12">
                                                                                <button class="btn width-lg btn-primary waves-effect waves-light"
                                                                                    type="submit" name="editDivisi">Simpan</button>
                                                                            </div>
                                                                        </div>
                                                    
                                                                    </form>
                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#edit-modal" ><i class="fa fa-pencil-alt"></i> </button>
                                                        <form method="POST" style="display: inline-block;">
                                                             <input type="hidden" name="id_divisi" value="<?=$list->id_divisi?>">
                                                            <button type="submit" name="deleteDivisi" class="btn btn-danger" onclick="confirm('Apakah anda yakin ?')"><i class="fa fa-trash-alt"></i> </button>
                                                        </form>
                                                    </td>
                                                    <?php $i++; } ?>
                                                </tr>
                                           <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                        
                            </div>
                        
                        </div>
                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->