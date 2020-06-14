import Login from './pages/login';
import Register from './pages/register';
// import Home from './pages/home';
import Categories from './pages/categories'; 
import Forum from './pages/forum';
import ThreadCreate from './pages/thread.create';
import Thread from './pages/thread';

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
        path: '/forum/:id',
        component: Forum,
        name: 'forum'
    },

    {
        path: '/thread/create',
        component: ThreadCreate,
        name: 'thread.create'
    },

    {
        path: '/thread/:id',
        component: Thread,
        name: 'thread'
    },

    {
        path: '/',
        component: Categories,
        name: 'categories'
    }
    /*
    {
        path: '/',
        component: Home,
        name: 'home'
    }
    */
];

export default routes;
