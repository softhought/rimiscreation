<script src="<?php echo ASSETS_PATH;?>js/admin_user.js"></script>



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
              <li class="breadcrumb-item active">Create</li>
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
                        <h3 class="card-title">Create User</h3>
                        <div class="btn-group btn-group-sm float-right" role="group" aria-label="MoreActionButtons" >
                            <a href="<?php echo ADMIN_BASE_PATH; ?>user" class="btn btn-info btnpos link_tab">
                            <i class="fas fa-clipboard-list"></i> List </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form onsubmit="return CreateUserFrmValidate();" action="store" id="CreateUserFrm" method="post">
                            <div class="row">

                                <div class="col-md-4">
                                    <label for="name">Name *</label>
                                    <div class="form-group">
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control forminputs typeahead" id="name" name="name" placeholder="Enter Name" autocomplete="off" >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="user_name">Username *</label>
                                    <div class="form-group">
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control forminputs typeahead" id="user_name" name="user_name" placeholder="Enter Username" autocomplete="off" >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="mobile_no">Mobile No.</label>
                                    <div class="form-group">
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control forminputs typeahead" id="mobile_no" name="mobile_no" placeholder="Enter Mobile No." autocomplete="off" >
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">

                                <div class="col-md-4">
                                    <label for="user_role_id">User Role*</label>
                                    <div class="input-group input-group-sm">  
                                        <select class="form-control select2" data-show-subtext="true" name="user_role_id" id="user_role_id" data-live-search="true"  >
                                            <option  value="0">Select</option>
                                            <?php foreach ($bodycontent['userRoleList'] as $value) { ?>
                                                <option  value="<?php echo $value->id; ?>" ><?php echo $value->role; ?></option>   
                                            <?php  }  ?>                                        
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="password">Password *</label>
                                    <div class="form-group">
                                        <div class="input-group input-group-sm">
                                            <input type="password" class="form-control forminputs typeahead" id="password" name="password" placeholder="Enter Mobile No." autocomplete="off" >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="cpassword">Confirm Password *</label>
                                        <div class="input-group input-group-sm">
                                            <input type="password" class="form-control forminputs typeahead" id="cpassword" name="cpassword" placeholder="Enter Mobile No." autocomplete="off" >
                                        </div>
                                    </div>
                                </div>

                            </div>                            
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-sm btn-block btn-outline-primary">Create</button>
                                </div>
                            </div>
                        </div>
                        </form>
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