var textureb = ['assets/img/planete-text/verycold.png','assets/img/planete-text/cold.png','assets/img/planete-text/littlecold.png',
'assets/img/planete-text/beutral.png','assets/img/planete-text/hot.png','assets/img/planete-text/veryhot.png']

var texture = ['assets/img/planete-text/textur1.jpg','assets/img/planete-text/textur2.jpg','assets/img/planete-text/textur3.jpg',
'assets/img/planete-text/textur4.jpeg','assets/img/planete-text/textur5.jpg','assets/img/planete-text/textur6.jpg',
'assets/img/planete-text/textur7.jpg','assets/img/planete-text/textur8.png',
'assets/img/planete-text/textur9.jpg','assets/img/planete-text/textur10.jpg','assets/img/planete-text/textur11.jpg']
// Math.floor(Math.random() * texture.length - 1)
var currentTexture = texture[Math.floor(Math.random() * texture.length)];

var THREEx = THREEx || {}

THREEx.Planets	= {}

THREEx.Planets.baseURL	= './'

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

THREEx.Planets.createExob	= function(){
	var temp = document.querySelector('.temp').innerText;
	var temp_nb = parseInt(temp);
	console.log(temp)
	if(temp_nb < 4000 )
	{
		var currentTextureB = textureb[0];
	}
	else if( temp_nb >= 4000 && temp_nb < 5000)
	{
		var currentTextureB = textureb[1];
	}
	else if( temp_nb >= 5000 && temp_nb < 6000)
	{
		var currentTextureB = textureb[2];
	}
	else if( temp_nb  >= 6000 && temp_nb < 10000)
	{
		var currentTextureB = textureb[3];
	}
	else if( temp_nb >= 10000 && temp_nb < 14000)
	{
		var currentTextureB = textureb[4];
	}
	else
	{
		var currentTextureB = textureb[5];
	}
	var geometry	= new THREE.SphereGeometry(0.5, 32, 32)
	var texture	= THREE.ImageUtils.loadTexture(THREEx.Planets.baseURL+currentTextureB)
	var material	= new THREE.MeshPhongMaterial({
		map	: texture,
		bumpMap	: texture,
		bumpScale: 0.05,
	})
	var mesh	= new THREE.Mesh(geometry, material)
	return mesh
}
