import Login from './pages/login';
import Register from './pages/register';
import Home from './pages/home';
import ForumHome from './pages/forumhome'; 
import Forum from './pages/forum';
import ThreadCreate from './pages/thread.create';
import Thread from './pages/thread';
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
        component: Home,
        name: 'home'
    },

    {
        path: '/forumhome',
        component: ForumHome,
        name: 'forumhome'
    },

    {
        path: '/faq',
        component: Faq,
        name: 'faq'
    }
];

export default routes;
