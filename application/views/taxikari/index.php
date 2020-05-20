<div class="container">
	<?php if(!empty($success_msg)){ ?>
		<div class="col-xs-12">
			<div class="alert alert-success"><?php echo $success_msg; ?></div>
		</div>
	<?php }elseif(!empty($error_msg)){ ?>
		<div class="col-xs-12">
			<div class="alert alert-danger"><?php echo $error_msg; ?></div>
		</div>
	<?php } ?>

	<div class="container">
		<div class="row">
			<div class="col">
				<img src="<?php echo site_url(); ?>/../assets/img/logo/indexlogo2.jpg" class="rounded">
				<br/><br/>
				<img src="<?php echo site_url(); ?>/../assets/img/logo/indexlogo1.jpg" class="rounded">
			</div>
			<div class="col-xl">
				<div class="row">
					<br/>
				</div>
				<div class="row">
					<p>
					Jazdíme pre vás NONSTOP
					<b><?php echo $company['name'];?></b> je taxislužba s niekoľkoročnou tradíciou na trhu.<br/><br/>
					Poskytujeme vám spoľahlivú a bezpečnú prepravu za priaznivé ceny.<br/><br/>
					Máme vlastný dispečing ( 0940 550 1100 a 0940 550 220 ), na ktorý sa dovoláte NONSTOP.<br/><br/>
					Okrem prepravy po Nitre a okolí zabezpečujeme aj transfer na letiská ( Bratislava, Schwechat a Praha ).<br/><br/>
					Máme vlastný dispečing <b><?php echo $company['companyPhone']; ?></b><br/><br/>
					Majiťel firmy <b><?php echo $company['ownerFirstName'] . " " . $company['ownerLastName']; ?></b>

					</p>
				</div>
			</div>
			<div class="col-xl">
				<div class="row">

			    </div>
			</div>

			<script>

			</script>
		</div>
	</div>
