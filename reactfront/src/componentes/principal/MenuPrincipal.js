import '../../App.css';
import { Link } from 'react-router-dom'
import { Button } from 'primereact/button';
import React from 'react'


const MenuPrincipal = () => {
    return (
        <div className="mt-5">
            <div className="text-center">
                <h1>Pagina principal</h1>
                <Link to="/categorias"><Button type="button" label="Categorias" className="p-button-sm p-button-danger"/></Link>
                <Link to="/productos"><Button type="button" label="Productos" className="p-button-sm p-button-success"/></Link>
            </div>
        </div>
    )
}

export default MenuPrincipal
