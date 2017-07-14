<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Adviser Type
    <small>this is the panel for adding,editing and delete Adviser Type.</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= base_url(); ?>index.php/dashboard/adviser_type">Adviser Type</a></li>
    <li><a href="<?= base_url(); ?>index.php/dashboard/add_adviser_type">Add</a></li>
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
          $add_adviser_type_success = $this->session->flashdata('add_adviser_type');
          if(isset($add_adviser_type_success)){
              if($add_adviser_type_success['status']){ ?>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Success!</h4>
                  new type named <b><?= $add_adviser_type_success['type'] ?></b> successfuly created.
                </div>
              <?php } ?>
          <?php } ?>
      
      <div class="box box-default">
          <form method="POST" action="<?= base_url(); ?>index.php/type/add_adviser_type" >
          <div class="box-header with-border">
            <h3 class="box-title">User Type Data</h3>

          </div>
          <!-- /.box-header -->

          <div class="box-body">
            
              <div class="row">
                <div class="col-md-4">
                 <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input class="form-control" placeholder="First Name" type="text" id="add-type-name" name="add-type-name" required>
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
                    <textarea class="form-control" name="add-type-description" id="add-type-description"></textarea>
                    
                  </div>
                </div>
              </div>

              <div class="row" >
                <div class="col-md-4">
                    <div class="form-group">
                      <label>Total Commission</label>
                      <input class="form-control" placeholder="Total Commission" type="number" id="add-type-total-commission" name="add-type-total-commission">
              
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="form-group">
                      <label>Adviser Total</label>
                      <input class="form-control" placeholder="Adviser Total" type="number" id="add-type-adviser-total" name="add-type-adviser-total">
              
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="form-group">
                      <label>Bonuses</label>
                      <input class="form-control" placeholder="Bonuses" type="number" id="add-type-bonuses" name="add-type-bonuses">
              
                    </div>
                </div>

              </div>

              <div class="row" >
                
                <div class="col-md-4">
                    <div class="form-group">
                      <label>Cancellation</label>
                      <input class="form-control" placeholder="Cancellation" type="number" id="add-type-cancellation" name="add-type-cancellation">
              
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                      <label>Material and Software</label>
                      <input class="form-control" placeholder="Material and Software" type="number" id="add-type-material-and-software" name="add-type-material-and-software">
              
                    </div>
                </div>

               

              </div>

              <div class="row" >
                 <div class="col-md-4">
                    <div class="form-group">
                      <label>Gst</label>
                      <select class="form-control" id="add-type-gst" name="add-type-gst">
                          <option value="no" >No</option>
                          <option value="yes" >Yes</option>
                      </select>
              
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="form-group">
                      <label>Company</label>
                      <select class="form-control" id="add-type-company" name="add-type-company">
                          <option value="no" >No</option>
                          <option value="yes" >Yes</option>
                      </select>
              
                    </div>
                </div>
              </div>
              

              <div class="row">
                <div class="col-md-4">
                  <button class="btn btn-primary" type="submit" >Add</button>
                </div>
              </div>
                
          </div>
       
           </form>  
        </div>
      </div>
  </div>

</section>
<!-- /.content -->