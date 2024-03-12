import React from 'react';
import { NavLink } from 'react-router-dom';

const Sidebar = () => {
  return (
    <div className="navbar-app">

        {/* Primer elemento: Sidebar original */}
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
          </ul>
          <hr />
                  
      </div>
    </div>
  );
};

export default Sidebar;
