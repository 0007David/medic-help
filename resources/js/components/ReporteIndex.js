import React, { Component} from 'react';
import ReactDOM from 'react-dom';
import ReporteCondiciones from './ReporteCondiciones';

export default class ReporteIndex extends Component {

   constructor(props) {
     super(props);
     this.state = {
        datos:[            ///datos de los tablas y sus atributos a mostrar
            // {tabla:{nombre:"persona",as:'Propietario'}, atributos:[{atributo:"persona.ci",nombre:"CI"},{atributo:"persona.nombre",nombre:'Nombre'},{atributo:"persona.email",nombre:'Email'},{atributo:"persona.direccion",nombre:'Direccion'},{atributo:"persona.telefono",nombre:'Telefono'}],union:[], condiciones:[{atributo:'persona.estado',operador:"=",condicion:"1"},{atributo:'persona.tipo',operador:"=",condicion:"propietario"}]},
            // {tabla:{nombre:"persona",as:'Conductor'},atributos:[{atributo:"persona.ci",nombre:"CI"},{atributo:"persona.nombre",nombre:'Nombre'},{atributo:"persona.email",nombre:'Email'},{atributo:"persona.direccion",nombre:'Direccion'},{atributo:"persona.telefono",nombre:'Telefono'}],union:[], condiciones:[{atributo:'persona.estado',operador:"=",condicion:"1"},{atributo:'persona.tipo',operador:"=",condicion:"conductor"}]},
            // {tabla:{nombre:"marcacion",as:'Marcacion'},atributos:[{atributo:"marcacion.entrada",nombre:'Entrada'},{atributo:"marcacion.salida",nombre:'Salida'},{atributo:"asignacion.fecha",nombre:'Fecha'},{atributo:"persona.nombre",nombre:'Conductor'},{atributo:"asignacion.id",nombre:'Id asignacion'}],union:[{tabla:"asignacion",primero:"marcacion.idA",segundo:'asignacion.id'},{tabla:"detalle_conductor_microbus",primero:"asignacion.idDCM",segundo:'detalle_conductor_microbus.id'},{tabla:"persona",primero:"detalle_conductor_microbus.idC",segundo:'persona.id'}], condiciones:[]},
            // {tabla:{nombre:"asignacion",as:'Asignacion'},atributos:[{atributo:"asignacion.id",nombre:'Id'},{atributo:"asignacion.hora_salida",nombre:'Hora salida'},{atributo:"asignacion.fecha",nombre:'Fecha'},{atributo:"ruta.descripcion",nombre:'Ruta'},{atributo:"persona.nombre",nombre:'Conductor'}],union:[{tabla:'ruta',primero:'asignacion.idR',segundo:'ruta.id'}, {tabla:"detalle_conductor_microbus",primero:"asignacion.idDCM",segundo:'detalle_conductor_microbus.id'},{tabla:"persona",primero:"detalle_conductor_microbus.idC",segundo:'persona.id'}], condiciones:[{atributo:'asignacion.estado',operador:"=",condicion:"1"}]},
            // {tabla:{nombre:"asignacion",as:'Asignaciones terminadas'},atributos:[{atributo:"asignacion.id",nombre:'Id'},{atributo:"asignacion.hora_salida",nombre:'Hora salida'},{atributo:"asignacion.fecha",nombre:'Fecha'},{atributo:"ruta.descripcion",nombre:'Ruta'},{atributo:"persona.nombre",nombre:'Conductor'}],union:[{tabla:'ruta',primero:'asignacion.idR',segundo:'ruta.id'}, {tabla:"detalle_conductor_microbus",primero:"asignacion.idDCM",segundo:'detalle_conductor_microbus.id'},{tabla:"persona",primero:"detalle_conductor_microbus.idC",segundo:'persona.id'}], condiciones:[{atributo:'asignacion.estado',operador:"=",condicion:"2"}]},
            // {tabla:{nombre:"detalle_asignacion",as:'Registros Puntos de control'},atributos:[{atributo:"detalle_asignacion.hora_llegada",nombre:'Hora llegada'},{atributo:"detalle_asignacion.numero_vuelta",nombre:'Numero vuelta'},{atributo:"asignacion.fecha",nombre:'Fecha'},{atributo:"punto_control.nombre",nombre:'Punto control'},{atributo:"persona.nombre",nombre:'Conductor'},{atributo:"asignacion.id",nombre:'Id asignacion'}],union:[{tabla:'punto_control',primero:'detalle_asignacion.idPC',segundo:'punto_control.id'},{tabla:"asignacion",primero:"detalle_asignacion.idA",segundo:'asignacion.id'}, {tabla:"detalle_conductor_microbus",primero:"asignacion.idDCM",segundo:'detalle_conductor_microbus.id'},{tabla:"persona",primero:"detalle_conductor_microbus.idC",segundo:'persona.id'}], condiciones:[]},
            {tabla:{nombre:"users",as:'Usurio'}, atributos:[{atributo:"users.id",nombre:"ID"},{atributo:"users.name",nombre:'Nombre'},{atributo:"users.email",nombre:'Email'}],union:[], condiciones:[]},
        ],
        itemSeleccionados:{},   //los atributos seleccionados ya sea true o false
        nombre:null,  //el nommbre(tabla) seleccionado
        union:null,
        condiciones:null
        // $datos=["color"=>["azul","verde","rosado"],"verdura"=>["brocolo","espinaca","perejil"],"ropa"=>["short","media","pantalon"]],
     };
   }

