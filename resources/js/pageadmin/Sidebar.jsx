import React from 'react';
import { NavLink } from 'react-router-dom';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap-icons/font/bootstrap-icons.css';

const Sidebar = () => {
  return (
    <div className="container-fluid">
      <div className='row'>
        <div className='bg-dark col-auto col-md3 min-vh-100 d-flex justify-content-between flex-colmn'>
          <div>
          <a className='text-decoration-none text-white d-none d-sm-inline d-flex align-itemcenter ms-3 mt-2'>
             <span className='ms-1 fs-4'>Brand</span>
          </a>
          <hr className='text-secondary'/>
          <ul class="nav nav-pills flex-column">
            <li class="nav-item text-white fs-4 my-1">
              <a href="#" class="nav-link text-white fs-5" aria-current="page">
                <i className='bi bi-house'></i>
                <span className='ms-3 d-none d-sm-inline'>Dashboard</span>
              </a>
            </li>
            <li className="nav-item">
            <NavLink to="/admin/remito" className="list-group-item">Remitos</NavLink>
            </li>
            <li class="nav-item text-white fs-4 my-1">
              <a href="#" class="nav-link text-white fs-5" aria-current="page">
                <i className='bi bi-people'></i>
                <span className='ms-3 d-none d-sm-inline'>Usuarios</span>
              </a>
            </li>
            <li class="nav-item text-white fs-4 my-1">
              <a href="#" class="nav-link text-white fs-5" aria-current="page">
                <i className='bi bi-people'></i>
                <span className='ms-3 d-none d-sm-inline'>Empresa</span>
              </a>
            </li>
          </ul>
          </div>
       </div>
      </div>
    </div>
  );
};

export default Sidebar;

{/* Primer elemento: Sidebar original 
<div className="d-flex flex-column flex-shrink-0 p-3 bg-light" style={{  }}>
<a href="/" className="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
  <svg className="bi pe-none me-2" width="40" height="32"><use xlinkHref="#bootstrap"/></svg>
  <span className="fs-4">Sidebar</span>
</a>
<hr />
<ul className="nav nav-pills flex-column mb-auto">
  <li className="nav-item">
  <NavLink to="/admin/user" className="list-group-item">User</NavLink>
  </li>
  <li className="nav-item">
  <NavLink to="/admin/remitos" className="list-group-item">Remitos</NavLink>
  </li>
  <li className="nav-item">
  <NavLink to="/admin/empresa" className="list-group-item">Empresas</NavLink>  
  </li>
</ul>*/}
