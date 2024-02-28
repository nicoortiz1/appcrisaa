import React, { useEffect, useState } from 'react'
import Config from '../Config';
import { Navigate, useNavigate } from 'react-router-dom';
import AuthUser from './AuthUser';

const Register = () => {

    const {getToken} = AuthUser()
    const [nombre, setNombre] = useState("");
    const [password, setPassword] = useState("");
    const [email, setEmail] = useState("");
    const Navigate = useNavigate()

    useEffect(()=>{
        if(getToken()){
          Navigate("/")
        }
      },[])

    const submitRegistro =async(e) =>{
        e.preventDefault();

        Config.getRegister({nombre,email,password})
        .then(({data}) =>{
            if(data.success){
                Navigate("/login")
            }
        })
    }

  return (
    <div className='container'>
        <div className='row justify-content-center'>
            <div className='col-sm-4'>
                <div className='card mt-5 mb-5'>
                    <div className='card-body'>
                        <h1 className='text-center fw-bolder'>REGISTRO</h1>
                        <input type="text" className='form-control mt-3' placeholder='Nombre:' value={nombre} 
                        onChange={(e)=>setNombre(e.target.value) }required/>

                        <input type="email" className='form-control mt-3' placeholder='Email:' value={email} 
                        onChange={(e)=>setEmail(e.target.value) }required/>

                        <input type="password" className='form-control mt-3' placeholder='Contraseña:' value={password} 
                        onChange={(e)=>setPassword(e.target.value) }required/>

                        <button onClick={submitRegistro} className='btn btn-primary w-100 mt-3'>Enviar</button>
                        <p className='text-center mt-3'><a href='#' className='small text-decoration-none'>Terminos y condiciones</a></p>



                    </div>
                </div>
            </div>
        </div>
    </div>
  )
}

export default Register