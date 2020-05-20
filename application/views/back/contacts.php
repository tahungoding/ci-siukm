                <div class="content">
                      
                    
                    <!-- Start Content-->
                    <div class="container-fluid">


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="header-title">Kotak Saran</h4>
                                    <p>

                                    </p>
                                    <?php if ($this->session->flashdata('success')) { ?>
                                    <div class="alert alert-success">
                                        <?=$this->session->flashdata('success')?>
                                    </div>
                                    <?php } ?> <?php if ($this->session->flashdata('error')){ ?>
                                        <div class="alert alert-danger">
                                            <?=$this->session->flashdata('error')?>
                                        </div>  
                                    <?php } ?>
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
                                            <th data-toggle="true"> # </th>
                                            <th> Nama </th>
                                            <th> Subject </th>
                                            <th data-hide="phone"> Email  </th>
                                            <th> Action </th>
                                            <th data-hide="all"> Tanggal </th>
                                            <th data-hide="all"> Pesan </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $i = 1;
                                        foreach ($contacts as $kontak) { ?>
                                        <tr>
                                            <td><?=$i?></td>
                                            <td><?=$kontak->nama;?></td>
                                            <td><?=$kontak->subjek;?></td>
                                            <td><?=$kontak->email;?></td>
                                            <td>
                                                <form action="" method="post" name="form<?=$kontak->id_saran?>">
                                                    <input type="hidden" name="deleteContacts">
                                                    <input type="hidden" name="id_saran" value="<?=$kontak->id_saran?>">
                                                    <button type="button"
                                                    	onclick="confirmDelete(<?=$kontak->id_saran?>, event)"
                                                    	class="btn btn-danger"><i
                                                    		class="fa fa-trash-alt"></i> </button>
                                                </form>
                                            </td>
                                            <td><?=date_indo(date('Y-m-d', strtotime($kontak->created_at))).'&nbsp'.date('H:i:s', strtotime($kontak->created_at));?>
                                            </td>
                                            <td><?=$kontak->isi;?></td>
                                            </tr>
                                        <?php $i++; } ?>
                                        </tbody>
                                        <tfoot>
                                        <tr class="active">
                                            <td colspan="5">
                                                <div class="text-right">
                                                    <ul class="pagination pagination-split justify-content-end footable-pagination"></ul>
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