<div class="container">
	<div class="row"><br></div>
	<div class="col-xs-12">
		<?php
		if(!empty($success_msg)){
			echo '<div class="alert alert-success">'.$success_msg.'</div>';
		}elseif(!empty($error_msg)){
			echo '<div class="alert alert-danger">'.$error_msg.'</div>';
		}
		?>
	</div>
	<div class="row">
		<div class="col"></div>
		<div class="col">
			<div class="panel panel-default">
				<div class="panel-heading"> Upraviť údaje zamestnanca <a href="<?php echo site_url('taxikari/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
				<div class="panel-body">
					<form method="post" action="" class="form">
						<div class="form-group">
							<label for="title">Názov služby</label>
							<input type="text" class="form-control" name="name" id="name" placeholder="Vložte názov služby" value="<?php echo !empty($post['name'])?$post['name']:''; ?>">
							<?php echo form_error('name','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Cena za km</label>
							<input type="number" step="0.01" class="form-control" name="pricePerKm" placeholder="Vložte cena za km" value="<?php echo !empty($post['pricePerKm'])?$post['pricePerKm']:''; ?>">
							<?php echo form_error('pricePerKm','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<input type="submit" name="postSubmit" class="btn btn-primary" value="Poslať"/>
					</form>
				</div>
			</div>
		</div>
		<div class="col"></div>
	</div>
</div>
