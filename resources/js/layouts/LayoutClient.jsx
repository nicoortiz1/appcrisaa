import React, { useEffect } from 'react'
import Navbar from '../components/Navbar'
import Footer from '../components/Footer'
import { Navigate, Outlet, useNavigate } from 'react-router-dom'
import AuthUser from '../pageauth/AuthUser'

const LayoutClient = () => {
  const {getRol} = AuthUser()
  const navigate = useNavigate()

  useEffect(()=>{
    if(getRol!="client"){
      Navigate("/")
    }
  },[])

  return (
    <>
      <h1>Cliente</h1>
      <Navbar />
      <Outlet />
      <Footer />
    </>
  )
}

export default LayoutClient
