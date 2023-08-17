import axios from 'axios';
import React, { useRef, useState, useEffect } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import { Link } from 'react-router-dom'
import { Button } from 'primereact/button';

const endpointProducto = 'http://localhost:8000/api/producto/'

const EditarProducto = () => {
    const [imagenProducto, setImagenProducto] = useState('')
    const navigate = useNavigate()
    const { id } = useParams()

    const update = async (e) => {
        e.preventDefault()
        const data = new FormData();
        data.append("imagenProducto", imagenProducto);
        await fetch(`${endpointProducto}${id}`, { method: "PUT", body: data })
        navigate('/productos')
    }

    useEffect(() => {
        const getProductoById = async () => {
            const response = await axios.get(`${endpointProducto}${id}`)
            setImagenProducto('http://localhost:8000/' + response.data.imagenProducto);
        }
        getProductoById()
    },[])


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
                                                        const url = URL.createObjectURL(e.target.files[0]);
                                                        setImagenProducto(url)
                                                    } else {
                                                        setImagenProducto('http://localhost:8000/imagenes/no_imagen.png')
                                                    } 
                                                }}
                                            />
                                            <div className="card shadow-sm text-center">
                                                {
                                                    <img id="imagen" className="img-catalogo-formulario" src={imagenProducto} alt="imagen producto" />
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