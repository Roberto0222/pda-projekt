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
									<th scope="col">Meno</th>
									<th scope="col">Priezvisko</th>
									<th scope="col">Tel. číslo</th>
									<th scope="col">Služba</th>
									<th scope="col">Cena</th>
									<th scope="col" colspan="3" width="20%">Upraviť</th>
								</tr>
								</thead>
								<tbody id="userData">

								<?php if(!empty($employees)): foreach($employees as $employee): ?>

									<tr>
										<td><?php echo '#'.$employee['id']; ?></td>
										<td><?php echo $employee['firstName']; ?></td>
										<td><?php echo $employee['lastName']; ?></td>
										<td><?php echo $employee['telNumber']; ?></td>
										<td><?php if(!empty($employee['name'])) echo $employee['name'];
												  else echo "Nie je nastavené"?></td>
										<td><?php if(!empty($employee['pricePerKm'])) echo $employee['pricePerKm'] . " €";
											else echo "Nie je nastavené"?></td>

										<td>
											<a href="<?php echo site_url('taxikari/view/'.$employee['id']); ?>"><img src="<?php echo site_url();?>/../assets/img/icons/magnifying-glass-4x.png" alt="View"></a>
										</td>
										<td>
											<a href="<?php echo site_url('taxikari/edit/'.$employee['id']); ?>"><img src="<?php echo site_url();?>/../assets/img/icons/wrench-4x.png" alt="Edit"></a>
										</td>
										<td>
											<a href="<?php echo site_url('taxikari/delete/'.$employee['id']); ?>" onclick="return confirm('Are you sure to delete?')"><img src="<?php echo site_url();?>/../assets/img/icons/trash-4x.png" alt="Delete"></a>
										</td>
									</tr>

								<?php endforeach;?>

									<?php else: ?>
									<tr><td colspan="5">Žiadni študenti ......</td></tr>
									<?php endif; ?>
									<tr align="center">
										<td colspan="9">
											<a href="<?php echo site_url('taxikari/add/'); ?>">Pridať nový... <img src="<?php echo site_url();?>/../assets/img/icons/plus-4x.png" align="right"> </a>
										</td>
									</tr>

								</tbody>
							</table>
						<p style="font-size: 24px; letter-spacing: 8px;"><?php echo $links; ?></p>
			</div>
		</div>
	</div>
	</div>
