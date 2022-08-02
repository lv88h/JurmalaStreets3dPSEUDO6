<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>3D ONLINE GAME 2</title>
    <link rel="stylesheet" href="/css/examples.css?ver=1.0.0" />
    <script src="/js/examples.js?ver=1.1.1"></script>
    <script src="/lib/phaser.min.js?ver=3.52.0"></script>
    <script src="/lib/enable3d/enable3d.phaserExtension.0.25.0.min.js"></script>
              <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <!---<script src="https://code.jquery.com/jquery-1.10.2.js"></script> -->

    

  </head>

  <body>
   <!--- <div id="info-text">Use WASD, SPACE and your Mouse.<br />Try to play it on your mobile device :)</div> -->
   
 
  <center>
   <h1>
          <?php  
   include_once 'db.php';
 
$sessionid = $_SESSION['user_id'];
 
echo $user_data['username'];
 
if(empty($sessionid)){
            header('Location: index.php');
 
//echo $sessionid;
 
}
 
 
//skripts kurš pie katras čaraktera kustību apstājas updeito tabulas sadaļu *location*
//skripts kurš katru lietotāju kura datetime sakrīt ar intervālu pēdējās 15 min, zīmē ekrānā
 
 
 
 
 
   ?>
 
   </h1>  <a href="logout.php">Logout.</a>
   </center>
   
   
   
    <script>
		

		
      const {
        enable3d,
        Scene3D,
        Canvas,
        ThirdDimension,
        THREE,
        JoyStick,
        ExtendedObject3D,
        ThirdPersonControls,
        PointerLock,
        PointerDrag
      } = ENABLE3D

      /**
       * Is touch device?
       */
      const isTouchDevice = 'ontouchstart' in window
	var choicef = 1;
	
	
	var textbubble = [];
      class MainScene extends Scene3D {
        constructor() {
          super({ key: 'MainScene' })
        }

        init() {
          this.accessThirdDimension({ maxSubSteps: 10, fixedTimeStep: 1 / 120 })
          this.third.renderer.outputEncoding = THREE.LinearEncoding
          this.canJump = true
          this.move = false

          this.moveTop = 0
          this.moveRight = 0
        }

        async create() {
          const { lights } = await this.third.warpSpeed('-ground', '-orbitControls')

          const { hemisphereLight, ambientLight, directionalLight } = lights
          const intensity = 0.65
          hemisphereLight.intensity = intensity
          ambientLight.intensity = intensity
          directionalLight.intensity = intensity

          //this.third.physics.add.box({ y: 10, x: 35 }, { lambert: { color: 'red' } })

          // this.third.physics.debug.enable()

          /**
           * Medieval Fantasy Book by Pixel (https://sketchfab.com/stefan.lengyel1)
           * https://sketchfab.com/3d-models/medieval-fantasy-book-06d5a80a04fc4c5ab552759e9a97d91a
           * Attribution 4.0 International (CC BY 4.0)
           
           E4E717
           */
          this.third.load.gltf('/assets/glb/book6.glb').then(object => {
            const scene = object.scenes[0]

            const book = new ExtendedObject3D()
            book.name = 'scene'
            book.add(scene)
            this.third.add.existing(book)

            // add animations
            // sadly only the flags animations works
            object.animations.forEach((anim, i) => {
              book.mixer = this.third.animationMixers.create(book)
              // overwrite the action to be an array of actions
              book.action = []
              book.action[i] = book.mixer.clipAction(anim)
              book.action[i].play()
            })

            book.traverse(child => {
              if (child.isMesh) {
                child.castShadow = child.receiveShadow = false
                child.material.metalness = 0
                child.material.roughness = 1

                if (/mesh/i.test(child.name)) {
                  this.third.physics.add.existing(child, {
                    shape: 'concave',
                    mass: 0,
                    collisionFlags: 1,
                    autoCenter: false
                  })
                  child.body.setAngularFactor(0, 0, 0)
                  child.body.setLinearFactor(0, 0, 0)
                }
              }
            })
          })
          
          
  
         
         
         
 
 
          var skins = [];
          $.ajax({
              type: "GET",
              async: false,
              url: 'loadskins.php',
              data: {},
              success: function (data) {
                  skins = data.split(",").map(String);
              }
          });

			
			 
			 
  //console.log(vertibasx);
 
          for (var i = 0; i < skins.length - 1; i++) {
              let skin = skins[i];  
              
              const lokacijumasivs = [];
			 
			//// let objstr = obj[i].toString().split("");
			 //let objstr = obj[i];
			 



			 ////console.log(objstr);
			  //console.log("x", vertibasx[i]);
			  //console.log("y", vertibasy[i]);
			  //console.log("z", vertibasz[i]);




			var obj = []; 
                      $.ajax({
                          type: "GET",
                          async: false,
                          url: 'getlocation.php',
                          data: {},
                          success: function (data) {
                                                obj = data.split("*").map(String);

                          }
 
                      });
            


  			// console.log("obj", obj);
  			 
 const vertibasx = obj.slice(0,1);
			 const vertibasy = obj.slice(1,2);
			 const vertibasz = obj.slice(2,3);
			 

			  //console.log(vertibasx);
			  //console.log(vertibasy);
			  //console.log(vertibasz);

          /**
           * box_man.glb by Jan Bláha
           * https://github.com/swift502/Sketchbook
           * CC-0 license 2018
           */
           
           ///update shito ik pa laikam ar chata table saturu, paradit visiem
           ///paradit tukshu vai pazudinat ja ieraksts veikts paris sekundes pirms
           
           	var getchat = []; 
           			window.setInterval(function(){

                      $.ajax({
                          type: "GET",
                          async: false,
                          url: 'getchat.php',
                          data: {},
                          success: function (data) {
                                               getchat = data.split("*").map(String);

                          }
 
                      });
                      	}, 600);
                      
                          //for (var i = 0; i < getchat.length - 1; i++) {
                          var uu;
                          var location2;
                          var location3;
                          var location4;
		window.setInterval(function(){
		uu = getchat[0]
		location2 = parseInt(obj[0]);
		location3 = location2 + 185;
		location4 = location3.toString();
		console.log("uu", location4);
		}, 600);
		
const foo = () => {
this.add.text(location4,328, uu, { fontSize: '24px' });
}

		window.setInterval(function(){
foo();
		}, 600);


			

//}

           
           var object = await this.third.load.gltf(skin)
          ///this.third.load.gltf('/assets/glb/box_man.glb').then(object => {
            const man = object.scene.children[0]

            this.man = new ExtendedObject3D()
            this.man.name = 'man'
            this.man.rotateY(Math.PI + 0.1) // a hack
            this.man.add(man)
            this.man.rotation.set(0, Math.PI * 1.5, 0)
            //console.log("uzstada", vertibasx, vertibasy, vertibasx);
            
            console.log("iteracija", i);
            		//if(vertibasx !== null && vertibasy !== null && vertibasz !== null){
			//let verx = vertibasx[i];
			//let very = vertibasy[i];
			//let verz = vertibasz[i];
			
			
//console.log("shitais?", verx);
//console.log("2shitais?", very);
//console.log("3shitais?", verz);


					if(vertibasx && vertibasy && vertibasz){
			            this.man.position.set(vertibasx, vertibasy, vertibasz)
					} else {
									            this.man.position.set(754.2014, 1000, -205.63472)
					}
		
		//} else {
		//let verx = 754.2014;
		//let very = 1000;
		//let verz = -205.63472;
		
		            //this.man.position.set(verx, very, verz)

		//}
            //this.man.position.set(59, 0, 79)

            // add shadow
            this.man.traverse(child => {
              if (child.isMesh) {
                child.castShadow = child.receiveShadow = true
                // https://discourse.threejs.org/t/cant-export-material-from-blender-gltf/12258
                child.material.roughness = 1
                child.material.metalness = 0
              }
            })

            /**
             * Animations
             */
            this.third.animationMixers.add(this.man.animation.mixer)
            object.animations.forEach(animation => {
              if (animation.name) {
                this.man.animation.add(animation.name, animation)
              }
            })
            this.man.animation.play('idle')

            /**
             * Add the player to the scene with a body
             */
            this.third.add.existing(this.man)
            this.third.physics.add.existing(this.man, {
              shape: 'sphere',
              radius: 0.25,
              width: 0.5,
              offset: { y: -0.25 }
            })
            this.man.body.setFriction(0.8)
            this.man.body.setAngularFactor(0, 0, 0)

            // https://docs.panda3d.org/1.10/python/programming/physics/bullet/ccd
            this.man.body.setCcdMotionThreshold(1e-7)
            this.man.body.setCcdSweptSphereRadius(0.25)

            /**
             * Add 3rd Person Controls
             */
            this.controls = new ThirdPersonControls(this.third.camera, this.man, {
              offset: new THREE.Vector3(0, 1, 0),
              targetRadius: 3
            })
            // set initial view to 90 deg theta
            this.controls.theta = 90

            /**
             * Add Pointer Lock and Pointer Drag
             */
            if (!isTouchDevice) {
              let pl = new PointerLock(this.game.canvas)
              let pd = new PointerDrag(this.game.canvas)
              pd.onMove(delta => {
                if (pl.isLocked()) {
                  this.moveTop = -delta.y
                  this.moveRight = delta.x
                }
              })
            }
         // })

          /**
           * Add Keys
           */     
           
                	
 

          /**
           * Add joystick
           */
          if (isTouchDevice) {
            const joystick = new JoyStick()
            const axis = joystick.add.axis({
              styles: { left: 35, bottom: 35, size: 100 }
            })
            axis.onMove(event => {
              /**
               * Update Camera
               */
              const { top, right } = event
              this.moveTop = top * 3
              this.moveRight = right * 3
            })
            const buttonA = joystick.add.button({
              letter: 'A',
              styles: { right: 35, bottom: 110, size: 80 }
            })
            buttonA.onClick(() => this.jump())
            const buttonB = joystick.add.button({
              letter: 'B',
              styles: { right: 110, bottom: 35, size: 80 }
            })
            buttonB.onClick(() => (this.move = true))
            buttonB.onRelease(() => (this.move = false))
          }
        }

}
        jump() {
          if (!this.man || !this.canJump) return
          this.canJump = false
          this.man.animation.play('jump_running', 500, false)
          this.time.addEvent({
            delay: 650,
            callback: () => {
              this.canJump = true
              this.man.animation.play('idle')
            }
          })
          this.man.body.applyForceY(6)
        }

        update(time, delta) {
			

		
   this.keys = {
        
            a: this.input.keyboard.addKey('a'),
            w: this.input.keyboard.addKey('w'),
            d: this.input.keyboard.addKey('d'),
            s: this.input.keyboard.addKey('s'),
            space: this.input.keyboard.addKey(32)
          } 


if(choicef === 1) {
		   this.keys = {
        
            a: this.input.keyboard.addKey('a'),
            w: this.input.keyboard.addKey('w'),
            d: this.input.keyboard.addKey('d'),
            s: this.input.keyboard.addKey('s'),
            space: this.input.keyboard.addKey(32)
          } 
          }
          
if(choicef === 2){
this.input.keyboard.removeCapture('W,S,A,D');
this.input.keyboard.removeCapture([ 32 ]);

	  }


var area = document.getElementById('textarea');
area.addEventListener('click', (e) => {
 //alert("uzlieku pa virsu");
 choicef = 2;
});


 
var elem = document.getElementById('enable3d-phaser-canvas');
elem.addEventListener('click', (e) => {
	console.log("uzlieku pa virsu");

 choicef = 1;
});





area.addEventListener('keyup', (e) => {
if (e.keyCode === 13) {
    // Cancel the default action, if needed
    e.preventDefault();
    // Trigger the button element with a click
       var textarea = document.getElementById('textarea').value;
   	//avar groupidTRIM = document.getElementById("groupchatID").innerHTML;
    //var groupid = "grupa";	
	//alert(111);

//alert(111);

var username;
 $.ajax({
                          type: "GET",
                          async: false,
                          url: 'getusername.php',
                          data: {},
                          success: function (data) {
                                               username = data;

                          }
 
                      });
                      
                      var kopadata = username + " " + textarea;
                      
                      //console.log(kopadata);
                      
                      
if(textarea){
    $.ajax({
      type: "post",
      url: "groupchatfunction.php",
      data: {
      	textarea: textarea
      },
      cache: false,
      success: function(html) {
			           
			           //izmēģinam ievietot kastīti ja aizsūtas ziņa
			          // this.third.physics.add.box({ y: 10, x: 754.2014 }, { lambert: { color: 'red' } })
			
			
			/// tekstu ieposto datubāzē , izmaina globālo masīvu ar tekstu un tā īpašnieku
			/// vēlāk globālo masīvu zīmē gluži kā čarakteru iekš update funkcijas, iekļauj sarakstā visas ziņas
			// un uzzīmē thought buble virs čaraktera galvas ar iedomāto tekstu
			var kopadata2 = kopadata;
			
                      var doit = textbubble.push(kopadata2);
		 //var messageelements = '<div class="msg_a"><span data-tooltip="now" data-tooltip-position="bottom">' + textarea + '</span></div><br>';


//$( "#outputmessages" ).append(messageelements);


		//window.setTimeout(function(){
		//var elem = document.getElementById('msg_body');
		//elem.scrollTop = elem.scrollHeight;
		//}, 1200);
		
		
      }



    });
}
    
           		document.getElementById('textarea').value = '';


}
});





		//for (var i = 0; i < textbubble.length; i++) {
				//alert("globalais masivs", textbubble);

		//}









			 
			 
          if (this.man && this.man.body) {
            /**
             * Update Controls
             */
            this.controls.update(this.moveRight * 2, -this.moveTop * 2)
            if (!isTouchDevice) this.moveRight = this.moveTop = 0
            /**
             * Player Turn
             */

                      
                     
            
       
		//console.log("globals mainigais speed", speed);
		
		
            const v3 = new THREE.Vector3()

            const rotation = this.third.camera.getWorldDirection(v3)
            

            var rotati = []; 
                      $.ajax({
                          type: "GET",
                          async: false,
                          url: 'getrotation.php',
                          data: {},
                          success: function (data) {
                                                rotati = data.split("*").map(String);
                          }
 
                      });
                 

		  
		  
            const theta = Math.atan2(rotation.x, rotation.z)
            const rotationMan = this.man.getWorldDirection(v3)
            for (var i = 0; i < rotati.length - 1; i++) {
              let rotatine = rotati[i];  
								//console.log(rotatine);

				if(rotatine){
            const thetaMan = Math.atan2(rotationMan.x, rotationMan.z)
              $.post(
                          "postrotation.php", {
                              rotation: thetaMan
                          },
                          function (data) {
								//console.log("rotacija", thetaMan);
                              //console.log("izsaukta", v3);
                          }
                      );
                      
                      this.man.body.setAngularVelocityY(0)

            const l = Math.abs(theta - thetaMan)
		
            let rotationSpeed = isTouchDevice ? 2 : 4
            let d = Math.PI / 24

            if (l > d) {
              if (l > Math.PI - d) rotationSpeed *= -1
              if (theta < thetaMan) rotationSpeed *= -1
              this.man.body.setAngularVelocityY(rotationSpeed)
            }
            
            
			 } else {
			 const thetaMan = rotatine;
			 
			   $.post(
                          "postrotation.php", {
                              rotation: thetaMan
                          },
                          function (data) {
								//console.log("rotacija", thetaMan);
                              //console.log("izsaukta", v3);
                          }
                      );
			 
		
           
				  
                      
                      
            this.man.body.setAngularVelocityY(0)

            const l = Math.abs(theta - thetaMan)
		
            let rotationSpeed = isTouchDevice ? 2 : 4
            let d = Math.PI / 24

            if (l > d) {
              if (l > Math.PI - d) rotationSpeed *= -1
              if (theta < thetaMan) rotationSpeed *= -1
              this.man.body.setAngularVelocityY(rotationSpeed)
            }
            
		}
			 }



            /**
             * Player Move
             */
            
            
             
            if (this.keys.w.isDown || this.move) {
              if (this.man.animation.current === 'idle' && this.canJump) this.man.animation.play('run')
					  $.post(
                          "postanimation.php", {
                              animation: this.man.animation.current
                          },
                          function (data) {
								//console.log("viens", x);
                              //console.log("izsaukta", v3);
                          }
                      );
                      
                      
 const speed = [];
              var getspeed = []; 
                      $.ajax({
                          type: "GET",
                          async: false,
                          url: 'getspeed.php',
                          data: {},
                          success: function (data) {
                                                getspeed = data.split("*").map(String);
									//console.log("getsp", getspeed);
                          }
 
                      });
						  
              for (var i = 0; i < getspeed.length - 1; i++) {
				let getsp = getspeed[i];  
				//console.log("speed", getsp);
                      speed.push(getsp);
		}
		
							              				//console.log("speed.length", speed);
		
		
            const v3 = new THREE.Vector3()

            

            var rotati = []; 
                      $.ajax({
                          type: "GET",
                          async: false,
                          url: 'getrotation.php',
                          data: {},
                          success: function (data) {
                                                rotati = data.split("*").map(String);

                          }
 
                      });
			console.log("rotāciju masīvs", rotati);
			
			
			
			
			
		if(rotati){
		
		for (var i = 0; i < rotati.length; i++) {
		
				const rotation = rotati[i];
				
				//

		}	
		
		} else {
		             const rotation = this.third.camera.getWorldDirection(v3)

		}
		
		
		console.log("rotation", rotation);
		
		
		
		
		  	  
            const theta = Math.atan2(rotation.x, rotation.z)
            const rotationMan = this.man.getWorldDirection(v3)



//console.log("globals mainigais speed", speed);
//console.log("theta", theta);

                for (var i = 0; i < speed.length; i++) {
                
                
                
			                //console.log("xT", Math.sin(theta));

			let speedi = parseInt(speed[i]);
		//console.log("spee",typeof(parseInt(speedi)));
		
			//console.log("speed array2", speedi);
			                //console.log("xT2", Math.sin(theta));

              const x = Math.sin(theta) * 4,
                y = this.man.body.velocity.y,
                z = Math.cos(theta) * 4
                
                console.log("y mainas randomā", y);

                var obj2 = []; 
                      $.ajax({
                          type: "GET",
                          async: false,
                          url: 'getlocation.php',
                          data: {},
                          success: function (data) {
                                                obj2 = data.split("*").map(String);

                          }
 
                      });
            


  			 //console.log("obj2", obj2);
  			 
			 let vertibasx = obj2.slice(0,1);
			 let vertibasy = obj2.slice(1,2);
			 let vertibasz = obj2.slice(2,3);
                
                
          
			      let xv = parseInt(vertibasx[i]) + x;

			  
			      

			  
			      let zv = parseInt(vertibasz[i]) + z;

			  

                
                //nepareizā lokācija
                
                if(xv){
           //$.post(
                          //"postlocation.php", {
                              //x: xv,
                              //y: 0,
                             //z: zv,
                              
                          //},
                          //function (data) {
								////console.log("viens", x);
                              ////console.log("izsaukta", v3);
                          //}
                      //);
				  
				  
              this.man.body.setVelocity(x, y, z)
		  //}
	  }
  }
		  
		  
		  
            } else {
				
				            const v3 = new THREE.Vector3()

			const rotation = this.third.camera.getWorldDirection(v3)
            const theta = Math.atan2(rotation.x, rotation.z)
            const rotationMan = this.man.getWorldDirection(v3)



				 const x = Math.sin(theta) * 4,
                y = this.man.body.velocity.y,
                z = Math.cos(theta) * 4
                
				
				
				var obj2 = []; 
                      $.ajax({
                          type: "GET",
                          async: false,
                          url: 'getlocation.php',
                          data: {},
                          success: function (data) {
                                                obj2 = data.split("*").map(String);

                          }
 
                      });
            


  			 //console.log("obj2", obj2);
  			 
			 let vertibasx = obj2.slice(0,1);
			 let vertibasy = obj2.slice(1,2);
			 let vertibasz = obj2.slice(2,3);
                
                
          
			      let xv = parseInt(vertibasx[i]) + x;

			  
			      

			  
			      let zv = parseInt(vertibasz[i]) + z;

			  

                
                //nepareizā lokācija
                
                if(xv){
           //$.post(
                          //"postlocation.php", {
                              //x: xv,
                              //y: 0,
                             //z: zv,
                              
                          //},
                          //function (data) {
								////console.log("viens", x);
                              ////console.log("izsaukta", v3);
                          //}
                      //);
				  }
				
				
				
				
				
				
				
				//šeit jābūt kodam kas updeitos koordinātes ja nespiež nevienu pogu bet papriekšu custom rotācija
				
				
              if (this.man.animation.current === 'run' && this.canJump) this.man.animation.play('idle')
              					  $.post(
                          "postanimation.php", {
                              animation: this.man.animation.current
                          },
                          function (data) {
								//console.log("viens", x);
                              //console.log("izsaukta", v3);
                          }
                      );
            }

            /**
             * Player Jump
             */
            if (this.keys.space.isDown && this.canJump) {
              this.jump()
            }
          }
        }
      }



	
	
	
      const config = {
        type: Phaser.WEBGL,
        transparent: true,
        scale: {
          mode: Phaser.Scale.FIT,
          autoCenter: Phaser.Scale.CENTER_BOTH,
          width: window.innerWidth * Math.max(1, window.devicePixelRatio / 2),
          height: window.innerHeight * Math.max(1, window.devicePixelRatio / 2)
        },
        scene: [MainScene],
        ...Canvas({ antialias: false })
      }

      window.addEventListener('load', () => {
        enable3d(() => new Phaser.Game(config)).withPhysics('/lib/ammo/kripken')
      })
    </script>
  </body>
</html>
© 2022 GitHub, Inc.
Terms
Privacy
Security
Status
Docs
Contact GitHub
Pricing
API
Training
Blog
About
