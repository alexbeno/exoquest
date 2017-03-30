<?php

// Sorting system
$nameAsc = false;
$nameDesc = false;
if (isset($_GET['name'])) {
	if ($_GET['name'] === "asc") {
		$nameAsc = true;
	} else if ($_GET['name'] === "desc") {
		$nameDesc = true;
	}
}

if ($nameAsc) {
	usort($json_results, function($a, $b) {
		return $a->pl_name < $b->pl_name ? -1 : 1;
	});
} else if ($nameDesc) {
	usort($json_results, function($a, $b) {
		return $a->pl_name > $b->pl_name ? -1 : 1;
	});
}


$yearAsc = false;
$yearDesc = false;
if (isset($_GET['year'])) {
	if ($_GET['year'] == "asc") {
		$yearAsc = true;
	} elseif ($_GET['year'] == "desc") {
		$yearDesc = true;
	}
}

if ($yearAsc) {
	usort($json_results, function($a, $b) {
		return $a->pl_disc < $b->pl_disc ? -1 : 1;
	});
} elseif ($yearDesc) {
	usort($json_results, function($a, $b) {
		return $a->pl_disc > $b->pl_disc ? -1 : 1;
	});
}

$tempAsc = false;
$tempDesc = false;
if (isset($_GET['temp'])) {
	if ($_GET['temp'] == "asc") {
		$tempAsc = true;
	} elseif ($_GET['temp'] == "desc") {
		$tempDesc = true;
	}
}

if ($tempAsc) {
	usort($json_results, function($a, $b) {
		return $a->st_teff < $b->st_teff ? -1 : 1;
	});
} elseif ($tempDesc) {
	usort($json_results, function($a, $b) {
		return $a->st_teff > $b->st_teff ? -1 : 1;
	});
}

$discAsc = false;
$discDesc = false;
if (isset($_GET['disc'])) {
	if ($_GET['disc'] == "asc") {
		$discAsc = true;
	} elseif ($_GET['disc'] == "desc") {
		$discDesc = true;
	}
}

if ($discAsc) {
	usort($json_results, function($a, $b) {
		return $a->pl_discmethod < $b->pl_discmethod ? -1 : 1;
	});
} elseif ($discDesc) {
	usort($json_results, function($a, $b) {
		return $a->pl_discmethod > $b->pl_discmethod ? -1 : 1;
	});
}

$massAsc = false;
$massDesc = false;
if (isset($_GET['mass'])) {
	if ($_GET['mass'] == "asc") {
		$massAsc = true;
	} elseif ($_GET['mass'] == "desc") {
		$massDesc = true;
	}
}

if ($massAsc) {
	usort($json_results, function($a, $b) {
		return $a->st_mass < $b->st_mass ? -1 : 1;
	});
} elseif ($massDesc) {
	usort($json_results, function($a, $b) {
		return $a->st_mass > $b->st_mass ? -1 : 1;
	});
}

$pnumAsc = false;
$pnumDesc = false;
if (isset($_GET['pnum'])) {
	if ($_GET['pnum'] == "asc") {
		$pnumAsc = true;
	} elseif ($_GET['pnum'] == "desc") {
		$pnumDesc = true;
	}
}

if ($pnumAsc) {
	usort($json_results, function($a, $b) {
		return $a->st_pnum < $b->st_pnum ? -1 : 1;
	});
} elseif ($pnumDesc) {
	usort($json_results, function($a, $b) {
		return $a->st_pnum > $b->st_pnum ? -1 : 1;
	});
}
