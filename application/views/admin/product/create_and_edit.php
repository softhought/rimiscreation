<script src="<?php echo ASSETS_PATH;?>js/admin_product.js"></script>



<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Product</a></li>
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
                <div  style="width: 58% !important;" class="card FrmBlock-sm">
                    <div class="card-header">
                        <h3 class="card-title">Create Product</h3>
                        <div class="btn-group btn-group-sm float-right" role="group" aria-label="MoreActionButtons" >
                            <a href="<?php echo ADMIN_BASE_PATH; ?>product" class="btn btn-info btnpos link_tab">
                            <i class="fas fa-clipboard-list"></i> List </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    
                        <form onsubmit="return ValidateForm();" action="<?php if($bodycontent['MODE']=='ADD'){echo ADMIN_BASE_PATH.'product/store' ;}else{echo ADMIN_BASE_PATH.'product/update';}?>" id="CreateProduct" method="post">
                            <div class="row">
                                <input type='hidden' value="<?php echo $bodycontent['ProductId'];?>" name="ProductId"> 

                                <div class="col-md-6">
                                    <label for="ProductName">Name *</label>
                                    <div class="form-group">
                                        <div class="input-group input-group-sm">
                                            <input value="<?php if($bodycontent['MODE']=='EDIT'){echo $bodycontent['ProductData']->ProductName ;}?>" type="text" class="form-control forminputs typeahead" id="ProductName" name="ProductName" placeholder="Enter Product Name" autocomplete="off" >
                                        </div>
                                    </div>
                                </div>                                

                                <div class="col-md-3">
                                    <label for="ProductCode">Style No. </label>
                                    <div class="form-group">
                                        <div class="input-group input-group-sm">
                                            <input value="<?php if($bodycontent['MODE']=='EDIT'){echo $bodycontent['ProductData']->ProductCode ;}?>" type="text" class="form-control forminputs typeahead" id="ProductCode" name="ProductCode" placeholder="Enter Code" autocomplete="off" >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label for="Price">Price *</label>
                                    <div class="form-group">
                                        <div class="input-group input-group-sm">
                                            <input value="<?php if($bodycontent['MODE']=='EDIT'){echo $bodycontent['ProductData']->Price ;}?>" type="text" class="form-control forminputs typeahead" id="Price" name="Price" placeholder="Enter Price" autocomplete="off" >
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                               

                                <div class="col-md-6">
                                    <label for="Color">Color </label>
                                    <div class="form-group">
                                        <div class="input-group input-group-sm">
                                            <input value="<?php if($bodycontent['MODE']=='EDIT'){echo $bodycontent['ProductData']->Color ;}?>" type="text" class="form-control forminputs typeahead" id="Color" name="Color" placeholder="Enter Color Name" autocomplete="off" >
                                        </div>
                                    </div>
                                </div>                                

                                <div class="col-md-6">
                                    <label for="Size">Size </label>
                                    <div class="form-group">
                                        <div class="input-group input-group-sm">
                                            <input value="<?php if($bodycontent['MODE']=='EDIT'){echo htmlentities($bodycontent['ProductData']->Size) ;}?>" type="text" class="form-control forminputs typeahead" id="Size" name="Size" placeholder="Enter Size" autocomplete="off" >
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">                                
                                
                                <div class="col-md-6">
                                    <label for="CategoryId">Category *</label>
                                    <div class="input-group input-group-sm">  
                                        <select class="form-control selectpicker select-smll" data-show-subtext="true" name="CategoryId" id="CategoryId" data-live-search="true"  >
                                            <option  value="0">Select</option>
                                            <?php foreach ($bodycontent['CategoryList'] as $Category) { ?>
                                                <option data-text="<?php echo $Category->HavingSubCategory ?>" <?php if($bodycontent['MODE']=='EDIT' && $bodycontent['ProductData']->CategoryId==$Category->CategoryId){echo ' selected ';}?> value="<?php echo $Category->CategoryId ?>"><?php echo $Category->Description ?></option>
                                            <?php } ?>
                                                                              
                                        </select>
                                    </div>
                                </div> 

                                <div class="col-md-6"  style="<?php if($bodycontent['MODE']=='EDIT' && $bodycontent['ProductData']->HavingSubCategory=='Y'){echo 'display: block;';}else{ echo 'display: none;';}?>" id="SubCategoryIdDisplay">
                                    <label for="SubCategoryId">Sub Category *</label>
                                    <div class="input-group input-group-sm">  
                                        <select class="form-control selectpicker select-smll" data-show-subtext="true" name="SubCategoryId" id="SubCategoryId" data-live-search="true"  >
                                            <option  value="0">Select</option>
                                            <?php foreach ($bodycontent['SubCategoryList'] as $SubCategory) { ?>
                                                <option <?php if($bodycontent['MODE']=='EDIT' && $bodycontent['ProductData']->SubCategoryId==$SubCategory->SubCategoryId){echo ' selected ';}?> value="<?php echo $SubCategory->SubCategoryId ?>"><?php echo $SubCategory->Description ?></option>
                                            <?php } ?>
                                                                              
                                        </select>
                                    </div>
                                </div> 
                                
                            </div>                          
                            <div class="row">

                                <div class="col-md-6">
                                    <label for="VendorId">Vendor *</label>
                                    <div class="input-group input-group-sm">  
                                        <select class="form-control selectpicker select-smll" data-show-subtext="true" name="VendorId" id="VendorId" data-live-search="true"  >
                                            <option  value="0">Select</option>
                                            <?php foreach ($bodycontent['VendorList'] as $Vendor) { ?>
                                                <option <?php if($bodycontent['MODE']=='EDIT' && $bodycontent['ProductData']->VendorId==$Vendor->VendorId){echo ' selected ';}?> value="<?php echo $Vendor->VendorId ?>"><?php echo $Vendor->Name ?></option>
                                            <?php } ?>
                                                                              
                                        </select>
                                    </div>
                                </div>          

                                <div class="col-md-6">
                                    <label for="BrandId">Brand *</label>
                                    <div class="input-group input-group-sm">  
                                        <select class="form-control selectpicker select-smll" data-show-subtext="true" name="BrandId" id="BrandId" data-live-search="true"  >
                                            <option  value="0">Select</option>
                                            <?php foreach ($bodycontent['BrandList'] as $Brand) { ?>
                                                <option <?php if($bodycontent['MODE']=='EDIT' && $bodycontent['ProductData']->BrandId==$Brand->BrandId){echo ' selected ';}?> value="<?php echo $Brand->BrandId ?>"><?php echo $Brand->Name ?></option>
                                            <?php } ?>
                                                                              
                                        </select>
                                    </div>
                                </div>                            

                            </div>   
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="Price">Description *</label>
                                    <div class="form-group">
                                        <div class="input-group input-group-sm">
                                            <textarea class="form-control textarea-editor-simple forminputs typeahead" id="Description" name="Description" placeholder="Enter Product Description"><?php if($bodycontent['MODE']=='EDIT'){echo $bodycontent['ProductData']->Description ;}?></textarea>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <label for="InStock">In Stock ? *</label>
                                    <div class="input-group input-group-sm">  
                                        <select class="form-control select-smll selectpicker" data-show-subtext="true" name="InStock" id="InStock" data-live-search="true"  >
                                            <option <?php if($bodycontent['MODE']=='EDIT' && $bodycontent['ProductData']->InStock=='Y'){echo ' selected ';}?> value="Y">Yes</option>
                                            <option <?php if($bodycontent['MODE']=='EDIT' && $bodycontent['ProductData']->InStock=='N'){echo ' selected ';}?> value="N">No</option>
                                                                              
                                        </select>
                                    </div>
                                </div>         

                                <div class="col-md-6">
                                    <label for="IsActive">Is Asctive ? *</label>
                                    <div class="input-group input-group-sm">  
                                        <select class="form-control select-smll selectpicker" data-show-subtext="true" name="IsActive" id="IsActive" data-live-search="true"  >
                                            <option <?php if($bodycontent['MODE']=='EDIT' && $bodycontent['ProductData']->IsActive=='Y'){echo ' selected ';}?> value="Y">Yes</option>
                                            <option <?php if($bodycontent['MODE']=='EDIT' && $bodycontent['ProductData']->IsActive=='N'){echo ' selected ';}?> value="N">No</option>
                                                                              
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