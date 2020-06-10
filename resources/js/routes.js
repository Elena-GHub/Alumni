import Login from './pages/login';
import Register from './pages/register';
import Home from './pages/home';

const routes = [
    {
        path: '/login',
        component: Login,
        name: 'login'
    },

    {
        path: '/register',
        component: Register,
        name: 'register'
    },

    {
        path: '/',
        component: Home,
        name: 'home'
    }
];

export default routes;
