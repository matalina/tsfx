import Home from '../views/Home';
import Dashboard from '../views/Dashboard';
import Game from '../views/Game';

export default [
    {
        path: '/',
        component: Home,
    },
    {
        path: '/dashboard',
        component: Dashboard,
    },
    {
        path: '/game',
        component: Game,
    }
];
