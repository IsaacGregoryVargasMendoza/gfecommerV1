import axios from 'axios';
import React,{useState,useEffect} from 'react';
import {useNavigate, useParams} from 'react-router-dom';

const endpoint = 'http://localhost:8000/api/categoria/'

const EditarCategoria = () => {
    const [nombreCategoria, setNombreCategoria] = useState('')
    const navigate = useNavigate()
    const {id} = useParams()

    const update = async (e) => {
        e.preventDefault()
        await axios.put(`${endpoint}${id}`,{nombreCategoria: nombreCategoria})
        navigate('/categorias')
    }

    useEffect(() =>{
        const getCategoriaById = async()=>{
            const response = await axios.get(`${endpoint}${id}`)
            setNombreCategoria(response.data.nombreCategoria)
        }
        getCategoriaById()
    },[])

    return (
        <div className="mt-5">
            <div className="text-center"><h2 >Editar Categoria</h2></div>
                <form onSubmit={update}>
                    <div className="card shadow-sm col-7 mx-auto">
                       <div className="card-body bg-light">
                           <div className="row">
                                <div className="d-grid gap-1 col-5 mx-auto">
                                    <label className="form-label">Nombre</label>
                                    <input 
                                        type="text"
                                        className="form-control"
                                        value={nombreCategoria}
                                        onChange={(e)=> setNombreCategoria(e.target.value)}
                                    />
                                </div>
                            </div>
                            <div className="row">
                                <div className="d-grid gap-1 col-4 mx-auto mt-4">
                                    <button className="btn btn-primary" type="submit">Guardar</button>
                                    <a className="btn btn-secondary" type="button">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

    )
}

export default EditarCategoria
