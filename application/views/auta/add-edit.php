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
				<div class="panel-heading"><?php echo $action; ?> auto <a href="<?php echo site_url('auta/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
				<div class="panel-body">
					<form method="post" action="" class="form">
						<div class="form-group">
							<label for="title">Značka</label>
							<input type="text" class="form-control" name="Brand" id="Brand" placeholder="Vložte značka" value="<?php echo !empty($post['Brand'])?$post['Brand']:''; ?>">
							<?php echo form_error('Brand','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Model</label>
							<input type="text" class="form-control" name="Model" placeholder="Vložte model" value="<?php echo !empty($post['Model'])?$post['Model']:''; ?>">
							<?php echo form_error('Model','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Rok výroby</label>
							<input type="number" class="form-control" name="ManYear" placeholder="Vložte rok výroby" value="<?php echo !empty($post['ManYear'])?$post['ManYear']:''; ?>" maxlength="4">
							<?php echo form_error('ManYear','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Stav km</label>
							<input type="number" class="form-control" name="Odometer" placeholder="Vložte stav km" value="<?php echo !empty($post['Odometer'])?$post['Odometer']:''; ?>">
							<?php echo form_error('Odometer','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Stav paliva</label>
							<input type="number" class="form-control" name="FuelQty" placeholder="Vložte stav paliva" value="<?php echo !empty($post['FuelQty'])?$post['FuelQty']:''; ?>">
							<?php echo form_error('FuelQty','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Max paliva</label>
							<input type="number" class="form-control" name="MaxFuel" placeholder="Vložte max paliva" value="<?php echo !empty($post['MaxFuel'])?$post['MaxFuel']:''; ?>">
							<?php echo form_error('MaxFuel','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">EČV</label>
							<input type="text" class="form-control" name="LicensePlate" placeholder="Vložte EČV" value="<?php echo !empty($post['LicensePlate'])?$post['LicensePlate']:''; ?>" maxlength="8">
							<?php echo form_error('LicensePlate','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Spotreba na 100 km</label>
							<input type="number" class="form-control" name="FuelPer100KM" placeholder="Vložte spotreba na 100 km" value="<?php echo !empty($post['FuelPer100KM'])?$post['FuelPer100KM']:''; ?>" step="0.01">
							<?php echo form_error('FuelPer100KM','<p class="help-block text-danger">','</p>'); ?>
						</div>

						<div class="form-group">
							<label for="title">Firma</label>
							<select class="form-control" name="firmaSelect">
								<?php if(!empty($company)): foreach($company as $comp): ?>
									<option name="TaxiSluzba_id" id="TaxiSluzba_id" value="<?php echo $comp['id']; ?>"
										<?php if(!empty($post['TaxiSluzba_id']) == $comp['id']) echo "selected"; ?>><?php echo $comp['id'] . "- " . $comp['name']; ?></option>
								<?php endforeach;?>
								<?php else: ?>
									Žiadni firmy ......
								<?php endif; ?>
								<?php echo form_error('TaxiSluzba_id','<p class="help-block text-danger">','</p>'); ?>
							</select>
						</div>
						<input type="submit" name="postSubmit" class="btn btn-primary" value="Poslať"/>
					</form>
				</div>
			</div>
		</div>
		<div class="col"></div>
	</div>
</div>
