<?php

// Get content
$data = file_get_contents('./assets/cache/data.json');

$result = json_decode($data);

//get the request
if(!empty($_POST))
{
	if($_POST['disc-year'] == 1)
		$year_data = "";
	else
		$year_data = (int)$_POST['disc-year'];

	if($_POST['up-temp'] == 16150)
		$temp_data = "";
	else
		$temp_data = (float)$_POST['up-temp'];

	if($_POST['bel-temp'] == 16150)
		$temp_be_data = "";
	else
		$temp_be_data = (float)$_POST['bel-temp'];

	if($_POST['mass'] == 1.96)
		$mass_data = "";
	else
		$mass_data = (float)$_POST['mass'];

	$disc_met = $_POST['disc-met'];
	$nb_pla = (int)$_POST['pl-sys'];

	var_dump($year_data);
	var_dump($temp_data);
	var_dump($temp_be_data);
	var_dump($mass_data);
	var_dump($disc_met);
	var_dump($nb_pla);
}
?>


<div class="info-container">
	<div class="info-names">
		<table>
			<thead>
				<tr>
					<th></th>
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
		<?php
		if(empty($_POST))
			foreach ($result as $planet) : ?>
		<div class="data-row">
			<table>
				<tbody>
					<tr onclick="redirect()"><script>function redirect(){window.location="planete?id=<?=$planet->pl_name?>"}</script>
						<td><img src="./assets/img/planets-min/blue-plan.png" alt="mini planet"></td>
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
	<?php  endforeach ?>


	<?php foreach($result as $planet):
			// build the perfect request
	if($_POST['disc-year'] > 1989)
	{
		$cond1 = ($planet->pl_disc === $year_data);
		$req = $cond1;
	}
	if($_POST['up-temp'] != 2999)
	{
		$cond2 = ($planet->st_teff >= $temp_data);
		if($_POST['disc-year'] <= 1989)
		{
			$req = $cond2;
		}
		else
		{
			$req = $req && $cond2;
		}
	}
	if($_POST['bel-temp'] != 2999)
	{
		$cond3 = ($planet->st_teff <= $temp_be_data);
		if($_POST['disc-year'] <= 1989 && $_POST['up-temp'] <= 2999)
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
		if($_POST['disc-met'] === "discover")
		{

		}
		else
		{
			if($_POST['disc-year'] <= 1989 && $_POST['up-temp'] <= 2999 && $_POST['bel-temp'] <= 2999)
			{
				$req = $cond4;
			}
			else
			{
				$req = $req && $cond4;
			}
		}
	}
	if($_POST['mass'] > 0)
	{
		$cond5 = ($planet->st_mass >= $mass_data);
		if($_POST['disc-year'] <= 1989 && $_POST['up-temp'] <= 2999 && $_POST['bel-temp'] <= 2999 && $_POST['disc-met'] === "discover")
		{
			$req = $cond5;
		}
		else
		{
			$req = $req && $cond5;
		}
	}
	if($_POST['pl-sys'] > 0)
	{
		$cond6 = ($planet->pl_pnum === $nb_pla);
		if($_POST['disc-year'] <= 1989 && $_POST['up-temp'] <= 2999 && $_POST['bel-temp'] <= 2999 && $_POST['disc-met'] === "discover" && $_POST['mass'] <= 0)
		{
			$req = $cond6;
		}
		else
		{
			$req = $req && $cond6;
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
						<td><img src="./assets/img/planets-min/blue-plan.png" alt="mini planet"></td>
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
<div class="filter-toggle">
	<p>filter</p>
</div>
<form method="post">
	<div class="group">
		<label for="disc-year">Discovery year </label><br>
		<input type="range" name="disc-year" min="1989" max="2017" class="range" value="0"><output></output>
	</div>
	<div class="group">
		<label for="up-temp">Temperature upper </label><br>
		<input type="range" name="up-temp" min="2999" max="30000" class="range" value="0"><output></output>
	</div>
	<div class="group">
		<label for="bel-temp">Temperature below </label><br>
		<input type="range" name="bel-temp" min="2999" max="30000" class="range" value="0"><output></output>
	</div>
	<div class="group">
		<label for="disc-met">Discovery method </label><br>
		<select name="disc-met">
			<option value="discover">discover</option>
			<option value="Radial Velocity">Radial Velocity</option>
			<option value="Microlensing">Microlensing</option>
			<option value="Transit">Transit</option>
			<option value="Imaging">Imaging</option>
		</select>
	</div>
	<div class="group">
		<label for="mass">Mass </label><br>
		<input type="range" name="mass" min="0" max="3.9" step="0.01" value="0"><output></output>M
	</div>
	<div class="group">
		<label for="pl-sys">Planets in the system </label><br>
		<input type="range" name="pl-sys" min="0" max="7" value="0"><output></output>
	</div>
	<input type="submit" value="search">
</form>
</div>
