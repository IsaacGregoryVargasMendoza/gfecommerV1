import axios from 'axios'
import React, { useRef, useEffect, useState } from 'react'
import { useNavigate } from 'react-router-dom'
import { Link } from 'react-router-dom'
import { Button } from 'primereact/button';

const endpoint = 'http://localhost:8000/api'
const endpointPost = 'http://localhost:8000/api/producto'

const CrearProducto = () => {
    const [categorias, setCategorias] = useState([])
    const [codigoProducto, setCodigoProducto] = useState('')
    const [nombreProducto, setNombreProducto] = useState('')
    const [descripcionProducto, setDescripcionProducto] = useState('')
    const [imagenProducto, setImagenProducto] = useState(null)
    const [visibleProducto, setVisibleProducto] = useState('')
    const [idCategoria, setIdCategoria] = useState('')
    const [vistaPrevia, setVistaPrevia] = useState('imagenes/no_imagen.png')
    const navigate = useNavigate()
    const referencia = useRef()

    // const store = async (e) => {
    //     e.preventDefault()
    //     await axios.post(endpointPost, {
    //         codigoProducto: codigoProducto,
    //         nombreProducto: nombreProducto,
    //         descripcionProducto: descripcionProducto,
    //         imagenProducto: imagenProducto,
    //         visibleProducto: visibleProducto,
    //         idCategoria: idCategoria,
    //     })
    //     navigate('/productos')
    // }

    const store = async (e) => {
        e.preventDefault()
        const data = new FormData();
        data.append("codigoProducto", codigoProducto);
        data.append("nombreProducto", nombreProducto);
        data.append("descripcionProducto", descripcionProducto);
        data.append("visibleProducto", visibleProducto);
        data.append("idCategoria", idCategoria);
        data.append("imagenProducto", imagenProducto);
        console.log(imagenProducto)
        await fetch(endpointPost,{ method: "POST", body: data })
        navigate('/productos')
      };

    const getTodaslasCategorias = async () => {
        const respuesta = await axios.get(`${endpoint}/categorias`)
        setCategorias(respuesta.data)
    }

    const cargarImagen = () => {
        referencia.current.click()
    }

    const mostrarImagen = async (imagenProducto) => {
        if (imagenProducto) {
            const reader = new FileReader()
            reader.onloadend = () => {
                setVistaPrevia(reader.result.toString())
                //alert(reader.result.toString())
            }
            reader.readAsDataURL(imagenProducto)
        } else {
            setVistaPrevia('/imagenes/no_imagen.png')
        }
    }

    useEffect(() => {
        getTodaslasCategorias()
        mostrarImagen(imagenProducto)
    }, [imagenProducto])

    return (
        <div className="mt-5">
            <div className="text-center"><h2 >Crear Producto</h2>
                <div>
                    <form onSubmit={store}>
                        <div className="">
                            <div className="card shadow-sm col-11 col-lg-11 mx-auto">
                                <div className="card-body bg-light">
                                    <div className="row">
                                        <div className="gap-1 col-xs-10 col-sm-10 col-md-5 col-lg-5 mx-auto">
                                            <label className="form-label">Codigo</label>
                                            <input
                                                type="text"
                                                className="form-control form-control-sm"
                                                onChange={(e) => setCodigoProducto(e.target.value)}
                                            />
                                            <label className="form-label">Nombre</label>
                                            <input
                                                type="text"
                                                className="form-control form-control-sm"
                                                onChange={(e) => setNombreProducto(e.target.value)}
                                            />
                                            <label className="form-label">Descripcion</label>
                                            <textarea
                                                className="form-control form-control-sm"
                                                name="detalle"
                                                id="detalle"
                                                cols="30"
                                                rows="6"
                                                onChange={(e) => setDescripcionProducto(e.target.value)}
                                            ></textarea>
                                            <div className="row">
                                                <div className="col-xs-12 col-sm-12 col-md-5 col-lg-5 mx-auto">
                                                    <label className="form-label">Categoria</label>
                                                    <select className="form-select form-select-sm text-center" onChange={(e) => setIdCategoria(e.target.value)}>
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
                                                                <input className="form-check-input" type="radio" name="opcion" id="opcionSi" onChange={(e) => setVisibleProducto(1)} />
                                                                <label className="form-check-label">SI</label>
                                                            </div>
                                                        </div>
                                                        <div className="col-5 mx-auto">
                                                            <div className="form-check text-start">
                                                                <input className="form-check-input" type="radio" name="opcion" id="opcionNo" onChange={(e) => setVisibleProducto(0)} />
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
                                                ref={referencia}
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
                                                    imagenProducto ?
                                                        <img id="imagen" onClick={cargarImagen} className="img-catalogo-formulario" src={vistaPrevia} alt="imagen producto" />
                                                        :
                                                        <img id="imagen" className="img-catalogo-formulario" src={vistaPrevia} alt="imagen producto" />
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

export default CrearProducto
