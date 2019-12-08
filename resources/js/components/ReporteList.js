import React, { Component } from 'react';

export default class ReporteList extends Component {

    exporttoxml(){  
        const titulo="reporte "+this.props.nombre;
        $("#responsive").tabletoxml({  
            rootnode: "Data",  
            childnode: "Column",  
            filename: titulo  
        });  
        
    } 

    exporttoHTML(){
        const atributos=this.getAtributos();
        const nombre=this.props.nombre;
        const titulo="Reporte de "+nombre;
        const dt=$('#responsive').DataTable();
            $.fn.DataTable.Export.html(dt, {
                filename:  titulo,
                title: titulo,
                message: 'Lista de '+nombre,
                header: atributos,
                fields: Object.keys(atributos)
            });

    }

    getAtributos(){
        const atributos=this.props.atributos; const nuevo=['Nro.'];
        for (let index = 0; index < atributos.length; index++) {
            nuevo.push(atributos[index].nombre);
        }
        return nuevo;
    }

    exporttoWord(){
        const atributos=this.getAtributos();
        const nombre=this.props.nombre;
        const titulo="Reporte de "+nombre;
        const dt=$('#responsive').DataTable();
            $.fn.DataTable.Export.word(dt, {
                filename:  titulo,
                title: titulo,
                message: 'Lista de '+nombre,
                header: atributos,
                fields: Object.keys(atributos)
            });

    }

  render() {
      const atributos=this.props.atributos;
      const data=this.props.data;
    return (
      <div className="table-responsive">
          <h2 className="mt-5">Listado de {this.props.nombre}</h2>
          <div className="btn-group mb-1" role="group" aria-label="Basic example">
            <button id="word"  onClick={()=>this.exporttoWord()} className="btn btn-secondary" type="button">Word</button>
            <button onClick={()=>this.exporttoHTML()}   className="btn btn-secondary" type="button">HTML</button>
            <button onClick={()=>this.exporttoxml()}  className="btn btn-secondary" type="button">XML</button>
         </div>
        
            <table id="responsive" className="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>Nro.</th>
                       {
                            atributos.map(atributo=>(
                                <th key={atributo.nombre}>{atributo.nombre}</th>
                            ))
                        }
                    </tr>
                </thead>
                <tbody>
                    {
                        data.map((data,index)=>(
                            <tr key={index}>
                            <td>{index+1}</td>
                             {
                                atributos.map(atributo=>(
                                    <td key={atributo.nombre}>{data[atributo.nombre]}</td>
                                ))
                             }      
                            </tr>
                        ))
                    }    
                </tbody>
            </table>
        
      </div>
    )
  }
}
