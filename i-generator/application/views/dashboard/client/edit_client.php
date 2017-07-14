<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Client
    <small>this is a users in this system</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= base_url(); ?>index.php/dashboard/client">Client</a></li>
    <li><a href="">Edit</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
 <!--  <div class="callout callout-info">
    <h4>Tip!</h4>

    <p>Add the fixed class to the body tag to get this layout. The fixed layout is your best option if your sidebar
      is bigger than your content because it prevents extra unwanted scrolling.</p>
  </div> -->
  <div class="row">
    <div class="col-xs-12">
        <?php 
          $edit_client_success = $this->session->flashdata('edit_client');
          if(isset($edit_client_success)){
              if($edit_client_success['status']){ ?>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Success!</h4>
                  client named <b><?= $edit_client_success['first'] ?></b> successfuly Edited.
                </div>
              <?php } ?>
          <?php } ?>
       
      <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">client Profile</h3>

          </div>
          <!-- /.box-header -->

          <div class="box-body">
            <form method="POST" action="<?= base_url(); ?>index.php/users/edit_client" >
            	<input type="hidden" name="edit-client-id" id="edit-client-id" value="<?= $user_id ?>"  />
              <div class="row">
                <div class="col-md-4">
                 <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input class="form-control" placeholder="First Name" type="text" id="edit-client-fname" name="edit-client-fname" value="<?= $user[0]['first_name'] ?>" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Middle Name</label>
                    <input class="form-control" placeholder="First Name" type="text" id="edit-client-mname" name="edit-client-mname" value="<?= $user[0]['middle_name'] ?>" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input class="form-control" placeholder="First Name" type="text" id="edit-client-lname" name="edit-client-lname" value="<?= $user[0]['last_name'] ?>" required>
                  </div>
                </div>
              </div>
              <div class="row" >
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Date Of Birth</label>

                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right datepicker" id="edit-client-date" name="edit-client-date" value="<?= date("m/d/Y", strtotime($user[0]['date_of_birth'])); ?>" required>
                    </div>
                    <!-- /.input group -->
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input class="form-control" placeholder="Email" type="email" id="edit-client-email" name="edit-client-email" value="<?= $user[0]['email'] ?>" required>
                  </div>
                </div>
                
              </div>
              <div class="row">
                <div class="col-md-4">
                  <button class="btn btn-primary" type="submit" >Update</button>
                </div>
              </div>
            </form>            
          </div>
          <!-- /.box-body -->
          
        </div>
      </div>
  </div>

</section>
<!-- /.content -->