<script src="<?php echo ASSETS_PATH;?>js/admin_media.js"></script>



<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Media</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Media</a></li>
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
                        <h3 class="card-title">Add Product Media</h3>
                        <div class="btn-group btn-group-sm float-right" role="group" aria-label="MoreActionButtons" >
                            <a href="<?php echo ADMIN_BASE_PATH; ?>productmedia" class="btn btn-info btnpos link_tab">
                            <i class="fas fa-clipboard-list"></i> List </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form enctype="multipart/form-data" onsubmit="return ValidateForm();" action="<?php if($bodycontent['MODE']=='ADD'){echo ADMIN_BASE_PATH.'productmedia/store' ;}else{echo ADMIN_BASE_PATH.'brand/update';}?>" id="CreateBrand" method="post">
                            <div class="row" id="apppendInput">
                                <input type='hidden' value="<?php echo $bodycontent['ProductMediaId'];?>" name="ProductMediaId">

                                
                                <div class="col-md-12">
                                    <label for="ProductId">Product *</label>
                                    <div class="input-group input-group-sm">  
                                        <select class="form-control select-smll selectpicker" data-show-subtext="true" name="ProductId" id="ProductId" data-live-search="true"  >
                                            <option value="0">Select</option>
                                            
                                            <?php foreach($bodycontent['ProductList'] as $product){ ?>                                                
                                                <option data-subtext="(<?php echo $product->ProductCode; ?>)"  value="<?php echo $product->ProductId; ?>"><?php echo $product->ProductName; ?></option>
                                            <?php } ?>
                                                                              
                                        </select>
                                    </div>
                                </div>                            

                                
                                
                            </div> 
                            <div class="row">

                                <div class="col-md-12">
                                    <label for="MediaType">Media Type *</label>
                                    <div class="input-group input-group-sm">  
                                        <select class="form-control select-smll selectpicker" data-show-subtext="true" name="MediaType" id="MediaType" data-live-search="true"  >
                                            <option value="IMG">Image</option>
                                            <option value="VIDEO">Video</option>
                                            <!-- <option value="URL">Url</option> -->
                                                                              
                                        </select>
                                    </div>
                                </div>                            

                            </div>                          
                            <div class="row">

                                <div class="col-md-12 img typ-url" style="display:none;">
                                    <label for="Url">Url *</label>
                                    <div class="form-group">
                                        <div class="input-group input-group-sm">
                                            <input  type="text" class="form-control forminputs typeahead" id="Url" name="Url" placeholder="Enter Url" autocomplete="off" >
                                        </div>
                                    </div>
                                </div> 

                                <div class="col-md-12 file typ-file" >
                                    <label id="lbl1" for="Media">Image *</label>
                                    <div class="input-group input-group-sm">
                                        <div class="custom-file">
                                            <input accept="image/*" type="file"  multiple class="custom-file-input" id="Media" name="Media[]">
                                            <label id="lbl2" class="custom-file-label custom-file-label-sm" for="Media">Choose file (allowed file type 'jpeg,jpg,png')</label>
                                        </div>
                                    </div>
                                </div>                    

                            </div>                          
                            <div class="row">

                                <div class="col-md-12 img " >
                                    <label for="SerialNo">Appearance Serial No. </label>
                                    <div class="form-group">
                                        <div class="input-group input-group-sm">
                                            <input  type="text" class="form-control forminputs typeahead" id="SerialNo" name="SerialNo" placeholder="Enter Serial No" autocomplete="off" >
                                        </div>
                                    </div>
                                </div>               

                            </div>                          
                            <div class="row">

                                <div class="col-md-12">
                                    <label for="IsActive">Is Active ? *</label>
                                    <div class="input-group input-group-sm">  
                                        <select class="form-control select-smll selectpicker" data-show-subtext="true" name="IsActive" id="IsActive" data-live-search="true"  >
                                            <option value="Y">Yes</option>
                                            <option value="N">No</option>
                                                                              
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