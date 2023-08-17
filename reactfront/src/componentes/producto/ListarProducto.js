import React, { useEffect, useState } from 'react'
import axios from 'axios'
import { DataTable } from 'primereact/datatable';
import { Column } from 'primereact/column';

import { Link } from 'react-router-dom'
import { Button } from 'primereact/button';
import '../../App.css';

const endpoint = 'http://localhost:8000/api'

const ListarProducto = () => {
    const [productos, setProductos] = useState([])

    const paginatorLeft = <Button type="button" icon="pi pi-refresh" className="p-button-text" />;
    const paginatorRight = <Button type="button" icon="pi pi-cloud" className="p-button-text" />;

    useEffect(() => {
        getTodaslosProductos()
    }, [])

    const getTodaslosProductos = async () => {
        const respuesta = await axios.get(`${endpoint}/productos`)
        setProductos(respuesta.data)
    }

    const eliminarProducto = async (id) => {
        await axios.delete(`${endpoint}/producto/${id}`)
        getTodaslosProductos()
    }

    const accionesBodyTemplate = (rowData) => {
        return <div>
            <Link to={`/producto/edit/${rowData.id}`}><Button type="button" label="Editar" className="p-button-sm p-button-warning"/></Link>
            <Button onClick={() => eliminarProducto(rowData.id)} label="Borrar" className="p-button-sm p-button-danger"/>
        </div>;
    }

    return (
        <div className='container'>
            <div className="g-grid gap-2">
                <Link to="/producto/create"><Button label="Nuevo" className="p-button-sm p-button-success"/></Link>
                <Link to="/"><Button label="Atras" className="p-button-sm p-button-warning"/></Link>
            </div>
            <div className="card">
                <DataTable value={productos} paginator responsiveLayout="scroll" paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
                    currentPageReportTemplate="Mostrando {first} a {last} de {totalRecords}" rows={10} rowsPerPageOptions={[10,20,50]}
                    paginatorLeft={paginatorLeft} paginatorRight={paginatorRight}>
                    <Column field="id" header="ID"></Column>
                    <Column field="nombreProducto" header="Nombre"></Column>
                    <Column field="imagenProducto" header="Imagen"></Column>
                    <Column field="visibleProducto" header="Visible"></Column>
                    <Column field="idCategoria" header="Categoria"></Column>
                    <Column header="Acciones" body={accionesBodyTemplate}></Column>
                </DataTable>
            </div>
        </div>
    )
}

export default ListarProducto
