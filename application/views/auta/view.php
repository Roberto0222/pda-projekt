<div class="container">

		<div class="row">
			<div class="col"></div>
			<div class="col">
				<div class="panel panel-default">
					<div class="panel-heading">Detail záznamu <a href="<?php echo site_url('auta/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
					<div class="panel-body">
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
							<p>Stav paliva: <?php echo !empty($cars['FuelQty'])?$cars['FuelQty']:''; ?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="col"></div>
		</div>
</div>
