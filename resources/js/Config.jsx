const base_api_url = "http://localhost:8000/api/v1"
//Route

export default{
    //AUTH
    getRegister:(data)=>axios.post(`${base_api_url}/auth/register`,data),
    getLogin:(data)=>axios.post(`${base_api_url}/auth/login`,data),
    getLogout:()=>axios.post(`${base_api_url}/auth/logout`),

}