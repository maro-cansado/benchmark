<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Adviser
    <small>this is a users in this system</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= base_url(); ?>index.php/dashboard/adviser">Adviser</a></li>
    <li><a href="<?= base_url(); ?>index.php/dashboard/add_agency">Add</a></li>
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
          $add_adviser_success = $this->session->flashdata('add_adviser');
          if(isset($add_adviser_success)){
              if($add_adviser_success['status']){ ?>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Success!</h4>
                  new adviser named <b><?= $add_adviser_success['first'] ?></b> successfuly created.
                </div>
              <?php } ?>
          <?php } ?>
      
      <div class="box box-default">
          <form method="POST" action="<?= base_url(); ?>index.php/users/add_adviser" >
          <div class="box-header with-border">
            <h3 class="box-title">Adviser Profile</h3>

          </div>
          <!-- /.box-header -->

          <div class="box-body">
            
              <div class="row">
                <div class="col-md-4">
                 <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input class="form-control" placeholder="First Name" type="text" id="add-adviser-fname" name="add-adviser-fname" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Middle Name</label>
                    <input class="form-control" placeholder="Middle Name" type="text" id="add-adviser-mname" name="add-adviser-mname" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input class="form-control" placeholder="Last Name" type="text" id="add-adviser-lname" name="add-adviser-lname" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                 <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input class="form-control" placeholder="Street" type="text" id="add-adviser-street" name="add-adviser-street" >
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">&nbsp;</label>
                    <input class="form-control" placeholder="City" type="text" id="add-adviser-city" name="add-adviser-city" >
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">&nbsp;</label>
                    <input class="form-control" placeholder="Country" type="text" id="add-adviser-country" name="add-adviser-country" >
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
                      <input type="text" class="form-control pull-right datepicker" id="add-adviser-date" name="add-adviser-date" >
                    </div>
                    <!-- /.input group -->
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input class="form-control" placeholder="Email" type="email" id="add-adviser-email" name="add-adviser-email" >
                  </div>
                </div>
                 <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Number</label>
                      <input class="form-control" placeholder="Number" type="number" id="add-adviser-number" name="add-adviser-number" >
                    </div>
                  </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <button class="btn btn-primary" type="submit" >Add</button>
                </div>
              </div>
                
          </div>
          <!-- /.box-body -->
         <!--  <div class="box-header with-border">
            <h3 class="box-title">Adviser Settings</h3>

          </div> -->
          <!-- <div class="box-body">
            <div class="row" >
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Number</label>
                    <input class="form-control" placeholder="Number" type="text" id="add-adviser-number" name="add-adviser-number" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Bonuses</label>
                    <input class="form-control" placeholder="Bonuses" type="text" id="add-adviser-bonus" name="add-adviser-bonus" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Company</label>
                    <select id="add-adviser-company" name="add-adviser-company" class="form-control" >
                      <option value="0" >No</option>
                      <option value="1" >Yes</option>
                    </select>
                  </div>
                </div>
            </div>
            <div class="row" >
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Adviser Percentage</label>
                    <input class="form-control" placeholder="Adviser Percentage" type="text" id="add-adviser-percentage" name="add-adviser-percentage" required>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Rate Of Commission</label>
                    <select id="add-adviser-commission" name="add-adviser-commission" class="form-control" >
                      <?php for ($i=1; $i <= 100 ; $i++) { ?>
                        <option value="<?= $i ?>" ><?= $i ?>%</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Material Fee</label>
                    <select id="add-adviser-material-fee" name="add-adviser-material-fee" class="form-control" >
                      <option value="0" >No</option>
                      <option value="1" >Yes</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Material Fee Amount</label>
                    <input class="form-control" placeholder="Amount" type="text" id="add-adviser-material-fee-amount" disabled="" name="add-adviser-material-fee-amount" >
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>GST</label>
                    <select id="add-adviser-gst" name="add-adviser-gst" class="form-control" >
                      <option value="0" >No</option>
                      <option value="1" >Yes</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">GST Age Percent</label>
                    <input class="form-control" placeholder="Amount" type="text" id="add-adviser-gst-age" disabled="" name="add-adviser-gst-age" >
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <button class="btn btn-primary" type="submit" >Add</button>
              </div>
            </div>
          </div> -->
           </form>  
        </div>
      </div>
  </div>

</section>
<!-- /.content -->