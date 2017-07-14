<?php
	// echo "<pre>";
	// var_dump($computed_result);
	// echo "</pre>";

	// echo "<pre>";
	// var_dump($user);
	// echo "</pre>";
?>
<section class="content" >
	<div class="row">
		<div class="col-md-12" >
			<div class="box">
            <div class="box-header">
              <h3 class="box-title">Buyer Created Tax Invoice</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tbody><tr>
                  <th>date</th>
                  <th>description</th>
                  <th>debit</th>
                  <th>credit</th>
                  <th>Gst</th>
                  <th></th>
                </tr>
               	<?php foreach ($computed_result['bcti']['item'] as $index => $entry) { ?>
               	<tr>
               		<td><?= $entry[0] ?></td>
               		<td><?= $entry[1] ?></td>
               		<td>$<?= number_format($entry[2],2) ?></td>
               		<td>$<?= number_format($entry[3],2) ?></td>
               		<td></td>
               		<td></td>
               	</tr>
               	<?php } ?>
               	<tr>
               		<td></td>
               		<td></td>
               		<td>$<?= number_format($computed_result['bcti']['bcti_debit'], 2); ?></td>
               		<td>$<?= number_format($computed_result['bcti']['bcti_credit'], 2); ?></td>
               		<td>$<?= number_format($computed_result['bcti']['bcti_gst'], 2); ?></td>
               		<td></td>
               	</tr>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12" >
			<div class="box">
            <div class="box-header">
              <h3 class="box-title">Buyer Created Adjustment Note</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tbody><tr>
                  <th>date</th>
                  <th>description</th>
                  <th>debit</th>
                  <th>credit</th>
                  <th>Gst</th>
                  <th></th>
                </tr>
               	<?php foreach ($computed_result['bcan']['item'] as $index => $entry) { ?>
               	<tr>
               		<td><?= $entry[0] ?></td>
               		<td><?= $entry[1] ?></td>
               		<td>$<?= number_format($entry[2],2) ?></td>
               		<td>$<?= number_format($entry[3],2) ?></td>
               		<td></td>
               		<td></td>
               	</tr>
               	<?php } ?>
               	<tr>
               		<td></td>
               		<td></td>
               		<td>$<?= number_format($computed_result['bcan']['bcan_debit'], 2); ?></td>
               		<td>$<?= number_format($computed_result['bcan']['bcan_credit'], 2); ?></td>
               		<td>$<?= number_format($computed_result['bcan']['bcan_gst'], 2); ?></td>
               		<td></td>
               	</tr>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12" >
			<div class="box">
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tbody>
               	<tr>
	               	<td style="width: 481px;"></td>
					<td style="width: 131px;">Totals</td>
					<td style="width: 164px;">$<?= number_format(($computed_result['bcti']['bcti_debit'] + $computed_result['bcan']['bcan_debit']),2); ?></td>
					<td style="width: 75px;">$<?= number_format(($computed_result['bcti']['bcti_credit'] + $computed_result['bcan']['bcan_credit']),2); ?></td>
					<td>Nett</td>
					<td>$<?= number_format($computed_result['total_nett'],2); ?></td>
               	</tr>
               	<tr>
               		<td></td>
               		<td></td>
               		<td></td>
               		<td></td>
               		<td>Gst</td>
               		<td>$<?= number_format($computed_result['total_gst'],2) ?></td>
               	</tr>
               	<tr>
               		<td></td>
               		<td></td>
               		<td></td>
               		<td></td>
               		<td>Agency Movement In Payment Details 10.00%</td>
               		<td>$<?= number_format($computed_result['agency_movement'],2) ?></td>
               	</tr>
               	<tr>
               		<td></td>
               		<td></td>
               		<td></td>
               		<td></td>
               		<td>Withholding Tax</td>
               		<td>$<?= number_format($computed_result['total_wt'],2) ?></td>
               	</tr>
               	<tr>
               		<td></td>
               		<td></td>
               		<td></td>
               		<td></td>
               		<td>Payment Amount</td>
               		<td>$<?= number_format($computed_result['total'],2) ?></td>
               	</tr>

              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
		</div>
	</div>
</section>