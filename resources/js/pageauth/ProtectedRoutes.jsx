import React from 'react';
import { Navigate, Outlet } from 'react-router-dom';
import AuthUser from './AuthUser';

const ProtectedRoutes = () => {
  const {getToken} = AuthUser()

  if(!getToken()){
    return <Navigate to ={'/login'} /> //como no existe un token te redirige a logearte
  }
  return (
    <Outlet />
  );
};

export default ProtectedRoutes;
