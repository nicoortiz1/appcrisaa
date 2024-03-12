import React, { useEffect, useState } from 'react'
import Sidebar from './Sidebar'
import Config from '../Config';
import AuthUser from '../pageauth/AuthUser';

function UserAll() {

  const [users, setUsers] = useState([]);
  const {getToken} = AuthUser();

  useEffect(() => {
    getUserAll();
  }, []);

  const getUserAll = async () => {
    const response = await Config.getUserAll(getToken()); 
    console.log(response.data);
    setUsers(response.data);
  };

  return (
    <div className="container bg-light">
      <div className='row'>
        <Sidebar />
        <div className="col-sm-9 mt-3 mb-3">
          <div className="card">
            <div className="card-body">
              <table className="table">
                <thead>
                  <tr>
                    <th>ORDEN</th><th>NAME</th><th>ACCION</th>
                  </tr>
                </thead>
                <tbody>
                  {
                    !users ? "...Cargando" : users.map(
                      (user)=>{
                        return(
                          <tr key ={user.id}>
                            <td>{user.id}</td>
                            <td>{user.nombre}</td>
                            <td></td>
                          </tr>

                        )
                      }
                    )
                  }
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </div>
  );
}

export default UserAll