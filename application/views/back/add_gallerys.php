                <div class="content">
                      
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="text-center header-title"><?=$albums->judul?></h4>
                                    <p class="sub-header">
                                    </p>
                                    <form action="gallerys/addG/<?=$this->uri->segment(3)?>" enctype="multipart/form-data" method="post" class="dropzone" id="myAwesomeDropzone">
                                    <input type="hidden" name="id_album" value="<?=$albums->id_album?>">
                                        <div class="fallback">
                                            <input name="file" type="file" multiple />
                                        </div>
                                        <div class="dz-message needsclick">
                                            <i class="h1 text-muted dripicons-cloud-upload"></i>
                                            <h3>Drop files here or click to upload.</h3>
                                            <span class="text-muted font-13">(Tambahkan foto-foto untuk album anda disini)</span>
                                        </div>
                                    </form>
                                </div> <!-- end card-box -->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->  
                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->