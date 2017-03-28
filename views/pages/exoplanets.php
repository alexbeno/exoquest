<?php

// Get content
$data = file_get_contents('./assets/cache/data.json');

$result = json_decode($data);

//get the request
$year_data = (int)$_POST['disc-year'];
$temp_data = (float)$_POST['up-temp'];
$temp_be_data = (float)$_POST['bel-temp'];
$disc_met = $_POST['disc-met'];
$up_mass = $_POST['up-mass'];
$be_mass = $_POST['bel-mass'];
$nb_pla = (int)$_POST['pl-sys'];
?>

<form method="post">
	<label for="disc-year">Discovery year: </label>
	<input type="number" name="disc-year"><br>
	<label for="up-temp">Temperature upper: </label>
	<input type="number" name="up-temp">K<br>
	<label for="bel-temp">Temperature below: </label>
	<input type="number" name="bel-temp">K<br>
	<label for="disc-met">Discovery method: </label>
	<select name="disc-met">
		<option value="Radial Velocity">Radial Velocity</option>
		<option value="Microlensing">Microlensing</option>
		<option value="Transit">Transit</option>
		<option value="Imaging">Imaging</option>
	</select><br>
	<label for="up-mass">Mass upper: </label>
	<input type="number" name="up-mass">M☉<br>
	<label for="bel-mass">Mass below: </label>
	<input type="number" name="bel-mass">K<br>
	<label for="pl-sys">Planets in the system: </label>
	<input type="number" name="pl-sys">
	<input type="submit">
	</form>

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
		<?php foreach($result as $planet):
			// constuct the perfect request
			if(!empty($_POST['disc-year']))
			{
				$cond1 = ($planet->pl_disc === $year_data);
				$req = $cond1;
			}
			if(!empty($_POST['up-temp']))
			{
				$cond2 = ($planet->st_teff >= $temp_data);
				if(empty($_POST['disc-year']))
				{
					$req = $cond2;
				}
				else
				{
					$req = $req && $cond2;
				}
			}
			if(!empty($_POST['bel-temp']))
			{
				$cond3 = ($planet->st_teff <= $temp_be_data);
				if(empty($_POST['disc-year']) && empty($_POST['disc-year']))
				{
					$req = $cond3;
				}
				else
				{
					$req = $req && $cond3;
				}
			}
			if(!empty($_POST['disc-met']))
			{
				$cond4 = ($planet->pl_discmethod <= $disc_met);
				if(empty($_POST['disc-year']) && empty($_POST['up-temp']) && empty($_POST['bel-temp']))
				{
					$req = $cond4;
				}
				else
				{
					$req = $req && $cond4;
				}
			}
			if(!empty($_POST['up-mass']))
			{
				$cond5 = ($planet->st_mass >= $up_mass);
				if(empty($_POST['disc-year']) && empty($_POST['up-temp']) && empty($_POST['bel-temp']) && empty($_POST['disc-met']))
				{
					$req = $cond5;
				}
				else
				{
					$req = $req && $cond5;
				}
			}
			if(!empty($_POST['bel-mass']))
			{
				$cond6 = ($planet->st_mass <= $be_mass);
				if(empty($_POST['disc-year']) && empty($_POST['up-temp']) && empty($_POST['bel-temp']) && empty($_POST['disc-met']) && empty($_POST['up-mass']))
				{
					$req = $cond6;
				}
				else
				{
					$req = $req && $cond6;
				}
			}
			if(!empty($_POST['pl-sys']))
			{
				$cond7 = ($planet->pl_pnum === $nb_pla);
				if(empty($_POST['disc-year']) && empty($_POST['up-temp']) && empty($_POST['bel-temp']) && empty($_POST['disc-met']) && empty($_POST['up-mass']) && empty($_POST['bel-mass']))
				{
					$req = $cond7;
				}
				else
				{
					$req = $req && $cond7;
				}
			}
		?>
		<?php if($req)
		{
		?>
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
		<?php
		}
		else
		{

		}
		?>
		<?php endforeach ?>
	</div>
</div>
