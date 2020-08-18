<script src="<?php echo ASSETS_PATH;?>js/admin_Category.js"></script>



<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Category</a></li>
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
                        <h3 class="card-title">Create Category</h3>
                        <div class="btn-group btn-group-sm float-right" role="group" aria-label="MoreActionButtons" >
                            <a href="<?php echo ADMIN_BASE_PATH; ?>category" class="btn btn-info btnpos link_tab">
                            <i class="fas fa-clipboard-list"></i> List </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form onsubmit="return ValidateForm();" action="<?php if($bodycontent['MODE']=='ADD'){echo ADMIN_BASE_PATH.'category/store' ;}else{echo ADMIN_BASE_PATH.'category/update';}?>" id="CreateCategory" method="post">
                            <div class="row">
                                <input type='hidden' value="<?php echo $bodycontent['CategoryId'];?>" name="CategoryId">
                                <div class="col-md-12">
                                    <label for="Description">Category Description *</label>
                                    <div class="form-group">
                                        <div class="input-group input-group-sm">
                                            <input value="<?php if($bodycontent['MODE']=='EDIT'){echo $bodycontent['CatagoryData']->Description ;}?>" type="text" class="form-control forminputs typeahead" id="Description" name="Description" placeholder="Enter Description" autocomplete="off" >
                                        </div>
                                    </div>
                                </div>
                                
                                </div>
                                <div class="row">

                                <div class="col-md-12">
                                    <label for="AppearanceSerial">Appearance Serial *</label>
                                    <div class="form-group">
                                        <div class="input-group input-group-sm">
                                            <input  value="<?php if($bodycontent['MODE']=='EDIT'){echo $bodycontent['CatagoryData']->AppearanceSerial ;}?>" type="text" class="form-control forminputs typeahead" id="AppearanceSerial" name="AppearanceSerial" placeholder="Enter Serial No." autocomplete="off" >
                                        </div>
                                    </div>
                                </div>
                                
                            </div>                          
                            <div class="row">

                                <div class="col-md-12">
                                    <label for="IsCustomizable">Is Customizable ? *</label>
                                    <div class="input-group input-group-sm">  
                                        <select class="form-control selectpicker select-smll" data-show-subtext="true" name="IsCustomizable" id="IsCustomizable" data-live-search="true"  >
                                            <option <?php if($bodycontent['MODE']=='EDIT' && $bodycontent['CatagoryData']->IsCustomizable=='N'){echo ' selected ';}?> value="N">No</option>
                                            <option <?php if($bodycontent['MODE']=='EDIT' && $bodycontent['CatagoryData']->IsCustomizable=='Y'){echo ' selected ';}?>  value="Y">Yes</option>
                                                                              
                                        </select>
                                    </div>
                                </div>                            

                            </div>   
                            <div class="row">

                                <div class="col-md-12">
                                    <label for="HavingSubCategory">Having Sub Category ? *</label>
                                    <div class="input-group input-group-sm">  
                                        <select class="form-control selectpicker select-smll" data-show-subtext="true" name="HavingSubCategory" id="HavingSubCategory" data-live-search="true"  >
                                            <option <?php if($bodycontent['MODE']=='EDIT' && $bodycontent['CatagoryData']->HavingSubCategory=='N'){echo ' selected ';}?> value="N">No</option>
                                            <option <?php if($bodycontent['MODE']=='EDIT' && $bodycontent['CatagoryData']->HavingSubCategory=='Y'){echo ' selected ';}?>  value="Y">Yes</option>
                                                                              
                                        </select>
                                    </div>
                                </div>                            

                            </div>   
                            <div class="row">

                                <div class="col-md-12">
                                    <label for="IsActive">Is Asctive ? *</label>
                                    <div class="input-group input-group-sm">  
                                        <select class="form-control selectpicker select-smll" data-show-subtext="true" name="IsActive" id="IsActive" data-live-search="true"  >
                                            <option <?php if($bodycontent['MODE']=='EDIT' && $bodycontent['CatagoryData']->IsActive=='Y'){echo ' selected ';}?> value="Y">Yes</option>
                                            <option <?php if($bodycontent['MODE']=='EDIT' && $bodycontent['CatagoryData']->IsActive=='N'){echo ' selected ';}?> value="N">No</option>
                                                                              
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