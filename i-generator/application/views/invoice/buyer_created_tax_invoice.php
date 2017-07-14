<style>
	.container-header{
		width:100%;
		text-align:center;
		height: 500px;
		color:#074B8D;font-weight:400;font-size:15px;
	}
	.font-color-payment-header{
		font-weight: bold;
		font-size: 8px;
	}
</style>

<div class="container-header" ><br/><br/>
	Buyer Created Tax Invoice
</div><br/><br/>
<table width="100%" style="padding:5px;" >
	<tr style="background-color:#E1E1E1;">
		<td width="20%"  ><b>Adviser No: <?= $user[0]['id'] ?></b></td>
		<td width="55%" ><b>Name of Adviser: <?= $user[0]['first_name'] ?> <?= $user[0]['last_name'] ?></b></td>
		<td width="25%" ><b>Period of : <?= date("m/d/Y"); ?></b></td>
	</tr>
</table><br/><br/>
<table>
	<tr>
		<td width="65">
			Produced On:
		</td>
		<td width="220">
			<?= date("m/d/Y", strtotime($user[0]['createdAt'])); ?><br/><br/>
			<?= $user[0]['first_name'] ?> <?= $user[0]['last_name'] ?><br/>
			Advisor Address: <?= $user[0]['street'] ?><br/>
			<?= $user[0]['city'] ?>, <?= $user[0]['country'] ?><br/>
			
		</td>
		<td width="60">
			<!-- Produced By:<br/>
			Combined Insurance A division of ACE Insurance Limited Private Bag COMBINED Remuera Auckland 1541 -->
		</td>
		<td width="77">
			Produced by:<br/>
			Statement Date:<br/>
			Payment Type:<br/>
			Termination Date:<br/>
			IRD:
		</td>
		<td width="80">
		  	JD Life/EliteInsure Ltd<br/>
			<?= date("m/d/Y"); ?><br/>
			"Direct Credit"<br/><br/>
			######<br/>
		</td>
	</tr>
</table>
<table style="">
	<tr>
		<td width="420" ></td>
		<td><br/>
			<span style="color:#FF0000;font-weight:bold;font-size:9px;" >Payment Amount</span>
		</td>
	</tr>
	<tr>
		<td width="415" style="border-bottom:1px solid #D0D0D0;" ></td>
		<td width="95" style="border-bottom:1px solid #D0D0D0;" ><br/>
			<div style="border:2px solid #808080;text-align:center;color:#FF003F;font-size:10px;font-weight:bold;"><br/>$<?= number_format($computed_result['total'],2); ?><br/></div>
		</td>
	</tr>
</table> 
<p style="font-size:10px;" ><b>Buyer Created Tax Invoice</b></p>
<table style="postion:relative;left:-2px;border:1px solid #ddd;">
	<tr style="border:1px solid #ddd;background-color:#E1E1E1;">
		<td>
			<span><br/>
			Date
			</span><br/>
		</td>
		<td>
			<span><br/>
				Description
			</span><br/>
		</td>
		<td>
			<span><br/>
				Debit
			</span><br/>
		</td>
		<td>
			<span><br/>
				Credit
			</span><br/>
		</td>
		<td>
			<span><br/>
				GST
			</span><br/>
		</td>
	</tr>
	<tr style="" >
		<td>
			<span style="font-size:9px;" >
				
			</span>
		</td>
		<td>
			<span style="font-size:9px;" >
				Total Commission
			</span>
		</td>
		<td>
			<span style="font-size:9px;" >
				
			</span>
		</td>
		<td>
			<span style="font-size:9px;" >
				$<?= number_format($computed_result['bcti'],2); ?>
			</span>
		</td>
		<td>
			<span style="font-size:9px;" >
				
			</span>
		</td>
	</tr>

	<tr>
		<td style="border-top:1px sold #ddd;" >
			<span style="font-size:9px;" >
				
			</span>
		</td>
		<td style="border-top:1px sold #ddd;" >
			<span style="font-size:9px;" >
				
			</span>
		</td>
		<td style="border-top:1px sold #ddd;" >
			<span style="font-size:9px;" >
				
			</span>
		</td>
		<td style="border-top:1px sold #ddd;" >
			<span style="font-size:9px;" >
				$<?= number_format($computed_result['bcti'],2); ?>
			</span>
		</td>
		<td style="border-top:1px sold #ddd;" >
			<span style="font-size:9px;" >
				<?= number_format($computed_result['bcti_gst'],2); ?>
			</span>
		</td>
	</tr>
	
