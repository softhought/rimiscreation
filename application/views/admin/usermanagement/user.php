<script src="<?php echo ASSETS_PATH; ?>js/admin_user.js"></script>
<?php if($this->session->flashdata('success')){ ?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> Success!</h5>
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php }?>
<?php if($this->session->flashdata('error')){ ?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> Success!</h5>
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php }?>


  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">User Management</a></li>
              <li class="breadcrumb-item active">User</li>
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
                <h3 class="card-title">User(s) List</h3>
                <div class="btn-group btn-group-sm float-right" role="group" aria-label="MoreActionButtons" >
                  <a href="<?php echo ADMIN_BASE_PATH; ?>user/create" class="btn btn-info btnpos link_tab">
                  <i class="fas fa-plus"></i> Add </a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="example2" class="table table-bordered table-hover dataTable">
                <thead>
                    <tr>
                    <th>Name</th>
                    <th>User Name</th>
                    <th>Mobile No.</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>is Active</th>
                    <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody>                       
                    <?php 
                    // pre($bodycontent['userslist']);
                    foreach ($bodycontent['userslist'] as $user) { ?> 
                        <tr>
                        <td><?php echo $user->name; ?> </td>
                        <td><?php echo $user->user_name; ?></td>
                        <td><?php echo $user->mobile_no; ?></td>
                        <td><?php echo $user->role; ?></td>
                        <td style="text-align: center;">
                            <?php  if ($user->is_online=='Y') { ?>
                                <a onclick="openUserloginLogoutDetailModal(<?php echo $user->id; ?>);" href="#">
                                    <img src="<?php echo ASSETS_PATH; ?>img/online.png" style="width: 23px;height: 23px;" alt="active icon">
                                </a>                                
                            <?php }else{ ?>
                                <a href="#">
                                    <img onclick="openUserloginLogoutDetailModal(<?php echo $user->id; ?>);" src="<?php echo ASSETS_PATH; ?>img/offline.png" style="width: 23px;height: 23px;" alt="inactive icon">
                                </a> 
                            <?php } ?>
                        </td>
                        <td style="text-align: center;">
                            <?php  if ($user->is_active=='Y') { ?>
                                <a href="<?php echo ADMIN_BASE_PATH;?>user/InactiveUser/<?php echo $user->id; ?>">
                                    <img src="<?php echo ASSETS_PATH; ?>img/active.png" style="width: 23px;height: 23px;" alt="active icon">
                                </a>                                
                            <?php }else{ ?>
                                <a href="<?php echo ADMIN_BASE_PATH;?>user/ActiveUser/<?php echo $user->id; ?>">
                                    <img src="<?php echo ASSETS_PATH; ?>img/inactive.png" style="width: 23px;height: 23px;" alt="inactive icon">
                                </a> 
                            <?php } ?>
                        </td>

                        <!-- <td style="text-align:center;">
                            <a title="Edit User" href="usermanagement/1/edit" class="btn btn-primary btn-xs" data-title="Edit">
                                <i class="fa fa-fw fa-edit"></i>
                            </a>      
                            <a href="usermanagement/change/1" class="btn btn-primary btn-xs" title="Change Password">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </a>                      
                        </td> -->

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