import Login from './pages/login';
import Register from './pages/register';
import Home from './pages/home';
import Foro from './pages/foro';

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
    },

    {
        path: '/foro',
        component: Foro,
        name: 'foro'
    }
];

export default routes;