</table>

<p style="font-size:10px;" ><b>Buyer Created Tax Invoice</b></p>
<table style="postion:relative;left:-2px;border:1px solid #ddd;">
	<tr style="border:1px solid #ddd;background-color:#E1E1E1;">
		<td width="60" >
			<span><br/>
			Date
			</span><br/>
		</td>
		<td  width="148" >
			<span><br/>
				Description
			</span><br/>
		</td>
		<td>
			<span><br/>
				Debit
			</span><br/>
		</td>
		<td>
			<span><br/>
				Credit
			</span><br/>
		</td>
		<td>
			<span><br/>
				GST
			</span><br/>
		</td>
	</tr>
	<tr style="" >
		<td>
			<span style="font-size:9px;" >
				
			</span>
		</td>
		<td>
			<span style="font-size:9px;" >
				Cancellations
			</span>
		</td>
		<td>
			<span style="font-size:9px;" >
				$-<?= number_format($computed_result['cancel'],2); ?>
			</span>
		</td>
		<td>
			<span style="font-size:9px;" >
				
			</span>
		</td>
		<td>
			<span style="font-size:9px;" >
				
			</span>
		</td>
	</tr>
	<tr style="" >
		<td>
			<span style="font-size:9px;" >
				
			</span>
		</td>
		<td>
			<span style="font-size:9px;" >
				Material Fee & Lap Top
			</span>
		</td>
		<td>
			<span style="font-size:9px;" >
				$-<?= number_format($computed_result['material'],2); ?>
			</span>
		</td>
		<td>
			<span style="font-size:9px;" >
				
			</span>
		</td>
		<td>
			<span style="font-size:9px;" >
				
			</span>
		</td>
	</tr>

	<tr>
		<td style="border-top:1px sold #ddd;" >
			<span style="font-size:9px;" >
				
			</span>
		</td>
		<td style="border-top:1px sold #ddd;" >
			<span style="font-size:9px;" >
				
			</span>
		</td>
		<td style="border-top:1px sold #ddd;" >
			<span style="font-size:9px;" >
				$-<?= number_format($computed_result['cancel'] + $computed_result['material'],2); ?>
			</span>
		</td>
		<td style="border-top:1px sold #ddd;" >
			<span style="font-size:9px;" >
				
			</span>
		</td>
		<td style="border-top:1px sold #ddd;" >
			<span style="font-size:9px;" >
				$<?= number_format($computed_result['bcan'],2); ?>
			</span>
		</td>
	</tr>
	
</table>
<p></p>
<table style="padding:3px;" >
	<tr>
		<td>
		</td>
		<td width="50" style="text-align:right;">
			<b>Totals</b>
		</td>
		<td style="text-align:right;">
			<b>$<?= number_format($computed_result['bcan'],2); ?></b>
		</td>
		<td  width="120" style="text-align:right;">
			<b>$<?= number_format($computed_result['bcti'],2); ?></b>
		</td>
		<td  style="text-align:right;">
			<b>Nett</b>
		</td>
		<td style="text-align:right;">
			<b>$<?= number_format($computed_result['nett'],2); ?></b>
		</td>
	</tr>
	<tr>
		<td>
		</td>
		<td>
			
		</td>
		<td>
			
		</td>
		<td>
			
		</td>
		<td  style="text-align:right;">
			<b>GST</b>
		</td>
		<td style="text-align:right;">
			<b>$<?= number_format($computed_result['gst'],2); ?></b>
		</td>
	</tr>
	<tr>
		
		<td colspan="5" style="text-align:right;">
			<b>Agency Movement In Payment Details 10.00%</b>
		</td>
		<td style="text-align:right;">
			<b>$-<?= number_format($computed_result['movement'],2); ?></b>
		</td>
	</tr>
	<tr>
		<td>
		</td>
		<td>
			
		</td>
		<td>
			
		</td>
		<td>
			
		</td>
		<td style="text-align:right;">
			<b>Withholding Tax</b>
		</td>
		<td style="text-align:right;">
			<b>$<?= number_format($computed_result['wt'],2); ?></b>
		</td>
	</tr>
	<tr>
		<td>
		</td>
		<td>
			
		</td>
		<td>
			
		</td>
		<td>
			
		</td>
		<td style="text-align:right;">
			<b>Payment Amount</b>
		</td>
		<td style="text-align:right;border-top:1px solid #eee;border-bottom:1px solid #eee;color:#FF0000;">
			<b>$<?= number_format($computed_result['total'],2); ?></b>
		</td>
	</tr>

