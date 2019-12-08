import React, { Component } from 'react';
import Axios from 'axios';
import ReporteList from './ReporteList';
import { timingSafeEqual } from 'crypto';

export default class ReporteCondiciones extends Component {

    constructor(props) {
      super(props)
      this.state = {
         condiciones:{},  //obejeto que tendra como propiedad el nombre del atributo y como valor el array de las condiciones
         datos:[],  // los datos de la consulta para el reporte
         isGenerar:false , //si muestra el listado del reporte,
         ordenar:{ ///el orden del reporte
             atributo:"",
             orden:"asc",
         }
      };

    }

    eliminarCondicion(e,index,atributo){
       e.preventDefault();
       var condiciones = Object.assign({},this.state.condiciones); //copiando el objeto
       condiciones[atributo].splice(index,1)
       this.setState({
           condiciones:condiciones
       })
        console.log("eliminar",condiciones);
        
    }
    
    addCondicion(e,atributo){
        e.preventDefault();
        if(!this.state.condiciones[atributo]){
            this.state.condiciones[atributo]=[];
        }
        const condicion={
            operador:"",
            condicion:""
        }
        this.state.condiciones[atributo].push(condicion);
        this.setState({
         condiciones:  this.state.condiciones

        });
        console.log("addicionar",  this.state.condiciones)

    }

    valorCondicion(condicion){
        return  condicion.condicion;
    }

    entradaCondicion(e,index,atributo){
        var condicione=e.target.value;   //valor de la condicion
        var condiciones = Object.assign({},this.state.condiciones); //copiando el objeto
        var condicion=condiciones[atributo][index];                 //obteniendo el elemenento i de las condiciones
        condicion.condicion=condicione;                                 //reeplazando la condicion por la nueva entrada
        condiciones[atributo].splice(index,1,condicion);             //eliminado y addicionando el nuevo objeto
        this.setState({
            condiciones:condiciones                                  //actualizando
        });
        console.log("condicion",condiciones);

    }
    
    valorOperador(condicion){
        return condicion.operador;
    }

    entradaOperador(e,index,atributo){
        var operador=e.target.value;  //valor del operador
        var condiciones = Object.assign({},this.state.condiciones); //copiando el objeto
        var condicion=condiciones[atributo][index];                 //obteniendo el elemenento i de las condiciones
        condicion.operador=operador;                                 //reeplazando el operador por la nueva entrada
        condiciones[atributo].splice(index,1,condicion)             //eliminado y addicionando el nuevo objeto
        this.setState({
            condiciones:condiciones                                  //actualizando
        });
        console.log("operador",condiciones);

    }

    generarReporte(e){
        e.preventDefault();  //hace que no recargue la pagina => en algo bueno para probar su funcionamiento
        Axios.post('api/reporte',this.limpiar())
        .then(response=>{
            console.log("respueta",response);
            this.actulizarListaReporte();
            this.setState({
                datos:response.data
            });
            // this.actualizarDataTable(response.data);

        }).catch(error=>{
          console.log(error);
        });
        // console.log(this.state.condiciones)
        // console.log(this.props.atributos)
        console.log("datos consulta",this.limpiar());    
    }

    actulizarListaReporte(){
        this.setState({isGenerar:false}); //con esta lo elimino el componente del listado del reporte
        setTimeout(() => { /// y ahora lo muestro asi,ya que si no se espera un momento se renderea en el misma instancia y sale un ERROR
            this.setState({isGenerar:true});  
            this.datatable();   
        }, 100);
    }

    actualizarDataTable(data){
        $('#responsive').dataTable().fnDestroy();  //dataTable con minuscula sino no funciona fnDestroy
        this.setState({datos:data,isGenerar:true});
        this.datatable();   
    }
    

    datatable(){//'colvis' 
        console.log("keys",Object.keys(this.props.atributos));
        const atributos=this.props.atributos;
        const nombre=this.props.nombre;

        var titulo="Reporte de "+nombre;
        var dt= $('#responsive').DataTable({
            lengthChange: false,
            ordering: false,   //deshabilita el ordenado
            buttons: [ 
                {
                    extend: 'copy',
                    text: '<span class="fas fa-copy export"></span>'
                 },
                 {
                    extend: 'excel',
                    title:titulo,
                 },
                {
                    extend: 'csv',
                    title:titulo, 
                },
                 {
                    extend: 'pdf',
                    title:titulo,
                    customize: function(doc) {
                        doc.styles.title = {
                          color: 'black',
                          fontSize: '20',
                          background: '#f2f2f2',
                          alignment: 'center'
                        }   ;
                    }
                    
                 },
                {
                    extend: 'print',
                    text: '<span class="fas fa-print export"></span>',
                    title:titulo, 
                 }],
            language: {
               "decimal": "",
               "emptyTable": "No hay información",
               "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
               "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
               "infoFiltered": "(Filtrado de _MAX_ total entradas)",
               "infoPostFix": "",
               "thousands": ",",
               "lengthMenu": "Mostrar _MENU_ Entradas",
               "loadingRecords": "Cargando...",
               "processing": "Procesando...",
               "search": "Buscar:",
               "zeroRecords": "Sin resultados encontrados",
               "paginate": {
                   "first": "Primero",
                   "last": "Ultimo",
                   "next": "Siguiente",
                   "previous": "Anterior"
               }
           },
    
        });
        dt.buttons().container()
        .appendTo( '#responsive_wrapper .col-md-6:eq(0)' );
        // Export to Word Document
        // On element with id="btn-export" clicked
        // $('body').on('click', '#word', function(e) {
        //     $.fn.DataTable.Export.word(dt, {
        //         filename:  titulo,
        //         title: titulo,
        //         message: 'Lista de '+nombre,
        //         header: atributos,
        //         fields: Object.keys(atributos)
        //     });
        // });
    }

