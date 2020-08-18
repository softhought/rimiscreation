<script src="<?php echo ASSETS_PATH;?>js/admin_Vendor.js"></script>



<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Vendor</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Vendor</a></li>
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
                <div class="card FrmBlock-sm">
                    <div class="card-header">
                        <h3 class="card-title">Create Vendor</h3>
                        <div class="btn-group btn-group-sm float-right" role="group" aria-label="MoreActionButtons" >
                            <a href="<?php echo ADMIN_BASE_PATH; ?>vendor" class="btn btn-info btnpos link_tab">
                            <i class="fas fa-clipboard-list"></i> List </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form onsubmit="return ValidateForm();" action="<?php if($bodycontent['MODE']=='ADD'){echo ADMIN_BASE_PATH.'vendor/store' ;}else{echo ADMIN_BASE_PATH.'vendor/update';}?>" id="CreateCategory" method="post">
                            <div class="row">
                                <input type='hidden' value="<?php echo $bodycontent['VendorId'];?>" name="VendorId">
                                <div class="col-md-6">
                                    <label for="Name">Name *</label>
                                    <div class="form-group">
                                        <div class="input-group input-group-sm">
                                            <input value="<?php if($bodycontent['MODE']=='EDIT'){echo $bodycontent['VendorData']->Name ;}?>" type="text" class="form-control forminputs typeahead" id="Name" name="Name" placeholder="Enter Name" autocomplete="off" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="BusinessName">Business Name *</label>
                                    <div class="form-group">
                                        <div class="input-group input-group-sm">
                                            <input value="<?php if($bodycontent['MODE']=='EDIT'){echo $bodycontent['VendorData']->BusinessName ;}?>" type="text" class="form-control forminputs typeahead" id="BusinessName" name="BusinessName" placeholder="Enter Business Name" autocomplete="off" >
                                        </div>
                                    </div>
                                </div>
                                
                                </div>
                                <div class="row">

                                <div class="col-md-6">
                                    <label for="Address">Address *</label>
                                    <div class="form-group">
                                        <div class="input-group input-group-sm">
                                            <textarea  class="form-control forminputs typeahead" id="Address" name="Address" placeholder="Enter Address" ><?php if($bodycontent['MODE']=='EDIT'){echo $bodycontent['VendorData']->Address ;}?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="BusinessAddress">Business Address *</label>
                                    <div class="form-group">
                                        <div class="input-group input-group-sm">
                                            <textarea  class="form-control forminputs typeahead" id="BusinessAddress" name="BusinessAddress" placeholder="Enter Business Address" ><?php if($bodycontent['MODE']=='EDIT'){echo $bodycontent['VendorData']->BusinessAddress ;}?></textarea>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>                          
                            <div class="row">

                                <div class="col-md-4">
                                    <label for="PanNo">PAN *</label>
                                    <div class="input-group input-group-sm">  
                                        <input value="<?php if($bodycontent['MODE']=='EDIT'){echo $bodycontent['VendorData']->PanNo ;}?>" type="text" class="form-control forminputs typeahead" id="PanNo" name="PanNo" placeholder="Enter PAN No." autocomplete="off" >
                                    </div>
                                </div>                              
                                <div class="col-md-4">
                                    <label for="GstNo">GST *</label>
                                    <div class="input-group input-group-sm">  
                                        <input value="<?php if($bodycontent['MODE']=='EDIT'){echo $bodycontent['VendorData']->GstNo ;}?>" type="text" class="form-control forminputs typeahead" id="GstNo" name="GstNo" placeholder="Enter GST No." autocomplete="off" >
                                    </div>
                                </div>                              
                                <div class="col-md-4">
                                    <label for="IsActive">Is Active ? *</label>
                                    <div class="input-group input-group-sm">  
                                        <select class="form-control select-smll selectpicker" data-show-subtext="true" name="IsActive" id="IsActive" data-live-search="true"  >
                                            <option <?php if($bodycontent['MODE']=='EDIT' && $bodycontent['VendorData']->IsActive=='Y'){echo ' selected ';}?> value="Y">Yes</option>
                                            <option <?php if($bodycontent['MODE']=='EDIT' && $bodycontent['VendorData']->IsActive=='N'){echo ' selected ';}?> value="N">No</option>
                                                                              
                                        </select>
                                    </div>
                                </div>                            

                            </div>                           
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn frm-btn btn-sm btn-block btn-outline-primary">Save</button>
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