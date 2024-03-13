import React from 'react';
import Config from '../Config';
import AuthUser from '../pageauth/AuthUser';


const Navbar = () => {

    const {getRol, getLogout, getToken} = AuthUser()

    const logoutUser = () => {
        getLogout('/logout')
            .then(response => {
                console.log("Usuario cerró sesión exitosamente.");
              //  getLogout();
            })
            .catch(error => {
                console.error(error);
            });
    };
    

    const renderLinks = () =>{
        if(getToken()){
            return(
                <>    
                    {/*<li className="nav-item">
                        <a className="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li className="nav-item">
                        <a className="nav-link" href="/remitos">Remitos</a>
                    </li>                                     
                    <li className="nav-item">
                        <a className="nav-link" href={`/${getRol()}`}>Administracion</a>
            </li>*/}
                    <li className="nav-item">
                        <a className="nav-link" href="/" onClick={logoutUser}>Cerrar Sesion</a>
                    </li>
                </>
            )
        }else{
            return(
                <>
                    <li className="nav-item">
                        <a className="nav-link" href="/login">iniciar sesion </a>
                    </li>
                </>
            )
        }
    }


    return(
        <nav className="navbar navbar-expand-lg bg-light">
            <div className="container">
                <a className="navbar-brand" href="/">
                    <img src="../image/logocrisa.png" alt="Crisa Logo" width="60" height="auto" />
                </a>
                <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span className="navbar-toggler-icon"></span>
                </button>
                <div className="collapse navbar-collapse" id="navbarNav">               
                <ul className="navbar-nav ms-auto">
                {renderLinks()} 
                </ul>
                </div>
            </div>
        </nav>
    )
}

export default Navbar