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
						<th scope="col">Dátum</th>
						<th scope="col">Latitude</th>
						<th scope="col">Longitude</th>
						<th scope="col">Odkiaľ</th>
						<th scope="col">Kam</th>
						<th scope="col">Vzdialenosť</th>
						<th scope="col">Spotrebované palivo</th>
						<th scope="col">Dokončil</th>
						<th scope="col" colspan="3" width="20%">Upraviť</th>
					</tr>
					</thead>
					<tbody id="userData">
					<?php if(!empty($contracts)): foreach($contracts as $contract): ?>
						<tr>
							<td><?php echo '#'.$contract['id']; ?></td>
							<td><?php echo $contract['callDate']; ?></td>
							<td><?php echo $contract['latitude']; ?></td>
							<td><?php echo $contract['longitude']; ?></td>
							<td><?php echo $contract['locationFrom']; ?></td>
							<td><?php echo $contract['locationTo']; ?></td>
							<td><?php echo $contract['distanceInKm'] . " km"; ?></td>
							<td><?php echo $contract['fuelUsed'] . " liter"; ?></td>
							<td><?php echo $contract['firstName'] . " " . $contract['lastName']; ?></td>
							<td>
								<a href="<?php echo site_url('objednavky/view/'.$contract['id']); ?>"><img src="<?php echo site_url();?>/../assets/img/icons/magnifying-glass-4x.png" alt="View"></a>
							</td>
							<td>
								<a href="<?php echo site_url('objednavky/edit/'.$contract['id']); ?>"><img src="<?php echo site_url();?>/../assets/img/icons/wrench-4x.png" alt="Edit"></a>
							</td>
							<td>
								<a href="<?php echo site_url('objednavky/delete/'.$contract['id']); ?>" onclick="return confirm('Are you sure to delete?')"><img src="<?php echo site_url();?>/../assets/img/icons/trash-4x.png" alt="Delete"></a>
							</td>
						</tr>
					<?php endforeach;?>

						<?php else: ?>
						<tr><td colspan="5">Žiadni študenti ......</td></tr>
						<?php endif; ?>
						<tr align="center">
							<td colspan="12">
								<a href="<?php echo site_url('objednavky/add/'); ?>">Pridať nový... <img src="<?php echo site_url();?>/../assets/img/icons/plus-4x.png" align="right"> </a>
							</td>
						</tr>

					</tbody>
				</table>
				<p style="font-size: 24px; letter-spacing: 8px;"><?php echo $links; ?></p>
			</div>
		</div>
	</div>
	</div>
