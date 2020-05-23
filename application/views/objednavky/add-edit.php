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
				<div class="panel-heading"><?php echo $action; ?> objednávka <a href="<?php echo site_url('objednavky/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
				<div class="panel-body">
					<form method="post" action="" class="form">
						<div class="form-group">
							<label for="title">Latitude</label>
							<input type="text" class="form-control" name="latitude" id="latitude" placeholder="Vložte latitude" value="<?php echo !empty($post['latitude'])?$post['latitude']:''; ?>">
							<?php echo form_error('latitude','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Longitude</label>
							<input type="text" class="form-control" name="longitude" placeholder="Vložte longitude" value="<?php echo !empty($post['longitude'])?$post['longitude']:''; ?>">
							<?php echo form_error('longitude','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Odkiaľ</label>
							<input type="text" class="form-control" name="locationFrom" placeholder="Vložte odkiaľ" value="<?php echo !empty($post['locationFrom'])?$post['locationFrom']:''; ?>">
							<?php echo form_error('locationFrom','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Kam</label>
							<input type="text" class="form-control" name="locationTo" placeholder="Vložte kam" value="<?php echo !empty($post['locationTo'])?$post['locationTo']:''; ?>">
							<?php echo form_error('locationTo','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Vzdialenosť</label>
							<input type="text" class="form-control" name="distanceInKm" placeholder="Vložte vzdialenosť" value="<?php echo !empty($post['distanceInKm'])?$post['distanceInKm']:''; ?>">
							<?php echo form_error('distanceInKm','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Palivo</label>
							<input type="text" class="form-control" name="fuelUsed" placeholder="Vložte palivo" value="<?php echo !empty($post['fuelUsed'])?$post['fuelUsed']:''; ?>">
							<?php echo form_error('fuelUsed','<p class="help-block text-danger">','</p>'); ?>
						</div>


						<div class="form-group">
							<label for="title">Zamestnanec</label>
							<select class="form-control" name="employeeSelect">
								<?php if(!empty($employees)): foreach($employees as $employee): ?>
									<option name="Employees_id" id="Employees_id" value="<?php echo $employee['id']; ?>"
										<?php if(!empty($post['Employees_id']) == $employee['id']) echo "selected"; ?>><?php echo $employee['id'] . " - " . $employee['firstName'] . " " . $employee['lastName']; ?></option>
								<?php endforeach;?>
								<?php else: ?>
									Žiadni firmy ......
								<?php endif; ?>
								<?php echo form_error('Employees_id','<p class="help-block text-danger">','</p>'); ?>
							</select>
						</div>

						<div class="form-group">
							<label for="title">Zamestnanec - Auto</label>
							<select class="form-control" name="employeeCarSelect" disabled="true">
								<?php if(!empty($cars)): foreach($cars as $car): ?>
									<option name="Employees_Cars_id" value="<?php echo $car['id']; ?>"
										<?php if(!empty($post['Employees_Cars_id']) == $car['id']) echo "selected"; ?>><?php echo $car['id'] . " - " . $car['Brand'] . " - " . $car['Model']; ?></option>
								<?php endforeach;?>
								<?php else: ?>
									Žiadné služby ......
								<?php endif; ?>
								<?php echo form_error('Employees_Cars_id','<p class="help-block text-danger">','</p>'); ?>
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
