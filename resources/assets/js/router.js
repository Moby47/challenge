
import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

import index from './components/index.vue'
import homepage from './components/homepage.vue'
import dares from './components/dares.vue'
import singleDare from './components/singleDare.vue'
import leaderBoard from './components/leaderBoard.vue'
import dareList from './components/dareList.vue'

export default new Router({

    mode: 'history',

    routes: [
        {
            path: '/',
            name: 'index',
            component: index,
             meta:{
              //  auth: true
            }
        },
        {
            path: '/homepage',
            name: 'homepage',
            component: homepage,
             meta:{
              //  auth: true
            }
        },
        {
            path: '/dares',
            name: 'dares',
            component: dares,
             meta:{
              //  auth: true
            }
        },
        {
            path: '/single-dare',
            name: 'singleDare',
            component: singleDare,
             meta:{
              //  auth: true
            }
        },
        {
            path: '/leader-board',
            name: 'leaderBoard',
            component: leaderBoard,
             meta:{
              //  auth: true
            }
        },
        {
            path: '/dare-list',
            name: 'dareList',
            component: dareList,
             meta:{
              //  auth: true
            }
        }
    ]
})
