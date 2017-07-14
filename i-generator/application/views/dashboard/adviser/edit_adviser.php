<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Adviser
    <small>this is a users in this system</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= base_url(); ?>index.php/dashboard/adviser">Adviser</a></li>
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
          $edit_adviser_success = $this->session->flashdata('edit_adviser');
          if(isset($edit_adviser_success)){
              if($edit_adviser_success['status']){ ?>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Success!</h4>
                  adviser named <b><?= $edit_adviser_success['first'] ?></b> successfuly Edited.
                </div>
              <?php } ?>
          <?php } ?>
       
      <div class="box box-default">
          <form method="POST" action="<?= base_url(); ?>index.php/users/edit_adviser" >
            <input type="hidden" value="<?= $user_id; ?>" id="edit-adviser-id" name="edit-adviser-id" />
          <div class="box-header with-border">
            <h3 class="box-title">adviser Profile</h3>

          </div>
          <!-- /.box-header -->

          <div class="box-body">
            
              <div class="row">
                <div class="col-md-4">
                 <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input class="form-control" placeholder="First Name" type="text" id="edit-adviser-fname" name="edit-adviser-fname" value="<?= $user[0]['first_name'] ?>" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Middle Name</label>
                    <input class="form-control" placeholder="Middle Name" type="text" id="edit-adviser-mname" name="edit-adviser-mname" value="<?= $user[0]['middle_name'] ?>" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input class="form-control" placeholder="Last Name" type="text" id="edit-adviser-lname" name="edit-adviser-lname" value="<?= $user[0]['last_name'] ?>" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                 <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input class="form-control" placeholder="Street" type="text" id="edit-adviser-street" name="edit-adviser-street" value="<?= $user[0]['street'] ?>" >
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">&nbsp;</label>
                    <input class="form-control" placeholder="City" type="text" id="edit-adviser-city" name="edit-adviser-city" value="<?= $user[0]['city'] ?>" >
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">&nbsp;</label>
                    <input class="form-control" placeholder="Country" type="text" id="edit-adviser-country" name="edit-adviser-country" value="<?= $user[0]['country'] ?>" >
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
                      <input type="text" class="form-control pull-right datepicker" id="edit-adviser-date" name="edit-adviser-date" value="<?= date("m/d/Y", strtotime($user[0]['date_of_birth'])); ?>" >
                    </div>
                    <!-- /.input group -->
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input class="form-control" placeholder="Email" type="email" id="edit-adviser-email" name="edit-adviser-email" value="<?= $user[0]['email'] ?>" >
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Number</label>
                    <input class="form-control" placeholder="Number" type="number" id="edit-adviser-number" name="edit-adviser-number" value="<?= $user[0]['number'] ?>" >
                  </div>
                </div>
                
              </div>

              <div class="row">
                <div class="col-md-4">
                  <button class="btn btn-primary" type="submit" >Update</button>
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
                    <input class="form-control" placeholder="Number" type="text" id="edit-adviser-number" name="edit-adviser-number" value="<?= $user_settings[0]['number'] ?>" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Bonuses</label>
                    <input class="form-control" placeholder="Bonuses" type="text" id="edit-adviser-bonus" name="edit-adviser-bonus" value="<?= $user_settings[0]['bonus'] ?>" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Company</label>
                    <select id="edit-adviser-company" name="edit-adviser-company" class="form-control" >
                      <option value="0" <?= !$user_settings[0]['company']? 'selected':''; ?> >No</option>
                      <option value="1" <?= $user_settings[0]['company']? 'selected':''; ?> >Yes</option>
                    </select>
                  </div>
                </div>
            </div>
            <div class="row" >
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Adviser Percentage</label>
                    <input class="form-control" placeholder="Adviser Percentage" type="text" id="edit-adviser-percentage" name="edit-adviser-percentage" value="<?= $user_settings[0]['adviser_percentage'] ?>" required>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Rate Of Commission</label>
                    <select id="edit-adviser-commission" name="edit-adviser-commission" class="form-control" >
                      <?php for ($i=1; $i <= 100 ; $i++) { ?>
                        <option value="<?= $i ?>" <?= $user_settings[0]['rate_of_commission']==$i? 'selected':''; ?> ><?= $i ?>%</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Material Fee</label>
                    <select id="edit-adviser-material-fee" name="edit-adviser-material-fee" class="form-control" >
                      <option value="0" <?= !$user_settings[0]['material_fee']? 'selected':''; ?> >No</option>
                      <option value="1" <?= $user_settings[0]['material_fee']? 'selected':''; ?> >Yes</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Material Fee Amount</label>
                    <input class="form-control" placeholder="Amount" type="text" id="edit-adviser-material-fee-amount" <?= $user_settings[0]['material_fee']? '':'disabled'; ?> <?= $user_settings[0]['material_fee']? 'required':''; ?> name="edit-adviser-material-fee-amount" value="<?= $user_settings[0]['material_fee']? $user_settings[0]['material_fee_amount']:''; ?>" >
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>GST</label>
                    <select id="edit-adviser-gst" name="edit-adviser-gst" class="form-control" >
                      <option value="0" <?= !$user_settings[0]['gst']? 'selected':''; ?> >No</option>
                      <option value="1" <?= $user_settings[0]['gst']? 'selected':''; ?> >Yes</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">GST Age Percent</label>
                    <input class="form-control" placeholder="Amount" type="text" id="edit-adviser-gst-age" <?= $user_settings[0]['gst']? '':'disabled'; ?> <?= $user_settings[0]['gst']? 'required':''; ?> name="edit-adviser-gst-age" value="<?= $user_settings[0]['gst']? $user_settings[0]['gst_age_percent']:''; ?>" >
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <button class="btn btn-primary" type="submit" >Update</button>
              </div>
            </div>
          </div> -->
          </form>
          
        </div>
      </div>
  </div>

</section>
<!-- /.content -->