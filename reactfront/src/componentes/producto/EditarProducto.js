import axios from 'axios';
import React,{useState,useEffect} from 'react';
import {useNavigate, useParams} from 'react-router-dom';
import { Link } from 'react-router-dom'
import { Button } from 'primereact/button';

const endpoint = 'http://localhost:8000/api'
const endpointProducto = 'http://localhost:8000/api/producto/'

const EditarProducto = () => {
    const [categorias, setCategorias] = useState([])
    const [codigoProducto, setCodigoProducto] = useState('')
    const [nombreProducto, setNombreProducto] = useState('')
    const [descripcionProducto, setDescripcionProducto] = useState('')
    const [imagenProducto, setImagenProducto] = useState('')
    const [idCategoria, setIdCategoria] = useState('')
    const [visibleProducto, setVisibleProducto] = useState('')
    // const [vistaPrevia, setVistaPrevia] = useState('')
    const navigate = useNavigate()
    const {id} = useParams()
    
    const update = async (e) => {
        e.preventDefault()
        const data = new FormData();
        data.append("codigoProducto", codigoProducto);
        data.append("nombreProducto", nombreProducto);
        data.append("descripcionProducto", descripcionProducto);
        data.append("visibleProducto", visibleProducto);
        data.append("idCategoria", idCategoria);
        data.append("imagenProducto", imagenProducto);
        // await fetch(`${endpointProducto}${id}`,{ method: "PUT",content: "application/json", body: data})
        // navigate('/productos')
        console.log(imagenProducto)
        await axios.put(`${endpointProducto}${id}`,{codigoProducto: codigoProducto,nombreProducto:nombreProducto,descripcionProducto:descripcionProducto,visibleProducto:visibleProducto,idCategoria:idCategoria,imagenProducto:imagenProducto})
        navigate('/productos')
    }

    const getTodaslasCategorias = async () => {
        const respuesta = await axios.get(`${endpoint}/categorias`)
        setCategorias(respuesta.data)
    }

    useEffect(() =>{
        const getProductoById = async()=>{
            const response = await axios.get(`${endpointProducto}${id}`)
            setCodigoProducto(response.data.codigoProducto)
            setNombreProducto(response.data.nombreProducto)
            setDescripcionProducto(response.data.descripcionProducto)
            setVisibleProducto(response.data.visibleProducto)
            //setImagenProducto('http://localhost:8000/' + response.data.imagenProducto);
            setImagenProducto(response.data.imagenProducto);
            setIdCategoria(response.data.idCategoria)
        }
        getTodaslasCategorias()
        getProductoById()
    },[imagenProducto])

    return (
        <div className="mt-5">
            <div className="text-center"><h2 >Editar Producto</h2>
                <div>
                    <form onSubmit={update}>
                        <div className="">
                            <div className="card shadow-sm col-11 col-lg-11 mx-auto">
                                <div className="card-body bg-light">
                                    <div className="row">
                                        <div className="gap-1 col-xs-10 col-sm-10 col-md-5 col-lg-5 mx-auto">
                                            <label className="form-label">Codigo</label>
                                            <input
                                                type="text"
                                                value={codigoProducto}
                                                className="form-control form-control-sm text-uppercase"
                                                onChange={(e) => setCodigoProducto(e.target.value)}
                                            />
                                            <label className="form-label">Nombre</label>
                                            <input
                                                type="text"
                                                value={nombreProducto}
                                                className="form-control form-control-sm text-uppercase"
                                                onChange={(e) => setNombreProducto(e.target.value)}
                                            />
                                            <label className="form-label">Descripcion</label>
                                            <textarea
                                                className="form-control form-control-sm"
                                                name="detalle"
                                                id="detalle"
                                                cols="30"
                                                rows="6"
                                                value={descripcionProducto}
                                                onChange={(e) => setDescripcionProducto(e.target.value)}
                                            ></textarea>
                                            <div className="row">
                                                <div className="col-xs-12 col-sm-12 col-md-5 col-lg-5 mx-auto">
                                                    <label className="form-label">Categoria</label>
                                                    <select className="form-select form-select-sm text-center" value={idCategoria} onChange={(e) => setIdCategoria(e.target.value)}>
                                                        <option>-Seleccionar-</option>
                                                        {categorias.map(categoria => {
                                                            return (<option key={categoria.id} value={categoria.id}>{categoria.nombreCategoria}</option>)
                                                        })}
                                                    </select>
                                                </div>
                                                <div className="col-xs-4 col-sm-4 col-md-6 col-lg-6 mx-auto">
                                                    <label className="form-label">Visible?</label>
                                                    <div className="row">
                                                        <div className="col-5 mx-auto">
                                                            <div className="form-check text-start">
                                                                <input 
                                                                className="form-check-input" 
                                                                type="radio" 
                                                                name="opcion" 
                                                                id="opcionSi" 
                                                                onChange={(e) => setVisibleProducto(1)} 
                                                                checked={visibleProducto === 1 ? true : false}
                                                                />
                                                                <label className="form-check-label">SI</label>
                                                            </div>
                                                        </div>
                                                        <div className="col-5 mx-auto">
                                                            <div className="form-check text-start">
                                                                <input 
                                                                className="form-check-input" 
                                                                type="radio" 
                                                                name="opcion" 
                                                                id="opcionNo" 
                                                                onChange={(e) => setVisibleProducto(0)} 
                                                                checked={visibleProducto === 0 ? true : false}
                                                                />
                                                                <label className="form-check-label">NO</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="gap-1 col-xs-10 col-sm-10 col-md-5 col-lg-5 mx-auto">
                                            <label className="form-label">Imagen</label>
                                            <input
                                                type="file"
                                                className="form-control form-control-sm"
                                                accept=""
                                                onChange={(e) => {
                                                    const file = e.target.files[0]
                                                    if (file && file.type.substring(0, 5) === 'image') {
                                                        setImagenProducto(file)
                                                    } else {
                                                        setImagenProducto(null)
                                                    } 
                                                }}
                                            />
                                            <div className="card shadow-sm text-center">
                                                {
                                                    <img id="imagen"className="img-catalogo-formulario" src={imagenProducto} alt="imagen producto" />
                                                }
                                            </div>
                                        </div>
                                    </div>
                                    <div className="row ">
                                        <div className="col-xs-8 col-sm-8 col-md-11 col-lg-11 d-flex justify-content-end mt-3">
                                            <Button type="submit" label="Guardar" className="p-button-sm p-button-success" />
                                            <Link to={`/productos`}><Button type="button" label="Cancelar" className="p-button-sm p-button-secondary" /></Link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    )
}

export default EditarProducto
