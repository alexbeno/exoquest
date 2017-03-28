
	var renderer	= new THREE.WebGLRenderer({
		antialias	: true
	});
	renderer.setSize( (window.innerWidth / 1.2), (window.innerHeight / 1.2) );
  var containerPlanet = document.querySelector('.container-planet');
  containerPlanet.appendChild( renderer.domElement );
	renderer.shadowMapEnabled	= true

	var onRenderFcts= [];
	var scene	= new THREE.Scene();
	var camera	= new THREE.PerspectiveCamera(45, (window.innerWidth / 2) / (window.innerHeight / 2), 0.01, 100 );
	camera.position.z = 2;

	var light	= new THREE.AmbientLight( 0x222222 )
	scene.add( light )

	var light	= new THREE.DirectionalLight( 0xffffff, 1 )
	light.position.set(5,5,5)
	scene.add( light )

	//add an object and make it move

	var mesh	= THREEx.Planets.createExo()
	scene.add(mesh)

	//		Camera Controls

	var mouse	= {x : 0, y : 0}
	document.addEventListener('mousemove', function(event){
		mouse.x	= (event.clientX / window.innerWidth ) - 0.5
		mouse.y	= (event.clientY / window.innerHeight) - 0.5
	}, false)
	onRenderFcts.push(function(delta, now){
		camera.position.x += (mouse.x*5 - camera.position.x) * (delta*3)
		camera.position.y += (mouse.y*5 - camera.position.y) * (delta*3)
		camera.lookAt( scene.position )
	})

	//render the scene

	onRenderFcts.push(function(){
		renderer.render( scene, camera );
	})

	//loop runner

	var lastTimeMsec= null
	requestAnimationFrame(function animate(nowMsec){
		// keep looping
		requestAnimationFrame( animate );
		// measure time
		lastTimeMsec	= lastTimeMsec || nowMsec-1000/60
		var deltaMsec	= Math.min(200, nowMsec - lastTimeMsec)
		lastTimeMsec	= nowMsec
		// call each update function
		onRenderFcts.forEach(function(onRenderFct){
			onRenderFct(deltaMsec/1000, nowMsec/1000)
		})
	})
