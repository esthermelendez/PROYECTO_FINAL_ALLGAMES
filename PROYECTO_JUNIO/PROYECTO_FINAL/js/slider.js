/**
			* Array con las imagenes y enlaces que se iran mostrando en la web
			*/
			var imagenes=new Array(
				['imagenes/img1.jpg'],
				['imagenes/img2.jpg'],
				['imagenes/img3.jpg'],
				['imagenes/img4.jpg'],
				['imagenes/img5.jpg'],
				['imagenes/img6.jpg'],
				['imagenes/img7.jpg']
			);
		
			/**
			* Funcion para cambiar la imagen
			*/
			function rotarImagenes()
			{
				// obtenemos un numero aleatorio entre 0 y la cantidad de imagenes que hay
				var index=Math.floor((Math.random()*imagenes.length));
		
				// cambiamos la imagen y la url
				document.getElementById("imagenMain").src=imagenes[index][0];
			}

				/**
			* Función que se ejecuta una vez cargada la página
			*/
			onload=function()
			{
				// Cargamos una imagen aleatoria
				rotarImagenes();
		
				// Indicamos que cada 5 segundos cambie la imagen
				setInterval(rotarImagenes,5000);
			}
