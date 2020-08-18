<script src="<?php echo ASSETS_PATH; ?>js/admin_Category.js"></script>
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
            <h1 class="m-0 text-dark">Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Get Ready</a></li>
              <li class="breadcrumb-item active">Product</li>
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
                <h3 class="card-title">Product List</h3>
                <div class="btn-group btn-group-sm float-right" role="group" aria-label="MoreActionButtons" >
                  <a href="<?php echo ADMIN_BASE_PATH; ?>Product/create" class="btn btn-info btnpos link_tab">
                  <i class="fas fa-plus"></i> Add </a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="example2" class="table table-bordered table-hover dataTable">
                <thead>
                    <tr>
                    <th>Name</th>
                    <th>Style No.</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Sub Category</th>
                    <th>Vendor</th>
                    <th>Brand</th>
                    <th>Description</th>
                    <th>Stock</th>
                    <th>Is Active</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>                       
                    <?php 
                    // pre($bodycontent['userslist']);
                    foreach ($bodycontent['productList'] as $product) { ?> 
                        <tr>
                        <td><?php echo $product->ProductName; ?> </td>
                        <td><?php echo $product->ProductCode; ?></td>
                        <td><?php echo $product->Price; ?></td>
                        <td><?php echo $product->Category; ?></td>
                        <td><?php echo $product->SubCategory; ?></td>
                        <td><?php echo $product->Vendor; ?></td>
                        <td><?php echo $product->Brand; ?></td>
                        <td><?php echo $product->Description; ?></td>
                        <td style="text-align: center;">
                          <?php  if ($product->InStock=='Y') { ?>
                                    <img title="Customizable" src="<?php echo ASSETS_PATH; ?>img/tick.png" style="width: 23px;height: 23px;" alt="active icon">
                            <?php }else{ ?>
                                    <img src="<?php echo ASSETS_PATH; ?>img/cross.png" style="width: 23px;height: 23px;" alt="inactive icon">
                            <?php } ?>
                        </td>

                        <td style="text-align: center;">
                            <?php  if ($product->IsActive=='Y') { ?>
                                <!-- <a title="Active" href="<?php echo ADMIN_BASE_PATH;?>user/InactiveUser/<?php echo $product->ProductId; ?>"> -->
                                    <img src="<?php echo ASSETS_PATH; ?>img/tick.png" style="width: 23px;height: 23px;" alt="active icon">
                                <!-- </a>                                 -->
                            <?php }else{ ?>
                                <!-- <a title="Inactive" href="<?php echo ADMIN_BASE_PATH;?>user/ActiveUser/<?php echo $product->ProductId; ?>"> -->
                                    <img src="<?php echo ASSETS_PATH; ?>img/cross.png" style="width: 23px;height: 23px;" alt="inactive icon">
                                <!-- </a>  -->
                            <?php } ?>
                        </td>

                        <td style="text-align: center;">
                          <a title="Edit" href="<?php echo ADMIN_BASE_PATH; ?>product/edit/<?php echo $product->ProductId; ?>" class="btn btn-sm  btn-outline-info">
                          <i class="far fa-edit"></i></a>
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