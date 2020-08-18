<script src="<?php echo ASSETS_PATH;?>js/admin_media.js"></script>

<?php if($this->session->flashdata('success')){ ?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> Success!</h5>
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php }?>
<?php if($this->session->flashdata('error')){ ?>
    <div class="alert alert-denger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> Error!</h5>
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php }?>


  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Media</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Get Ready</a></li>
              <li class="breadcrumb-item active">Media</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

 
 
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Media List</h3>
                <div class="btn-group btn-group-sm float-right" role="group" aria-label="MoreActionButtons" >
                  <a href="<?php echo ADMIN_BASE_PATH; ?>productmedia/create" class="btn btn-info btnpos link_tab">
                  <i class="fas fa-plus"></i> Add </a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="example2" class="table table-bordered table-hover dataTable">
                <thead>
                    <tr>
                    <th>Product</th>
                    <th>Media</th>
                    <th>Serial No.</th>
                    <th>Is Active</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>                       
                    <?php 
                    // pre($bodycontent['userslist']);
                    foreach ($bodycontent['MediaList'] as $media) { ?> 
                        <tr>
                        <td><?php echo $media->ProductName; ?> (<?php echo $media->ProductCode; ?>) </td>
                        <td style="text-align: center;">
                            <?php if ($media->Media!="" && $media->MediaType=='IMG') {?>    
                              <a target="_blank" href="<?php echo ASSETS_PATH.'product-media/image/'.$media->Media; ?>" class="baguetteBoxOne">
                                <img src="<?php echo ASSETS_PATH.'product-media/image/'.$media->Media; ?>" style="width:  60px;height: 60px;" class="img-fluid mb-2" alt="product image">
                              </a >                  
                                <!-- <img src="<?php echo ASSETS_PATH.'product-media/image/'.$media->Media; ?>" style="width:  60px;height: 60px;" alt="product image"> -->
                            <?php } elseif ($media->Media!="" && $media->MediaType=='VIDEO') {?>    
                              <a target="_blank" href="<?php echo ASSETS_PATH.'product-media/video/'.$media->Media; ?>" class="baguetteBoxOne">                        
                              <video width="200" height="150" controls>
                                <source src="<?php echo ASSETS_PATH.'product-media/video/'.$media->Media;  ?>" type='video/mp4;codecs="avc1.42E01E, mp4a.40.2"' />
                                Your browser does not support the video tag.
                              </video>
                              </a>  
                            <?php }else{ echo $media->Media; } ?>
                            
                        </td>
                        
                        <td><?php echo $media->SerialNo; ?> </td>
                        <td id="ActiveStatus_<?php echo $media->ProductMediaId;?>" style="text-align: center;">
                            <?php  if ($media->IsActive=='Y') { ?>
                                <a title="Active" onclick="activeInactiveMedia(<?php echo $media->ProductMediaId; ?>,'N');" href="javascrip:void(0)">
                                    <img src="<?php echo ASSETS_PATH; ?>img/tick.png" style="width: 23px;height: 23px;" alt="active icon">
                                </a>                                
                            <?php }else{ ?>
                                <a title="Inactive" onclick="activeInactiveMedia(<?php echo $media->ProductMediaId; ?>,'Y');" href="javascrip:void(0)">
                                    <img src="<?php echo ASSETS_PATH; ?>img/cross.png" style="width: 23px;height: 23px;" alt="inactive icon">
                                </a> 
                            <?php } ?>
                        </td>

                        <td style="text-align: center;">
                          <a title="Delete" href="<?php echo ADMIN_BASE_PATH; ?>productmedia/delete/<?php echo $media->ProductMediaId; ?>" class="btn btn-sm  btn-outline-danger">
                          <i class="fas fa-trash-alt"></i></a>
                        </td>

                        </tr>      
                                
                    <?php } ?>     
                </tbody>
              </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->





<!-- Modal -->
<section class="layout-box-content-format1">
<div class="modal fade" id="myModal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header card-header box-shdw" >
              <h5 class="modal-title">Login & Logout Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: black;">
                <span aria-hidden="true">×</span>
              </button>
            </div>
           
            <div id="ModalBody"  class="modal-body">

            </div>
       
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-sm action-button" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
  </section>