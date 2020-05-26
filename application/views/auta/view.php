<div class="container taxikariView">
	<div class="row justify-content-center">
		<div class="panel panel-default detailView">
			<div class="panel-heading">Detail záznamu <a href="<?php echo site_url('auta/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
			<div class="panel-body">
				<br/>
				<div class="form-group">
					<p>ID: <?php echo !empty($cars['id'])?$cars['id']:''; ?></p>
				</div>
				<div class="form-group">
					<p>Značka: <?php echo !empty($cars['Brand'])?$cars['Brand']:''; ?></p>
				</div>
				<div class="form-group">
					<p>Model: <?php echo !empty($cars['Model'])?$cars['Model']:''; ?></p>
				</div>
				<div class="form-group">
					<p>Rok výroby: <?php echo !empty($cars['ManYear'])?$cars['ManYear']:''; ?></p>
				</div>
				<div class="form-group">
					<p>Stav km: <?php echo !empty($cars['Odometer'])?$cars['Odometer']:''; ?></p>
				</div>
				<div class="form-group">
					<p>Stav paliva: <?php echo $cars['FuelQty'] . " / " . $cars['MaxFuel'] . " liter";?></p>
				</div>
				<div class="form-group">
					<p>Spotreba na 100 km: <?php echo !empty($cars['FuelPer100KM'])?$cars['FuelPer100KM']:''; ?></p>
				</div>
				<div class="form-group">
					<p>EČV: <?php echo !empty($cars['LicensePlate'])?$cars['LicensePlate']:''; ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
