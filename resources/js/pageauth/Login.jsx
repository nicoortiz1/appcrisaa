import React, { useEffect, useState } from 'react'
import Config from '../Config';
import AuthUser from './AuthUser';
import { useNavigate } from 'react-router-dom';
import axios from 'axios';

const Login = () => {
    const { setToken, getToken} = AuthUser()
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");
    const [message, setMessage] = useState("");

    const navigate = useNavigate()

    useEffect(()=>{
      if(getToken()){
        navigate("/")
      }
    },[])

    const submitLogin = async (e) => {
      e.preventDefault();
      console.log('submitLogin fue llamado');
    
      Config.getLogin({ email, password })
        .then(({data}) => {
          if (data.success) {
            setToken(
              data.user,
              data.token,
              data.user.roles[0].name
            )

            //console.log('Mensaje:', data);
          } else {
            console.log('Mensaje de error:', data.message);
          }
        })
        .catch((error) => {
          console.error('Error al realizar la solicitud:', error);
        });
    };
    
    

  return (
    <div className='container'>
        <div className='row justify-content-center'>
            <div className='col-sm-4'>
                <div className='card mt-5 mb-5'>
                    <div className='card-body'>
                        <h1 className='text-center fw-bolder'>LOGIN</h1>


                        <input type="email" className='form-control mt-3' placeholder='Email:' value={email} 
                        onChange={(e)=>setEmail(e.target.value) }required/>

                        <input type="password" className='form-control mt-3' placeholder='Contraseña:' value={password} 
                        onChange={(e)=>setPassword(e.target.value) }required/>

                        <button onClick={submitLogin} className='btn btn-primary w-100 mt-3'>Enviar</button>
                        <p className='text-center mt-3'>{message}</p>

                        <hr/>
                        <p className='text-center '>Primera vez ... debe registrarse</p>
                        <a href="/register" className='btn btn-primary w-100 mt-3'>Registro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  )
}

export default Login