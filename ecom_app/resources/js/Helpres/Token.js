import { split } from "lodash";

class Token{
    isValid(token)
    {
        const payload = this.payload(token)
        if(payload)
        {
            return payload.iss = "http://127.0.0.1:8000/api/auth/login" || "http://127.0.0.1:8000/api/auth/login" ? true:false
        } 
        return false
    }

    payload(token)
    {
        const payload = split('.')[1]
        return this.decode(payload)

    }

    decode(payload){
        return JSON.parse(atob(payload))
    }

    // parseJwt (token) {
    //     let base64Url = token.split('.')[1];
    //     let base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
    //     let jsonPayload = decodeURIComponent(atob(base64).split('').map(function(c) {
    //         return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
    //     }).join(''));
    
    //     return JSON.parse(jsonPayload);
    // };
}

export default Toekn = new Token();
 