    limpiar(){/// agrega los atributos que no tienen condicion a un nuevo objeto y los que ya tienen, para asi tener todos los atributos seleccionados para hacer la consulta, ademas se le agrega una propiedad con el nombre de la tabla
        const atributos=this.props.atributos;
        const condiciones=this.state.condiciones;
        const newCandiciones={};
        
        const nombres={};
        for (let index = 0; index < atributos.length; index++) {
            nombres[atributos[index].atributo]=atributos[index].nombre;
            if(!condiciones[atributos[index].atributo]){
                newCandiciones[atributos[index].atributo]=[];
            }else{
                newCandiciones[atributos[index].atributo]=condiciones[atributos[index].atributo];
            }   
        }
        if(this.state.ordenar.atributo==""){ //si no se elige se toma el primero
            this.state.ordenar.atributo=this.props.atributos[0].atributo;
        }
        
        var tabla=this.props.nombre;
   
        const condicionesData=this.props.condiciones;
        for (let i = 0; i < condicionesData.length; i++) {
            nombres[condicionesData[i].atributo]=condicionesData[i].atributo;   // cada atributo tiene que tener un nombre asociado o si no habria un error
            newCandiciones[condicionesData[i].atributo]=[{operador:condicionesData[i].operador,condicion:condicionesData[i].condicion}];  
        }
      
        const datos={
            tabla:tabla,
            union:this.props.union,
            ordenar:this.state.ordenar,
            nombres:nombres
        };
        
        newCandiciones.datos=datos;
        return newCandiciones;
    }

    ordenarByAtributo(e){
        const atributoOrdenar=e.target.value;
        this.state.ordenar.atributo=atributoOrdenar;
        console.log(atributoOrdenar);
    }

    ordenarByOrden(e){
        const orden=e.target.value;
        this.state.ordenar.orden=orden;
        console.log(orden);
    }

  render() {
    const atributos=this.props.atributos;
    const condiciones=this.state.condiciones;
    const data=this.state.datos;
    return (
        <div className="col-12 mt-3 p-0">
            <h2 className="mb-3">Condiciones</h2>
            <form onSubmit={(e)=>this.generarReporte(e)}>
                {
                    atributos.map((atributo,index)=>(
                            
                    <div key={index} className="form-group">
                        <label htmlFor={atributo.nombre}>{atributo.nombre}:
                            <button type="submit" className="btn btn-primary btn-sm ml-2" onClick={(e)=>this.addCondicion(e,atributo.atributo)}>+</button>
                        </label>
                        <div className=" d-flex flex-row flex-wrap">
                        {   
                        condiciones[atributo.atributo] && condiciones[atributo.atributo].map((condicion,index)=>(
                                <div key={index} className="input-group col-12 col-sm-6 col-md-4 pl-0 mb-1">
                                    <input type="text" className="form-control" value={this.valorOperador(condicion)} onChange={(e)=>this.entradaOperador(e,index,atributo.atributo)} required/>
                                    <input type="text" className="form-control" value={this.valorCondicion(condicion)} onChange={(e)=>this.entradaCondicion(e,index,atributo.atributo)} required />
                                    <div className="input-group-append">
                                        <button type="submit" className="btn btn-danger" onClick={(e)=>this.eliminarCondicion(e,index,atributo.atributo)} >&times;</button>
                                    </div>
                                </div>
                            ))
                        }
                        </div>
                    </div>
          
                    ))
                }
                    <div className="form-group">
                        <label htmlFor="">Ordenar por: </label>
                       <div className="form-inline">
                            <select className="col-sm-4  form-control" defaultValue="default" onChange={(e)=>this.ordenarByAtributo(e)}>
                            {
                                <option value="default" disabled={true}>Seleccione campo</option>
                            }
                            {   
                                atributos.map((item)=>{
                                    return <option key={item.nombre} value={item.atributo}>{item.nombre}</option>
                                })
                            }
                            </select>
                            <select className="col-sm-4  form-control" defaultValue="default" onChange={(e)=>this.ordenarByOrden(e)}>
                                <option value="default" disabled={true}>Seleccione orden</option>
                                <option value="asc">Ascendente</option>
                                <option value="desc">Descendente</option>
                            </select>
                      </div>
                    </div>
        
                {
                    atributos.length>0?
                    <div className="d-flex justify-content-between mt-3">
                        <button  className="btn btn-primary" type="submit">Generar</button>
                        {/* <a className="btn btn-secondary" href="../personaje">Back</a> */}
                    </div>:null
                }

            </form>
            {
                this.state.isGenerar? <ReporteList atributos={atributos} data={data} nombre={this.props.nombre}/>:null
            }

        </div>
    )
  }
}


// Solucion para las Condiciones, los tipos de datos=>
// -text
// -fecha
// -numero
///   ->orderBy('name','desc')