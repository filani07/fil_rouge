class AppStorage{

    storeToken(token)
    {
        localStorage.setItem('token',token)
    }

    storeUser(user)
    {
        localStorage.setItem('role',user)
    }

    store(token,user)
    {
        this.storeToken(token)
        this.storeUser(user)
    }

    clear()
    {
        localStorage.removeItem('token')
        localStorage.removeItem('role')
    }

    getToken()
    {
        localStorage.getItem('token')
    }

    getUser()
    {
        localStorage.getItem('role')
    }
}

export default AppStorage = new AppStorage();
