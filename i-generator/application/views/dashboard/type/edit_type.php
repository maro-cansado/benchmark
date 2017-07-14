<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit Adviser Type
    <small>this is the panel for adding,editing and delete Adviser Type.</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= base_url(); ?>index.php/dashboard/adviser_type">Adviser Type</a></li>
    <li><a href="<?= base_url(); ?>index.php/dashboard/edit_adviser_type/<?= $this->algosecure->encrypt($type[0]['id']); ?>">Edit</a></li>
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
          $edit_adviser_type_success = $this->session->flashdata('edit_adviser_type');
          if(isset($edit_adviser_type_success)){
              if($edit_adviser_type_success['status']){ ?>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Success!</h4>
                  type named <b><?= $edit_adviser_type_success['type'] ?></b> successfuly Updated.
                </div>
              <?php } ?>
          <?php } ?>
      
      <div class="box box-default">
          <form method="POST" action="<?= base_url(); ?>index.php/type/edit_adviser_type" >
          <input type="hidden" name="edit-type-id" id="edit-type-id" value="<?= $this->algosecure->encrypt($type[0]['id']); ?>" >
          <div class="box-header with-border">
            <h3 class="box-title">User Type Data</h3>

          </div>
          <!-- /.box-header -->

          <div class="box-body">
            
              <div class="row">
                <div class="col-md-4">
                 <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input class="form-control" placeholder="First Name" type="text" id="edit-type-name" name="edit-type-name" value="<?= $type[0]['name'] ?>" required>
                  </div>
                </div>
                
              </div>
              <div class="row">
                <div class="" >
                </div>
              </div>
              <div class="row" >
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="edit-type-description" id="edit-type-description"><?= $type[0]['description'] ?></textarea>
                    
                  </div>
                </div>
              </div>

              <div class="row" >
                <div class="col-md-4">
                    <div class="form-group">
                      <label>Total Commission</label>
                      <input class="form-control" placeholder="Total Commission" type="number" id="edit-type-total-commission" name="edit-type-total-commission" value="<?= $type[0]['total_commission'] ?>" >
              
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="form-group">
                      <label>Adviser Total</label>
                      <input class="form-control" placeholder="Adviser Total" type="number" id="edit-type-adviser-total" name="edit-type-adviser-total" value="<?= $type[0]['adviser_total'] ?>" >
              
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="form-group">
                      <label>Bonuses</label>
                      <input class="form-control" placeholder="Bonuses" type="number" id="edit-type-bonuses" name="edit-type-bonuses" value="<?= $type[0]['bonuses'] ?>" >
              
                    </div>
                </div>

              </div>

              <div class="row" >
                
                <div class="col-md-4">
                    <div class="form-group">
                      <label>Cancellation</label>
                      <input class="form-control" placeholder="Cancellation" type="number" id="edit-type-cancellation" name="edit-type-cancellation" value="<?= $type[0]['cancellation'] ?>" >
              
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                      <label>Material and Software</label>
                      <input class="form-control" placeholder="Material and Software" type="number" id="edit-type-material-and-software" name="edit-type-material-and-software" value="<?= $type[0]['material_and_software'] ?>" >
              
                    </div>
                </div>

              </div>

              <div class="row" >
                 <div class="col-md-4">
                    <div class="form-group">
                      <label>Gst</label>
                      <select class="form-control" id="edit-type-gst" name="edit-type-gst">
                          <option value="no" <?= !$type[0]['gst']? 'selected':'' ?> >No</option>
                          <option value="yes" <?= $type[0]['gst']? 'selected':'' ?> >Yes</option>
                      </select>
              
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="form-group">
                      <label>Company</label>
                      <select class="form-control" id="edit-type-company" name="edit-type-company">
                          <option value="no" <?= !$type[0]['company']? 'selected':'' ?> >No</option>
                          <option value="yes" <?= $type[0]['company']? 'selected':'' ?> >Yes</option>
                      </select>
              
                    </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <button class="btn btn-primary" type="submit" >Update</button>
                </div>
              </div>
                
          </div>
       
           </form>  
        </div>
      </div>
  </div>

</section>
<!-- /.content -->