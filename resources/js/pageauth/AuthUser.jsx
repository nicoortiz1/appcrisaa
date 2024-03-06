import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';

const AuthUser = () => {
    const navigate = useNavigate();

    const getToken = () => {
        const tokenString = sessionStorage.getItem('token');
        return JSON.parse(tokenString);
    };

    const getUser = () => {
        const userString = sessionStorage.getItem('user');
        return JSON.parse(userString);
    };

    const getRol = () => {
        const rolString = sessionStorage.getItem('rol');
        return JSON.parse(rolString);
    };

    const [token, setToken] = useState(getToken());
    const [user, setUser] = useState(getUser());
    const [rol, setRol] = useState(getRol());

    const saveToken = (user, token, rol) => {
        sessionStorage.setItem('user', JSON.stringify(user));
        sessionStorage.setItem('token', JSON.stringify(token));
        sessionStorage.setItem('rol', JSON.stringify(rol));

        setUser(user);
        setToken(token);
        setRol(rol);

        if (rol === "admin")
            navigate('/admin');
        if (rol === "client")
            navigate('/client');
    };

    const getLogout = () => {
        // otras tareas necesarias para cerrar sesión...
        console.log("Se ha llamado a la función getLogout");
        sessionStorage.clear();
        navigate('/');
    };

    return {
        setToken: saveToken,
        token,
        user,
        rol,
        getToken,
        getUser,
        getRol,
        getLogout
    };
};

export default AuthUser;
