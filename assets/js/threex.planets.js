var texture = ['si-space/assets/image/planete-text/textur1.jpg','si-space/assets/image/planete-text/textur2.jpg','si-space/assets/image/planete-text/textur3.jpg',
'si-space/assets/image/planete-text/textur4.jpeg','si-space/assets/image/planete-text/textur5.jpg','si-space/assets/image/planete-text/textur6.jpg',
'si-space/assets/image/planete-text/textur7.jpg','si-space/assets/image/planete-text/textur8.png',
'si-space/assets/image/planete-text/textur9.jpg','si-space/assets/image/planete-text/textur10.jpg','si-space/assets/image/planete-text/textur11.jpg']
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
