import axios from 'axios'
import React, { useEffect, useState } from 'react'
import { useNavigate } from 'react-router-dom'

const endpoint = 'http://localhost:8000/api'

const CrearProducto = () => {
    const [categorias,setCategorias] = useState([])
    const [unidadmedidas,setUnidadMedidas] = useState([])
    const [nombreProducto, setNombreProducto] = useState('')
    const [descripcionProducto, setDescripcionProducto] = useState('')
    const [stockProducto, setStockProducto] = useState(0)
    const [stockMinimoProducto, setStockMinimoProducto] = useState(0)
    const [precioCompraProducto, setPrecioCompraProducto] = useState(0)
    const [imagenProducto, setImagenProducto] = useState('')
    const [visibleProducto, setVisibleProducto] = useState('')
    const [idCategoria, setIdCategoria] = useState('')
    const [idUnidadMedida, setIdUnidadMedida] = useState('')
    const navigate = useNavigate()

    const store = async (e)=>{
        e.preventDefault()
        await axios.post(endpoint,{
            nombreProducto: nombreProducto,
            descripcionProducto: descripcionProducto,
            stockProducto: stockProducto,
            stockMinimoProducto: stockMinimoProducto,
            precioCompraProducto: precioCompraProducto,
            imagenProducto: imagenProducto,
            visibleProducto: visibleProducto,
            idCategoria: idCategoria,
            idUnidadMedida: idUnidadMedida
        })
        navigate('/productos/')
    }
    
    const getTodaslasCategorias = async() => {
        const respuesta = await axios.get(`${endpoint}/categorias`)
        setCategorias(respuesta.data)
    }

    const getTodaslasUnidadesDeMedida = async() => {
        const respuesta = await axios.get(`${endpoint}/unidadesDeMedida`)
        setUnidadMedidas(respuesta.data)
    }

    useEffect(() => {
        getTodaslasCategorias()
        getTodaslasUnidadesDeMedida()
    }, [])

    return (
        <div>
            <form onSubmit={store}>
                <div className="column">
                    <div className="card shadow-sm col-11 mx-auto">
                        <div className="card-body bg-light">
                            <div className="row">
                                <div className="d-grid gap-1 col-5 mx-auto">
                                    <label className="form-label">Nombre</label>
                                    <input 
                                        type="text" 
                                        className="form-control text-uppercase" 
                                        onChange={(e)=> setNombreProducto(e.target.value)}
                                    />

                                    <label className="form-label">Descripcion</label>
                                    <input 
                                        type="text" 
                                        className="form-control text-uppercase" 
                                        onChange={(e)=> setDescripcionProducto(e.target.value)}
                                    />
                                    <label className="form-label">Stock</label>
                                    <input 
                                        type="text" 
                                        className="form-control" 
                                        onChange={(e)=> setStockProducto(e.target.value)}
                                    />
                                    <label className="form-label">Stock Minimo</label>
                                    <input 
                                        type="text" 
                                        className="form-control" 
                                        onChange={(e)=> setStockMinimoProducto(e.target.value)}
                                    />
                                    <label className="form-label">Precio Compra</label>
                                    <input 
                                        type="text" 
                                        className="form-control" 
                                        onChange={(e)=> setPrecioCompraProducto(e.target.value)}
                                    />
                                    <label className="form-label">Imagen</label>
                                    <input 
                                        type="text" 
                                        className="form-control" 
                                        onChange={(e)=> setImagenProducto(e.target.value)}
                                    />
                                    <label className="form-label">Visible?</label>
                                    <div className="form-check text-start">
                                        <div className="col-4 text-start">
                                            <input className="form-check-input" checked type="radio" name="opcionSi" id="opcionSi"/>
                                            <label className="form-check-label" for="opcionSi">
                                                SI
                                            </label>
                                        </div>
                                    </div>
                                    <div className="form-check text-start">
                                        <div className="col-4">
                                            <input className="form-check-input" type="radio" name="opcionNo" id="opcionNo"/>
                                            <label className="form-check-label" for="opcionNo">
                                                NO
                                            </label>
                                        </div>
                                    </div>
                                    <select className="form-control text-center" onChange>
                                        <option>-Seleccionar Categoria-</option>
                                        {categorias.map(categoria => {
                                            return (<option key={categoria.id} value={categoria.id}>{categoria.nombreCategoria}</option>)
                                        })}
                                    </select>
                                    <select className="form-control text-center">
                                        {/* a considerar variables presentaciones para mostrar varias unidades de medida */}
                                        <option>-Seleccionar Unidad de Medida-</option>
                                        {unidadmedidas.map(unidadmedida => {
                                            return (<option key={unidadmedida.id} value={unidadmedida.id}>{unidadmedida.nombreUnidadMedida}</option>)
                                        })}
                                    </select>
                                </div>
                            </div>
                            <div className="row">
                                <div className="d-grid gap-1 col-5 mx-auto mt-3">
                                    <button className="btn btn-primary" type="submit">Guardar</button>
                                    <a href="" className="btn btn-secondary" type="button">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    )
}

export default CrearProducto
