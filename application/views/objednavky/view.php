<div class="container taxikariView">
	<div class="row justify-content-center">
		<div class="panel panel-default detailView">
			<div class="panel-heading">Detail záznamu <a href="<?php echo site_url('objednavky/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
			<div class="panel-body">
				<br/>
				<div class="form-group">
					<p>ID: <?php echo !empty($contracts['id'])?$contracts['id']:''; ?></p>
				</div>
				<div class="form-group">
					<p>Dátum a čas: <?php echo !empty($contracts['callDate'])?$contracts['callDate']:''; ?></p>
				</div>
				<div class="form-group">
					<p>Latitude: <?php echo !empty($contracts['latitude'])?$contracts['latitude']:''; ?></p>
				</div>
				<div class="form-group">
					<p>Longitude: <?php echo !empty($contracts['longitude'])?$contracts['longitude']:''; ?></p>
				</div>
				<div class="form-group">
					<p>Odkiaľ: <?php echo !empty($contracts['locationFrom'])?$contracts['locationFrom']:''; ?></p>
				</div>
				<div class="form-group">
					<p>Kam: <?php echo $contracts['locationTo'] . " / " . $contracts['locationTo'];?></p>
				</div>
				<div class="form-group">
					<p>Vzdialenosť: <?php echo !empty($contracts['distanceInKm'])?$contracts['distanceInKm']:''; ?></p>
				</div>
				<div class="form-group">
					<p>Spotrebované palivo: <?php echo !empty($contracts['fuelUsed'])?$contracts['fuelUsed']:''; ?> liter</p>
				</div>
			</div>
		</div>
	</div>
</div>
