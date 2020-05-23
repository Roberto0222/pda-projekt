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
									<th scope="col">Služba</th>
									<th scope="col">Cena za km</th>
									<th scope="col" colspan="3" width="20%">Upraviť</th>
								</tr>
								</thead>
								<tbody id="userData">

								<?php if(!empty($services)): foreach($services as $service): ?>
									<tr>
										<td><?php echo '#'.$service['idServices']; ?></td>
										<td><?php echo $service['name']; ?></td>
										<td><?php echo $service['pricePerKm'] ." €"; ?></td>

										<td>
											<a href="<?php echo site_url('sluzby/view/'.$service['idServices']); ?>"><img src="<?php echo site_url();?>/../assets/img/icons/magnifying-glass-4x.png" alt="View"></a>
										</td>
										<td>
											<a href="<?php echo site_url('sluzby/edit/'.$service['idServices']); ?>"><img src="<?php echo site_url();?>/../assets/img/icons/wrench-4x.png" alt="Edit"></a>
										</td>
										<td>
											<a href="<?php echo site_url('sluzby/delete/'.$service['idServices']); ?>" onclick="return confirm('Are you sure to delete?')"><img src="<?php echo site_url();?>/../assets/img/icons/trash-4x.png" alt="Delete"></a>
										</td>
									</tr>
								<?php endforeach;?>

									<?php else: ?>
									<tr><td colspan="5">Žiadni študenti ......</td></tr>
									<?php endif; ?>
									<tr align="center">
										<td colspan="9">
											<a href="<?php echo site_url('sluzby/add/'); ?>">Pridať nový... <img src="<?php echo site_url();?>/../assets/img/icons/plus-4x.png" align="right"> </a>
										</td>
									</tr>

								</tbody>
							</table>
			</div>
		</div>
	</div>
	</div>
