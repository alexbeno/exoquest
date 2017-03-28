<?php 

// Get content
$data = file_get_contents('./assets/cache/data.json');

$result = json_decode($data);

?>

<div class="info-container">
	<div class="info-names">
		<table>
			<thead>
				<tr>
					<th>Name</th>
					<th>Discovery year</th>
					<th>Temperature</th>
					<th>Discovery method</th>
					<th>Mass</th>
					<th>Planets in the system</th>
				</tr>
			</thead>
		</table>
	</div>
	<div class="info-datas">
		<?php foreach($result as $planet): ?>
			<div class="data-row">
				<table>
					<tbody>
						<tr>
							<td><?= $planet->pl_name ?></td>
							<td><?= $planet->pl_disc?></td>
							<td><?= $planet->st_teff . ' K'?></td>
							<td><?= $planet->pl_discmethod?></td>
							<td><?= $planet->st_mass . ' M'?></td>
							<td><?= $planet->pl_pnum?></td>
						</tr>
					</tbody>
				</table>
			</div>
		<?php endforeach ?>
	</div>
</div>
