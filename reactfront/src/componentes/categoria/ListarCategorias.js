import React, { useEffect, useState } from 'react'
import axios from 'axios'
import { DataTable } from 'primereact/datatable';
import { Column } from 'primereact/column';

import { Link } from 'react-router-dom'
import { Button } from 'primereact/button';

const endpoint = 'http://localhost:8000/api'

const ListarCategorias = () => {
    const [categorias, setCategorias] = useState([])

    // const navigate = useNavigate()

    useEffect(() => {
        getTodaslasCategorias()
    }, [])

    const getTodaslasCategorias = async () => {
        const respuesta = await axios.get(`${endpoint}/categorias`)
        setCategorias(respuesta.data)
    }

    const eliminarCategoria = async (id) => {
        await axios.delete(`${endpoint}/categoria/${id}`)
        getTodaslasCategorias()
    }

    const accionesBodyTemplate = (rowData) => {
        return <div>
            <Link to={`/categoria/edit/${rowData.id}`}><Button type="button" label="Editar" className="p-button-sm p-button-warning"/></Link>
            {/* <Button onClick={() => navigate(`/categoria/edit/${rowData.id}`)} label="Editar" className="p-button-sm p-button-danger"/> */}
            <Button onClick={() => eliminarCategoria(rowData.id)} label="Borrar" className="p-button-sm p-button-danger"/>
        </div>;
    }

    return (
        <div className='container'>
            <div className="g-grid gap-2">
                <Link to="/categoria/create"><Button label="Crear" className="p-button-sm p-button-success"/></Link>
                <Link to="/"><Button label="Atras" className="p-button-sm p-button-warning"/></Link>
            </div>
            <div className="card">
                <DataTable value={categorias} responsiveLayout="scroll">
                    <Column field="id" header="ID"></Column>
                    <Column field="nombreCategoria" header="Nombre"></Column>
                    <Column header="Acciones" body={accionesBodyTemplate}></Column>
                </DataTable>
            </div>
        </div>
    )
}

export default ListarCategorias

