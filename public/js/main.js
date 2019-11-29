
// Evento Click en el Boton Editar Rol

let tabla = document.getElementById('tablaRol');

let cuandoClickBotonAddProductoNotaCompra = (event) => {
	let click = event.target,btnSelecto;

	if(click.tagName == 'BUTTON' || click.tagName == 'I'){
		click.tagName == 'I' ? btnSelecto = click.parentElement : btnSelecto = click;
		if(btnSelecto.classList.contains('btnEditRol')){
			
			let id = btnSelecto.getAttribute('id_rol');
			var datos = new FormData();
			datos.append('id', id);
			$.ajax({
				headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
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

	tabla.addEventListener('click', cuandoClickBotonAddProductoNotaCompra);
}

// Version con JQUERY
// $(".miTabla").on('click','.btnEditRol', (e)=>{
//     var id = $('.btnEditRol').attr('id_rol');
    

// 	console.log(id);
// 	console.log(e.target)
	
// 	var datos = new FormData();
//     datos.append('id', id);
// 	console.log(datos.get('id'))
// 	var data = {'id': id};
    
// 	$.ajax({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//         },
//         method: "POST",
// 		url: "/ajaxSolicitud",
// 		data: datos,
// 		cache: false,
//       	contentType: true,
//         processData: false,
//         dataType: 'json',
// 		success: function(respuesta){
// 			console.log(respuesta);
			
// 		}

// 	})

// });

// CAMBIANDO TEMA
$("#nombreTema").change( (e)=>{
	let nombreTema = $("#nombreTema option:selected").val();
	let nav, sidebar,logoA;
	nav = document.getElementsByClassName('main-header');
	sidebar = document.getElementsByClassName('main-sidebar');
	logoA = document.getElementById('logo');
	switch (nombreTema){
		case 'BLUE':
			cambiarTema(nav,logoA,sidebar);
			nav[0].classList.remove('navbar-light');
			nav[0].classList.remove('navbar-white');
			nav[0].classList.add('navbar-dark','navbar-primary');
			sidebar[0].classList.remove('sidebar-dark-primary');
			sidebar[0].classList.add('sidebar-light-primary');	
			logoA.classList.add('navbar-primary');

			break;
			case 'DARK DRACULA':
			cambiarTema(nav,logoA,sidebar);
			nav[0].classList.remove('navbar-light');
			nav[0].classList.remove('navbar-white');
			nav[0].classList.add('navbar-dark');
			sidebar[0].classList.remove('sidebar-dark-primary');
			sidebar[0].classList.add('sidebar-dark-primary');	
			logoA.classList.add('navbar-dark');
			break;
		default:
			console.log('default');
		
			break;
	}
})

function cambiarTema(nav,logoA,sidebar){
	console.log(nav);
	console.log(logoA);
	console.log(sidebar);
}

