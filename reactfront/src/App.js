import './App.css';
import { BrowserRouter, Routes, Route } from 'react-router-dom';

//importar nuestros componentes
import MenuPrincipal from './componentes/principal/MenuPrincipal';

import ListarCategorias from './componentes/categoria/ListarCategorias';
import CrearCategoria from './componentes/categoria/CrearCategoria';
import EditarCategoria from './componentes/categoria/EditarCategoria';

import ListarProducto from './componentes/producto/ListarProducto';
import CrearProducto from './componentes/producto/CrearProducto';
import EditarProducto from './componentes/producto/EditarProducto';
import ShowImagen from './componentes/producto/ShowImagen';

//Estilos Prime React
import "primereact/resources/themes/lara-light-indigo/theme.css";  //theme
import "primereact/resources/primereact.min.css";                  //core css
import "primeicons/primeicons.css";

function App() {
  return (
    <div className="App">
      <BrowserRouter>
        <Routes>
          <Route path='/' element={<MenuPrincipal />} />
          <Route path='/categorias' element={<ListarCategorias />} />
          <Route path='/categoria/create' element={<CrearCategoria />} />
          <Route path='/categoria/edit/:id' element={<EditarCategoria />} />

          <Route path='/productos' element={<ListarProducto />} />
          <Route path='/producto/create' element={<CrearProducto />} />
          <Route path='/producto/edit/:id' element={<EditarProducto />} />
          <Route path='/producto/mostrar/:id' element={<ShowImagen />} />
        </Routes>
      </BrowserRouter>
    </div>
  );
}

export default App;
