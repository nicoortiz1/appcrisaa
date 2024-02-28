import React, { useEffect }  from 'react'
import Navbar from '../components/Navbar'
import Footer from '../components/Footer'
import { Navigate, Outlet, useNavigate } from 'react-router-dom'
import AuthUser from '../pageauth/AuthUser'

const LayoutAdmin = () => {
  const {getRol} = AuthUser()
  const navigate = useNavigate()

  useEffect(()=>{
    if(getRol!="admin"){
      Navigate("/")
    }
  },[])
  
  return (
    <>
       <h1>Admin</h1>
      <Navbar />
      <Outlet />
      <Footer />
    </>
  )
}

export default LayoutAdmin