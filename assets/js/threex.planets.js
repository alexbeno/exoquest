var texture = ['exoquest/assets/img/planete-text/textur1.jpg','exoquest/assets/img/planete-text/textur2.jpg','exoquest/assets/img/planete-text/textur3.jpg',
'exoquest/assets/img/planete-text/textur4.jpeg','exoquest/assets/img/planete-text/textur5.jpg','exoquest/assets/img/planete-text/textur6.jpg',
'exoquest/assets/img/planete-text/textur7.jpg','exoquest/assets/img/planete-text/textur8.png',
'exoquest/assets/img/planete-text/textur9.jpg','exoquest/assets/img/planete-text/textur10.jpg','exoquest/assets/img/planete-text/textur11.jpg']
// Math.floor(Math.random() * texture.length - 1)
var currentTexture = texture[Math.floor(Math.random() * texture.length)];

var THREEx = THREEx || {}

THREEx.Planets	= {}

THREEx.Planets.baseURL	= '../'

// from http://planetpixelemporium.com/

THREEx.Planets.createExo	= function(){
	var geometry	= new THREE.SphereGeometry(0.5, 32, 32)
	var texture	= THREE.ImageUtils.loadTexture(THREEx.Planets.baseURL+currentTexture)
	var material	= new THREE.MeshPhongMaterial({
		map	: texture,
		bumpMap	: texture,
		bumpScale: 0.05,
	})
	var mesh	= new THREE.Mesh(geometry, material)
	return mesh
}
