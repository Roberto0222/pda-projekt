<div class="container">

		<div class="row">
			<div class="col"></div>
			<div class="col">
				<div class="panel panel-default">
					<div class="panel-heading">Detail záznamu <a href="<?php echo site_url('taxikari/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
					<div class="panel-body">
						<div class="form-group">
							<p>ID: <?php echo !empty($employees['id'])?$employees['id']:''; ?></p>
						</div>
						<div class="form-group">
							<p>Meno: <?php echo !empty($employees['firstName'])?$employees['firstName']:''; ?></p>
						</div>
						<div class="form-group">
							<p>Priezvisko: <?php echo !empty($employees['lastName'])?$employees['lastName']:''; ?></p>
						</div>
						<div class="form-group">
							<p>Tel. číslo: <?php echo !empty($employees['telNumber'])?$employees['telNumber']:''; ?></p>
						</div>
						<div class="form-group">
							<p>Firma: <?php echo !empty($employees['name'])?$employees['name']:''; ?></p>
						</div>
						<div class="form-group">
							<p>Sídlo firmy: <?php echo !empty($employees['hq'])?$employees['hq']:''; ?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="col"></div>
		</div>
</div>