   mostrar(e){
        const index=e.target.value;
        this.setState({
            nombre:this.state.datos[index].tabla.nombre,
            itemSeleccionados:{},//para reiniciar al selecionar de nuevo
            union:this.state.datos[index].union,
            condiciones:this.state.datos[index].condiciones
        });
   }

   getAtributos(nombre){
       const data=this.state.datos;
       for(var i=0; i<data.length;i++){
           if(data[i].tabla.nombre==nombre){
               return data[i].atributos;
           }
       }
       return [];
 
   }

   getAtributosSeleccionados(){
        const atributos=this.getAtributos(this.state.nombre);
        const newAtributos=[];
        for (let index = 0; index < atributos.length; index++) {
            if(this.state.itemSeleccionados[atributos[index].nombre]==true){
                newAtributos.push(atributos[index]);
            }            
        }
        return newAtributos;
    }

   itemSeleccionado(e,atributo){
       var itemSeleccionados=this.state.itemSeleccionados;
       var isSeleccionado=e.target.checked;
       itemSeleccionados[atributo.nombre]=isSeleccionado;
       this.setState({
        itemSeleccionados:itemSeleccionados
       });
       console.log(isSeleccionado,atributo.nombre,itemSeleccionados);
   }

  render() {
      const atributos=this.getAtributosSeleccionados();
    return (               
        <div className="card card-body mb-3">
            <h2 className="mb-3">REPORTE PERSONALIZADO</h2>
            <select className="col-sm-4  form-control" defaultValue="default" onChange={this.mostrar.bind(this)}>
                {
                    <option value="default" disabled={true}>Seleccione</option>
                }
                {   
                    this.state.datos.map((item,index)=>{
                        return <option key={item.tabla.as} value={index}>{item.tabla.as}</option>
                    })
                }
   
            </select>

            <div className="campo mt-3">
                {
                    this.state.nombre==null?<h4 className="text-secondary">Sin seleccionar</h4>:
                    <ul className="d-flex flex-row flex-wrap">
                    
                    {
                        this.getAtributos(this.state.nombre).map((atributo,index)=>
                        <li key={index}>
                            <div className="custom-control custom-checkbox">
                                <input type="checkbox" className="custom-control-input" id={atributo.nombre} checked={this.state.itemSeleccionados[atributo.nombre]?true:false } value={atributo.nombre} onChange={(e)=>this.itemSeleccionado(e,atributo)} />
                                <label className="custom-control-label" htmlFor={atributo.nombre}>{atributo.nombre}</label>
                            </div>
                        </li>
                        )

                    }
                
                    </ul>      
                }
            
            </div>
            {
                this.getAtributosSeleccionados().length>0? <ReporteCondiciones atributos={atributos} nombre={this.state.nombre} union={this.state.union} condiciones={this.state.condiciones}/>:null
            }
           
        </div>
    )
  }
}

if (document.getElementById('reporte')) {
    ReactDOM.render(<ReporteIndex />, document.getElementById('reporte'));
}
