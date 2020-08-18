<script src="<?php echo ASSETS_PATH;?>js/admin_SubCategory.js"></script>



<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Sub Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Sub Category</a></li>
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
                        <h3 class="card-title">Create Sub Category</h3>
                        <div class="btn-group btn-group-sm float-right" role="group" aria-label="MoreActionButtons" >
                            <a href="<?php echo ADMIN_BASE_PATH; ?>subcategory" class="btn btn-info btnpos link_tab">
                            <i class="fas fa-clipboard-list"></i> List </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form onsubmit="return ValidateForm();" action="<?php if($bodycontent['MODE']=='ADD'){echo ADMIN_BASE_PATH.'subcategory/store' ;}else{echo ADMIN_BASE_PATH.'subcategory/update';}?>" id="CreateCategory" method="post">
                            <div class="row">
                                <input type='hidden' value="<?php echo $bodycontent['SubCategoryId'];?>" name="CategoriId">
                                <div class="col-md-12">
                                    <label for="Description">Description *</label>
                                    <div class="form-group">
                                        <div class="input-group input-group-sm">
                                            <input value="<?php if($bodycontent['MODE']=='EDIT'){echo $bodycontent['SubCatagoryData']->Description ;}?>" type="text" class="form-control forminputs typeahead" id="Description" name="Description" placeholder="Enter Description" autocomplete="off" >
                                        </div>
                                    </div>
                                </div>
                                
                                </div>
                                <div class="row">

                                <div class="col-md-12">
                                    <label for="AppearanceSerial">Appearance Serial *</label>
                                    <div class="form-group">
                                        <div class="input-group input-group-sm">
                                            <input  value="<?php if($bodycontent['MODE']=='EDIT'){echo $bodycontent['SubCatagoryData']->AppearanceSerial ;}?>" type="text" class="form-control forminputs typeahead" id="AppearanceSerial" name="AppearanceSerial" placeholder="Enter Serial No." autocomplete="off" >
                                        </div>
                                    </div>
                                </div>
                                
                            </div>                          
                            <div class="row">

                                <div class="col-md-12">
                                    <label for="CategoryId">Category *</label>
                                    <div class="input-group input-group-sm">  
                                        <select class="form-control selectpicker select-smll" data-show-subtext="true" name="CategoryId" id="CategoryId" data-live-search="true"  >
                                            <option  value="0">Select</option>
                                            <?php foreach ($bodycontent['CategoryList'] as $Category) { ?>
                                                <option <?php if($bodycontent['MODE']=='EDIT' && $bodycontent['SubCatagoryData']->CategoryId==$Category->CategoryId){echo ' selected ';}?> value="<?php echo $Category->CategoryId ?>"><?php echo $Category->Description ?></option>
                                            <?php } ?>
                                                                              
                                        </select>
                                    </div>
                                </div>                            

                            </div>   
                            <div class="row">

                                <div class="col-md-12">
                                    <label for="IsActive">Is Active ? *</label>
                                    <div class="input-group input-group-sm">  
                                        <select class="form-control select-smll selectpicker" data-show-subtext="true" name="IsActive" id="IsActive" data-live-search="true"  >
                                            <option <?php if($bodycontent['MODE']=='EDIT' && $bodycontent['SubCatagoryData']->IsActive=='Y'){echo ' selected ';}?> value="Y">Yes</option>
                                            <option <?php if($bodycontent['MODE']=='EDIT' && $bodycontent['SubCatagoryData']->IsActive=='N'){echo ' selected ';}?> value="N">No</option>
                                                                              
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