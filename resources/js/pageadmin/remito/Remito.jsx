import React from 'react'
import Sidebar from '../Sidebar'

function Remito() {
  return (
    <div className="container bg-light">
    <div className='row'>
      <Sidebar />
        <div className="card" style="width: 18rem;">
            <img src="../image/logocrisa.png" class="card-img-top" alt="..."/>
            <div className="card-body">
                <p className="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div>
  </div>
  )
}

export default Remito