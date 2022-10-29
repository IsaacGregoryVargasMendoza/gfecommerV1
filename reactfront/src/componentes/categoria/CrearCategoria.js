import axios from 'axios'
import React,{useState} from 'react'
import { useNavigate } from 'react-router-dom'

const endpoint = 'http://localhost:8000/api/categoria'

const CrearCategoria = () => {
    const [nombreCategoria, setNombreCategoria] = useState('')
    const navigate = useNavigate()

    const store = async (e)=>{
        e.preventDefault()
        await axios.post(endpoint,{nombreCategoria: nombreCategoria})
        navigate('/')
    }

    return (
        <div className="mt-5">
            <div className="text-center"><h2 >Nuevo Categoria</h2></div>
                <form onSubmit={store}>
                    <div className="card shadow-sm col-7 mx-auto">
                       <div className="card-body bg-light">
                           <div className="row">
                                <div className="d-grid gap-1 col-5 mx-auto">
                                    <label className="form-label">Nombre</label>
                                    <input 
                                        type="text"
                                        className="form-control text-uppercase"
                                        onChange={(e)=> setNombreCategoria(e.target.value)}
                                    />
                                </div>
                            </div>
                            <div className="row">
                                <div className="d-grid gap-1 col-4 mx-auto mt-4">
                                    <button className="btn btn-primary" type="submit">Guardar</button>
                                    <a href="" className="btn btn-secondary" type="button">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    )
}

export default CrearCategoria