</table>
<p style="font-size:10px;" ><b>Agency Account Details</b></p>
<table style="postion:relative;left:-2px;border:1px solid #ddd;">
	<tr style="border:1px solid #ddd;background-color:#E1E1E1;">
		<td  width="138" >
			<span><br/>
				Description
			</span><br/>
		</td>
		<td>
			<span><br/>
				Debit
			</span><br/>
		</td>
		<td>
			<span><br/>
				Credit
			</span><br/>
		</td>
		<td width="120">
			<span><br/>
				Balance
			</span><br/>
		</td>
	</tr>
	<tr style="" >
		
		<td>
			<span style="font-size:9px;" >
				Oppening Balance
			</span>
		</td>
		<td>
			<span style="font-size:9px;" >
				
			</span>
		</td>
		<td>
			<span style="font-size:9px;" >
				
			</span>
		</td>
		<td>
			<span style="font-size:9px;" >
				$5,111.69
			</span>
		</td>
	</tr>
	<tr>
		
		<td style="border-top:1px solid #ddd;" >
			<span style="font-size:9px;" >
				Closing Balance
			</span>
		</td>
		<td style="border-top:1px solid #ddd;" >
			<span style="font-size:9px;" >
				
			</span>
		</td>
		<td style="border-top:1px solid #ddd;" >
			<span style="font-size:9px;" >
				
			</span>
		</td>
		<td style="border-top:1px solid #ddd;" >
			<span style="font-size:9px;" >
				$5,111.69
			</span>
		</td>
	</tr>
	
</table>
<br/><br/><br/><br/>
<br/><br/>
<table style="text-align:center;font-size:6.5px;">
<tr>
	
	<td>
	As an Independant Contractor you are responsible for your own taxation arrangements. Combined Insurance recommends that you keep this statement in <br/>
	a safe place with your business records to assist you with the completion of your GST, Tax Returns and other business related requirements. A fee will  <br/>
	apply for the reprinting and distribution of duplicated statements.<br/>
	</td>
	
</tr>
<tr>
	<td style="color:#074B8D;">
		Combined Insurance is a division of Elite Insurance Limited
	</td>
</tr>
<tr>
	<td style="color:#074B8D;">
		Street Address 105 Great South Road Epsom Auckland 1051 Postal Address Private Bag COMBINED Remuera Auckland 1541
	</td>
</tr>
<tr>
	<td style="color:#074B8D;font-weight:bold;">
		Phone 0800 COMBINED  Fax 0 9 520 9009  Email nz.service@nz.combined.com  Website www.combinedinsurance.co.nz
		Street Address 105 Great South Road Epsom Auckland 1051  Postal Address Private Bag COMBINED Remuera Auckland 1541
		Phone 0800 C
		266246
	</td>
</tr>
</table>
<br/><br/><br/><br/>
<br/><br/>
<table style="padding-bottom;">
	<tr>
		<td>
			Adviser:  (FSP #)  - <?= $user[0]['first_name'] ?> <?= $user[0]['last_name'] ?>
		</td>
		<td style="text-align:right;" >
			<b>Page 1 | EliteInsure Ltd. | Company No: # | FSP No: #</b>
		</td>

	</tr>
</table>
