<div class="container taxikariView">
	<div class="row justify-content-center">
			<div class="panel panel-default detailView">
				<div class="panel-heading">Detail záznamu <a href="<?php echo site_url('taxikari/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
				<div class="panel-body">
					<br/>
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
</div>
