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
				<div class="panel-heading"><?php echo $action; ?> zamestnanec <a href="<?php echo site_url('taxikari/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
				<div class="panel-body">
					<form method="post" action="" class="form">
						<div class="form-group">
							<label for="title">Meno</label>
							<input type="text" class="form-control" name="firstName" id="firstName" placeholder="Vložte meno" value="<?php echo !empty($post['firstName'])?$post['firstName']:''; ?>">
							<?php echo form_error('firstName','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Priezvisko</label>
							<input type="text" class="form-control" name="lastName" placeholder="Vložte priezvisko" value="<?php echo !empty($post['lastName'])?$post['lastName']:''; ?>">
							<?php echo form_error('lastName','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Tel. číslo</label>
							<input type="tel" class="form-control" name="telNumber" placeholder="Vložte tel. číslo" value="<?php echo !empty($post['telNumber'])?$post['telNumber']:''; ?>">
							<?php echo form_error('telNumber','<p class="help-block text-danger">','</p>'); ?>
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

						<div class="form-group">
							<label for="title">Služba - Cena per km</label>
							<select class="form-control" name="sluzbySelect">
								<?php if(!empty($services)): foreach($services as $service): ?>
									<option name="Services_idServices" value="<?php echo $service['idServices']; ?>"
										<?php if(!empty($post['Services_idServices']) == $service['idServices']) echo "selected"; ?>><?php echo $service['idServices'] . " - " . $service['name'] . " - " . $service['pricePerKm'] . " €"; ?></option>
								<?php endforeach;?>
								<?php else: ?>
									Žiadné služby ......
								<?php endif; ?>
								<?php echo form_error('Services_idServices','<p class="help-block text-danger">','</p>'); ?>
							</select>
						</div>

						<div class="form-group">
							<label for="title">Auto</label>
							<select class="form-control" name="autoSelect">
								<?php if(!empty($cars)): foreach($cars as $car): ?>
									<option name="Cars_id" value="<?php echo $car['id']; ?>"
									<?php if(!empty($post['Cars_id']) == $car['id']) echo "selected";?>><?php echo $car['id'] . " - " . $car['Brand'] . " - " . $car['Model'] . " - " . $car['ManYear'] . " - " .$car['LicensePlate']; ?></option>
								<?php endforeach;?>
								<?php else: ?>
									Žiadné autá ......
								<?php endif; ?>
								<?php echo form_error('Cars_id','<p class="help-block text-danger">','</p>'); ?>
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
