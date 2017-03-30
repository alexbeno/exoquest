<?php 

function json_cached_api_results($cache_file = NULL, $expires = NULL)
{
	global $request_type, $purge_cache, $limit_reached, $request_limit;

	if(!$cache_file)
		$cache_file = './assets/cache/data.json';


	if(!$expires)
		$expires = time() - 2*60*60;

	// if(!file_exists($cache_file))
	// 	die("Cache file is missing: $cache_file");

	// Check that the file is older than the expire time and that it's not empty
	if(filectime($cache_file) < $expires || file_get_contents($cache_file) == '')
	{
		// file is too old, refresh cache
		$api_results = file_get_contents("http://exoplanetarchive.ipac.caltech.edu/cgi-bin/nstedAPI/nph-nstedAPI?table=exoplanets&format=json&select=pl_name,pl_disc,pl_orbper,pl_radj,st_age,st_teff,pl_discmethod,st_mass,pl_pnum,pl_orbper,pl_radj,pl_facility");
		$results = $api_results;

		// Remove cache file on error to avoid writing wrong xml
		if($api_results && $results)
			file_put_contents("./assets/cache/data.json", $results);
		else
			unlink($cache_file);
	}
	else
	{
		// Fetch cache
		$results = file_get_contents($cache_file);
	}

	return $results;
}