<script src="<?php echo ASSETS_PATH; ?>js/admin_useraudit.js"></script>

  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User Audit</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">User Management</a></li>
              <li class="breadcrumb-item active">User Audit</li>
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
                <h3 class="card-title">User Activity List</h3>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="example2" class="table table-bordered table-hover dataTable">
              <thead>
                    <tr>
                    <th>User Name</th>
                    <th>Date & Time</th>
                    <th>Action</th>
                    <th>Module(Admin)</th>
                    <th>Module(Dev.)</th>
                    <th>Method(Dev.)</th>
                    <th>Browser</th>
                    <th>Device OS</th>
                    </tr>
                </thead>
                <tbody>                       
                    <?php 
                    // pre($bodycontent['usersAuditList']);
                    foreach ($bodycontent['usersAuditList'] as $value) { ?> 
                        <tr>
                        <td><?php echo $value->user_name; ?></td>
                        <td><?php echo $value->activity_date; ?></td>
                        <td><?php echo $value->action; ?></td>
                        <td><?php echo $value->activity_module_admin; ?></td>
                        <td><?php echo $value->activity_module; ?></td>
                        <td><?php echo $value->from_method; ?></td>
                        <td><?php echo $value->user_browser; ?></td>
                        <td><?php echo $value->user_platform; ?></td>
                       
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

