<div class="container">
	<?php if(!empty($success_msg)){ ?>
		<div class="col-xs-12">
			<div class="alert alert-success"><?php echo $success_msg; ?></div>
		</div>
	<?php }elseif(!empty($error_msg)){ ?>
		<div class="col-xs-12">
			<div class="alert alert-danger"><?php echo $error_msg; ?></div>
		</div>
	<?php } ?>


				<div class="row justify-content-center">
					<div class="table-responsive-xl">
							<table id="table" class="table table-dark text-centered" border="2">
								<thead class="thead-dark">
								<tr align="center">
									<th scope="col">ID</th>
									<th scope="col">Značka</th>
									<th scope="col">Model</th>
									<th scope="col">Rok výroby</th>
									<th scope="col">Stav km</th>
									<th scope="col">Stav paliva</th>
									<th scope="col">Spotreba na 100 km</th>
									<th scope="col">EČV</th>
									<th scope="col" colspan="3">Upraviť</th>
								</tr>
								</thead>
								<tbody id="carsData">

								<?php if(!empty($cars)): foreach($cars as $car): ?>
									<tr>
										<td><?php echo '#'.$car['id']; ?></td>
										<td><?php echo $car['Brand']; ?></td>
										<td><?php echo $car['Model']; ?></td>
										<td><?php echo $car['ManYear']; ?></td>
										<td><?php echo $car['Odometer']; ?> km</td>
										<td>
											<?php
												$max = (double)($car['MaxFuel']);
												$current = (double)($car['FuelQty']);
												$percentage = $current*(100/$max);
											echo $car['FuelQty'] . "/" . $car['MaxFuel'] . " liter - " . round($percentage,0) . "%"; ?>
											<div class="progress">
												<div class="<?php

													if($percentage >= 70) {
														echo 'progress-bar bg-success';
													} else if($percentage >= 35 && $percentage < 70) {
														echo 'progress-bar bg-warning';
													} else if( $percentage < 35) {
														echo 'progress-bar bg-danger';
													}
													?>" role="progressbar" style="width: <?php echo $current*(100/(double)($car['MaxFuel'])) . "%"; ?>" aria-valuenow="<?php echo $car['FuelQty']; ?>" aria-valuemin="0" aria-valuemax="<?php echo $car['MaxFuel']; ?>">
												</div>
											</div>
										</td>
										<td>
											<?php echo $car['FuelPer100KM'] . " liter"; ?>
										</td>
										<td>
											<?php echo $car['LicensePlate']; ?>
										</td>
										<td>
											<a href="<?php echo site_url('auta/view/'.$car['id']); ?>"><img src="<?php echo site_url();?>/../assets/img/icons/magnifying-glass-4x.png" alt="View"></a>
										</td>
										<td>
											<a href="<?php echo site_url('auta/edit/'.$car['id']); ?>"><img src="<?php echo site_url();?>/../assets/img/icons/wrench-4x.png" alt="Edit"></a>
										</td>
										<td>
											<a href="<?php echo site_url('auta/delete/'.$car['id']); ?>" onclick="return confirm('Are you sure to delete?')"><img src="<?php echo site_url();?>/../assets/img/icons/trash-4x.png" alt="Delete"></a>
										</td>
									</tr>
								<?php endforeach;?>

									<?php else: ?>
									<tr><td colspan="5">Žiadne autá ......</td></tr>
									<?php endif; ?>
									<tr align="center">
										<td colspan="11">
											<a href="<?php echo site_url('auta/add/'); ?>">Pridať nový... <img src="<?php echo site_url();?>/../assets/img/icons/plus-4x.png" align="right"> </a>
										</td>
									</tr>

								</tbody>
							</table>

					</div>
				</div>
			</div>
		</div>
