<script src="<?php echo ASSETS_PATH;?>js/admin_brand.js"></script>



<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Brand</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Brand</a></li>
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
                        <h3 class="card-title">Create Brand</h3>
                        <div class="btn-group btn-group-sm float-right" role="group" aria-label="MoreActionButtons" >
                            <a href="<?php echo ADMIN_BASE_PATH; ?>brand" class="btn btn-info btnpos link_tab">
                            <i class="fas fa-clipboard-list"></i> List </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form enctype="multipart/form-data" onsubmit="return ValidateForm();" action="<?php if($bodycontent['MODE']=='ADD'){echo ADMIN_BASE_PATH.'brand/store' ;}else{echo ADMIN_BASE_PATH.'brand/update';}?>" id="CreateBrand" method="post">
                            <div class="row" id="apppendInput">
                                <input type='hidden' value="<?php echo $bodycontent['BrandId'];?>" name="BrandId">
                                

                                <?php if ($bodycontent['MODE']=='EDIT') { ?>
                                   <input type="hidden" id="original_chng" name="original_chng" value="N">
                                <?php } ?>
                                


                                <div class="col-md-12">
                                    <label for="Name">Name *</label>
                                    <div class="form-group">
                                        <div class="input-group input-group-sm">
                                            <input value="<?php if($bodycontent['MODE']=='EDIT'){echo $bodycontent['BrandData']->Name ;}?>" type="text" class="form-control forminputs typeahead" id="Name" name="Name" placeholder="Enter Name" autocomplete="off" >
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="row">

                                <div class="col-md-12">
                                    <label for="Logo">Logo *</label>
                                    <div class="input-group input-group-sm">
                                        <div class="custom-file">
                                            <input type="file" data-mode='<?php echo $bodycontent['MODE']; ?>' data-chng='N' class="custom-file-input" id="Logo" name="Logo">
                                            <label class="custom-file-label custom-file-label-sm" for="Logo"><?php if($bodycontent['MODE']=='EDIT'){echo $bodycontent['BrandData']->Logo ;}else{ echo "Choose file (allowed file type 'jpeg,jpg,png')"; }?></label>
                                        </div>
                                    </div>
                                </div>

                            </div> 
                            <div class="row">

                                <div class="col-md-12">
                                    <label for="IsActive">Is Active ? *</label>
                                    <div class="input-group input-group-sm">  
                                        <select class="form-control select-smll selectpicker" data-show-subtext="true" name="IsActive" id="IsActive" data-live-search="true"  >
                                            <option <?php if($bodycontent['MODE']=='EDIT' && $bodycontent['BrandData']->IsActive=='Y'){echo ' selected ';}?> value="Y">Yes</option>
                                            <option <?php if($bodycontent['MODE']=='EDIT' && $bodycontent['BrandData']->IsActive=='N'){echo ' selected ';}?> value="N">No</option>
                                                                              
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