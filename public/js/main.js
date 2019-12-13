
// Evento Click en el Boton Editar Rol

let tabla = document.getElementById('tablaRol');

let cuandoClickBotonEditarRol = (event) => {
	let click = event.target,btnSelecto;

	if(click.tagName == 'BUTTON' || click.tagName == 'I'){
		click.tagName == 'I' ? btnSelecto = click.parentElement : btnSelecto = click;
		if(btnSelecto.classList.contains('btnEditRol')){
			
			let id = btnSelecto.getAttribute('id_rol');
			var datos = new FormData();
			datos.append('id', id);
			$.ajax({
				headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				type: "post",
				url: "/ajaxSolicitud",
				data: datos,
            	dataType: 'JSON',
				cache: false,
				contentType: true,
				processData: false,
				success: function(respuesta){
					respuesta.forEach(element => {
						if(element.id  == id){
							let inputId = document.getElementById('idRol');
							inputId.value = element.id;
							let inputNombre = document.getElementById('nombreRol');
							inputNombre.value = element.nombre;
						}
						
					});
						
				}
			})
		}else{
            console.log('no click');
        }

	}

}

if(tabla){
	tabla.addEventListener('click', cuandoClickBotonEditarRol);
}
// CAMBIANDO TEMA
$("#nombreTema").change( (e)=>{
	let nombreTema = $("#nombreTema option:selected").val();
	let nav, sidebar,logoA;
	nav = document.getElementsByClassName('main-header');
	sidebar = document.getElementsByClassName('main-sidebar');
	logoA = document.getElementById('logo');
	switch (nombreTema){
		case 'LIGHT':
			cambiarTema(nav[0],logoA,sidebar[0]);
			nav[0].classList.add('navbar-light');
			sidebar[0].classList.add('sidebar-light-primary');	
			logoA.classList.add('navbar-light');

			break;
		case 'BLUE':
			cambiarTema(nav[0],logoA,sidebar[0]);
			nav[0].classList.add('navbar-dark','navbar-primary');
			sidebar[0].classList.add('sidebar-light-primary');	
			logoA.classList.add('navbar-primary');

			break;
		case 'DARK DRACULA':
			cambiarTema(nav[0],logoA,sidebar[0]);
			nav[0].classList.add('navbar-dark');
			sidebar[0].classList.add('sidebar-dark-primary');	
			logoA.classList.add('navbar-dark');
			break;
		case 'GREEN':
			cambiarTema(nav[0],logoA,sidebar[0]);
			nav[0].classList.add('navbar-dark','navbar-success');
			sidebar[0].classList.add('sidebar-light-success');	
			logoA.classList.add('navbar-success');
			break;
		case 'GRAY':
			cambiarTema(nav[0],logoA,sidebar[0]);
			nav[0].classList.add('navbar-dark','navbar-gray');
			sidebar[0].classList.add('sidebar-light-teal');	
			logoA.classList.add('navbar-gray');
			break;
	
	}
});
$('#fuente').change(()=>{
	let fuente = $("#fuente option:selected").val(); let body;
	console.log(fuente)
	body = document.getElementsByTagName('body');
	if(fuente != "" && fuente != "default"){
		body[0].style.cssText = "font-family: "+ fuente+';';
	}else{
		body[0].style.cssText = 'font-family: "Source Sans Pro",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol';
	}

})
// Cuando Seleccione un Nro de Fuente
$('#fontSize').change(()=>{
	let nroFont = $("#fontSize option:selected").val(); 
	let body = document.getElementsByTagName('body');
	
	console.log(nroFont)
	switch (nroFont) {
		case '8':
			body[0].style.cssText = "font-size: 1rem;";
		   console.log(body[0])
		   
		   break;
		case '12':
			body[0].style.cssText = "font-size: 1.1rem;";
				console.log(body[0])
		
			break;
		case '16':

				body[0].style.cssText = "font-size: 1.2rem;";
					console.log(body[0])
			break;
		case '24':

				body[0].style.cssText = "font-size: 1.3rem;";
				console.log(body[0])
			break;
		
   }
   

})

function cambiarTema(nav,logoA,sidebar){

	while(true)
		if(nav.classList.length > 0){nav.classList.forEach(element => nav.classList.remove(element))}else{break}
	nav.classList.add('main-header', 'navbar', 'navbar-expand');

	while(true)
		if(logoA.classList.length > 0){logoA.classList.forEach(element => {logoA.classList.remove(element)})}else{break}
	logoA.classList.add('brand-link');

	while(true) 
		if(sidebar.classList.length > 0) {sidebar.classList.forEach(element => sidebar.classList.remove(element))}else{ break}
	sidebar.classList.add('main-sidebar', 'elevation-4')
}


//BOTON DE SALIR
let ulSalir = document.getElementsByTagName('nav');
// $("#ulSalir").on('click','#liSalir', (e)=>{
// 	e.preventDefault();
// 	console.log('salir');
// // let liSalir = document.getElementById('liSalir');
// // divSalir
// });
// let cuandoClickBotonSalir = (e)=>{
// console.log(e)

// }
// if(ulSalir){

// 	ulSalir[0].addEventListener('click', cuandoClickBotonSalir);
// }

window.onload =(()=>{
	
});

function yourFunctionName (e){
	var misCabeceras = new Headers({'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 'Content-Type': 'application/json'});
	fetch('/fetchTema', {
	 method: 'get',
	 mode: 'no-cors',
	 headers: misCabeceras,

   }).then(res => res.json())
   .catch(error => console.error('Error:', error))
   .then(response => {
	   if(response.status){
		   let body = document.getElementsByTagName('body');
		   switch (response.data.fontSize) {
				case 8:
					body[0].style.cssText = "font-size: 1rem;";
				   break;
				case 12:
					body[0].style.cssText = "font-size: 1.1rem;";
					break;
				case 16:
						body[0].style.cssText = "font-size: 1.2rem;";
					break;
				case 24:
						body[0].style.cssText = "font-size: 1.3rem;";
					break;
		   }
		   if(response.data.fuente == "default"){
			body[0].style.cssText = "font-family: "+ 'font-family: "Source Sans Pro",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol;';
		   }else{body[0].style.cssText = "font-family: "+ response.data.fuente+';';}
		   
		
	   }
	   
	})
	
}

if(window.attachEvent) {
	window.attachEvent('onload', ()=> console.log('load 1'));
	
} else {
    if(window.onload) {
        var curronload = window.onload;
        var newonload = function(evt) {
            curronload(evt);
            yourFunctionName(evt);
        };
        window.onload = newonload;
    } else {
        window.onload = yourFunctionName;
    }
}

