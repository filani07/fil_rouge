import Token from './Token'
import AppStorage from './AppStorage'

class User{
 
responseAfterlogin(res)
{
    const access_token = res.data.access_token
    const username = res.data.name
    if(Token.isValid(access_token))
    {
        AppStorage.store(access_token,username)
    }
}

hasToken()
{
    const storeToken = loccalStorage.getItem(token)

    if(storeToken)
    {
        return Token.isValid(storeToken) ? true : false
    }
    return false
}

loggedIn()
{
    return this.hasToken()
}

name(){
    if(this.loggedIn()){
       return loccalStorage.getItem('user')
    }
}

id(){
    if(this.loggedIn()){
        const payload = Token.payload(loccalStorage.getItem('token'))
        return payload.sub
     }

     return false
}


}

export default User = new User();
 