import './App.css';

import {BrowserRouter, Routes, Route} from 'react-router-dom';

//importar nuestros componentes
import ListarCategorias from './componentes/categoria/ListarCategorias';
import CrearCategoria from './componentes/categoria/CrearCategoria';
import EditarCategoria from './componentes/categoria/EditarCategoria';
import CrearProducto from './componentes/producto/CrearProducto';

function App() {
  return (
    <div className="App">
      <BrowserRouter>
      <Routes>
        <Route path='/categorias/' element={<ListarCategorias/>}/>
        <Route path='/categoria/create' element={<CrearCategoria/>}/>
        <Route path='/categoria/edit/:id' element={<EditarCategoria/>}/>

        <Route path='/producto/create' element={<CrearProducto/>}/>
      </Routes>
      </BrowserRouter>
    </div>
  );
}

export default App;
