import React from 'react'
import Sidebar from './Sidebar'

const PanelAdmin = () => {
  return (
    
    <div className="container panel-layaout">
      <div className='row justify-content-center mt-3 mb-3'>
        <Sidebar/>
          <div className='navbar-content'>
            <h1 className='text-center'>ADMIN</h1>
          </div>
      </div>
    </div>
  )
}

export default PanelAdmin