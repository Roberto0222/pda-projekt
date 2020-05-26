<div class="container taxikariView">
	<div class="row justify-content-center">
			<div class="panel panel-default detailView">
				<div class="panel-heading">Detail záznamu <a href="<?php echo site_url('sluzby/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
				<div class="panel-body">
					<br/>
					<div class="form-group">
						<p>ID: <?php echo !empty($services['idServices'])?$services['idServices']:''; ?></p>
					</div>
					<div class="form-group">
						<p>Služba: <?php echo !empty($services['name'])?$services['name']:''; ?></p>
					</div>
					<div class="form-group">
						<p>Cena za km: <?php echo !empty($services['pricePerKm'])?$services['pricePerKm']:''; ?> €</p>
					</div>
			</div>
		</div>
</div>
