import Login from './pages/login';
import Register from './pages/register';
import Home from './pages/home';
import Foro from './pages/foro';
import Categories from './pages/categories';
import Faq from './pages/faq';

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
    },

    {
        path: '/categories',
        component: Categories,
        name: 'categories'
    },

    {
        path: '/faq',
        component: Faq,
        name: 'faq'
    }
];

export default routes;
