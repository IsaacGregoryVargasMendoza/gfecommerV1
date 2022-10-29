import React,{useEffect,useState} from 'react'
import axios from 'axios'

import {Link} from 'react-router-dom'

const endpoint = 'http://localhost:8000/api'

const ListarCategorias = () => {
    const [ categorias, setCategorias ] = useState( [] )
    
    useEffect(()=>{
        getTodaslasCategorias()
    }, [])

    const getTodaslasCategorias = async() =>{
        const respuesta = await axios.get(`${endpoint}/categorias`)
        setCategorias(respuesta.data)
    }

    const eliminarCategoria = async(id) =>{
        await axios.delete(`${endpoint}/categoria/${id}`)
        getTodaslasCategorias()
    }
    
    return (
        <div className='container'>
            <div className="g-grid gap-2">
                <Link to="/create" className="btn btn-success btn-lg mt-2 mb-2 text-white">Crear</Link>
            </div>
            <table id="datatable" className="table table-striped mt-4">
                <thead className="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th className="text-center" scope="col">Nombre</th>
                        <th className="text-center" scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    {categorias.map((categoria)=>(
                        <tr key={categoria.id}>
                            <td className="text-center">{categoria.id}</td>
                            <td className="text-center">{categoria.nombreCategoria}</td>
                            <td>
                                <Link to={`/edit/${categoria.id}`} className="btn btn-warning">Editar</Link>
                                <button onClick={()=>eliminarCategoria(categoria.id)} className="btn btn-danger">Borrar</button>
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    )
}

export default ListarCategorias

