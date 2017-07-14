<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Client
    <small>this is a users in this system</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= base_url(); ?>index.php/dashboard/client">Client</a></li>
    <li><a href="<?= base_url(); ?>index.php/dashboard/add_client">Add</a></li>
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
          $add_client_success = $this->session->flashdata('add_client');
          if(isset($add_client_success)){
              if($add_client_success['status']){ ?>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Success!</h4>
                  new client named <b><?= $add_client_success['first'] ?></b> successfuly created.
                </div>
              <?php } ?>
          <?php } ?>
       
      <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">client Profile</h3>

          </div>
          <!-- /.box-header -->

          <div class="box-body">
            <form method="POST" action="<?= base_url(); ?>index.php/users/add_client" >
              <div class="row">
                <div class="col-md-4">
                 <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input class="form-control" placeholder="First Name" type="text" id="add-client-fname" name="add-client-fname" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Middle Name</label>
                    <input class="form-control" placeholder="First Name" type="text" id="add-client-mname" name="add-client-mname" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input class="form-control" placeholder="First Name" type="text" id="add-client-lname" name="add-client-lname" required>
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
                      <input type="text" class="form-control pull-right datepicker" id="add-client-date" name="add-client-date" required>
                    </div>
                    <!-- /.input group -->
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input class="form-control" placeholder="Email" type="email" id="add-client-email" name="add-client-email" required>
                  </div>
                </div>
                
              </div>
              <div class="row">
                <div class="col-md-4">
                  <button class="btn btn-primary" type="submit" >Add</button>
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