let login = require('./components/auth/login.vue').default;
let register = require('./components/auth/register.vue').default;
let forget = require('./components/auth/forget.vue').default;
let logout = require('./components/auth/logout.vue').default;

//End Authentication
let home = require('./components/home.vue').default;
let acueile = require('./components/acueile.vue').default;


//Employee component
let sotreemployee = require('./components/employee/create.vue').default;
let employee = require('./components/employee/index.vue').default;
let editemployee = require('./components/employee/edit.vue').default;

//Supplier component
let sotresupplier = require('./components/supplier/create.vue').default;
let supplier = require('./components/supplier/index.vue').default;
let editsupplier = require('./components/supplier/edit.vue').default;

export const routes = [
    { path: '/', component: login, name : '/' },
    { path: '/register', component: register, name : 'register' },
    { path: '/forget', component: forget, name : 'forget' },
    { path: '/logout', component: logout, name : 'logout' },
    { path: '/home', component: home, name : 'home' },
    { path: '/acueile', component: acueile, name : 'acueile' },

    //Employee routes
    { path: '/store-employee', component: sotreemployee, name : 'store-employee' },
    { path: '/employee', component: employee, name : 'employee' },
    { path: '/edit-employee/:id', component: editemployee, name : 'edit-employee' },

    //Supplier routes
    { path: '/store-supplier', component: sotresupplier, name : 'store-supplier' },
    { path: '/supplier', component: supplier, name : 'supplier' },
    { path: '/edit-supplier/:id', component: editsupplier, name : 'edit-supplier' }
  ]