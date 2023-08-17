import axios from 'axios'
import React,{useState} from 'react'
import { useNavigate } from 'react-router-dom'
import { Link } from 'react-router-dom'
import { Button } from 'primereact/button';
// import { useForm } from "react-hook-form";

const endpoint = 'http://localhost:8000/api/categoria'

const CrearCategoria = () => {
    const [nombreCategoria, setNombreCategoria] = useState('')
    //const { register, handleSubmit, watch, formState: { errors } } = useForm();
    const navigate = useNavigate()

    const store = async (e) => {
        e.preventDefault()
        await axios.post(endpoint,{nombreCategoria: nombreCategoria})
        navigate('/categorias')
    }  

    //const expresionCategoria="^[a-zA-Z\s]"

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
                                        className="form-control"
                                        onChange={(e)=> setNombreCategoria(e.target.value)}
                                        value={nombreCategoria}
                                        // {...register("nombreCategoria",{ 
                                        //     required: true, 
                                        //     maxLength: 100,
                                        //     pattern: /^[a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/
                                        // })}
                                    />
                                    {/* {errors.nombreCategoria?.type === 'required' && <p className="text-danger">El campo es obligatorio</p>}
                                    {errors.nombreCategoria?.type === 'pattern' && <p className="text-danger">El formato es incorrecto</p>} */}
                                </div>
                            </div>
                            <div className="row">
                                <div className="d-grid gap-1 col-4 mx-auto mt-4">
                                    <Button type="submit" label="Guardar" className="p-button-sm p-button-success" />
                                    <Link to={`/categorias`}><Button type="button" label="Cancelar" className="p-button-sm p-button-secondary"/></Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    )
}

export default CrearCategoria
