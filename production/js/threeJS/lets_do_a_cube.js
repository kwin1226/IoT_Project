// This source is the javascript needed to build a simple moving
// cube in **three.js** based on this
// [example](https://raw.github.com/mrdoob/three.js/r44/examples/canvas_geometry_cube.html)
// It is the source about this [blog post](/blog/2011/08/06/lets-do-a-cube/).

// ## Now lets start

// declare a bunch of variable we will need later
var startTime	= Date.now();
var container;
var camera, scene, renderer, stats;
var cube;

// ## bootstrap functions
// initialiaze everything
init();
// make it move			
animate();

// ## Initialize everything
function init() {
	// test if webgl is supported
	if ( ! Detector.webgl ) Detector.addGetWebGLMessage();

	// create the camera
	camera = new THREE.Camera( 70, window.innerWidth / window.innerHeight, 1, 1000 );
	camera.position.z = 350;

	// create the Scene
	scene = new THREE.Scene();

	// create the Cube
	cube = new THREE.Mesh( new THREE.CubeGeometry( 200, 200, 200 ), new THREE.MeshNormalMaterial() );

	// add the object to the scene
	scene.addObject( cube );

	// create the container element
	container = document.createElement( 'div' );
	document.body.appendChild( container );

	var alertDiv_x = '<input id="xdata" type="text" name="" value="123" style="display:none"; />';
	var alertDiv_y = '<input id="ydata" type="text" name="" value="321" style="display:none"; />';
	$(container).append( alertDiv_x );
	$(container).append( alertDiv_y );

	// init the WebGL renderer and append it to the Dom
	renderer = new THREE.WebGLRenderer();
	renderer.setSize( window.innerWidth, window.innerHeight );
	container.appendChild( renderer.domElement );
	
	// init the Stats and append it to the Dom - performance vuemeter
	stats = new Stats();
	stats.domElement.style.position = 'absolute';
	stats.domElement.style.top = '0px';
	container.appendChild( stats.domElement );
}

// ## Animate and Display the Scene
function animate() {
	// render the 3D scene
	render();
	// relaunch the 'timer' 
	requestAnimationFrame( animate );
	// update the stats
	stats.update();
}


// ## Render the 3D Scene
function render() {

	var url = "http://localhost/project2/php_andrew/Get_MPU6050.php";
	var arr = [];
	var x ,y, z, flag=false;
	$.ajax({
	    url: url,  
	    success:function(data) {
	     arr = data.split(" ");
	     x=parseFloat(arr[0]);
	     y=parseFloat(arr[1]);	
	     // z=parseFloat(arr[2]);
	     // console.log("x:" + x + "y:" + y);
	     $("#xdata").attr("value",x).trigger('change');
	     $("#ydata").attr("value",y).trigger('change');

	     cube.scale.x = 1;
	     cube.scale.y = 0.05;
	     cube.scale.z = 1;
	     cube.rotation.x += (x/1000);
	     cube.rotation.y += (y/1000);

	     renderer.render( scene, camera );
	    }
	  });

	// animate the cube

	// cube.rotation.z += 0.0175;

	// make the cube bounce
	// var dtime	= Date.now() - startTime;
	// cube.scale.x	= 1.0 + 0.3*Math.sin(dtime/300);
	// cube.scale.y	= 1.0 + 0.3*Math.sin(dtime/300);
	// cube.scale.z	= 1.0 + 0.3*Math.sin(dtime/300);
	// actually display the scene in the Dom element

}