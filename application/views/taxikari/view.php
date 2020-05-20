<div class="container">
	<div class="row"><br></div>
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">Detail záznamu <a href="<?php echo site_url('taxikari/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
			<div class="panel-body">
				<div class="form-group">
					<label>ID:</label>
					<p><?php echo !empty($employees['id'])?$employees['id']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Meno:</label>
					<p><?php echo !empty($employees['firstName'])?$employees['firstName']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Priezvisko:</label>
					<p><?php echo !empty($employees['lastName'])?$employees['lastName']:''; ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
