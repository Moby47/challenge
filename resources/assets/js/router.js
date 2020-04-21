
import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

import index from './components/index.vue'
import homepage from './components/homepage.vue'
import dares from './components/dares.vue'
import singleDare from './components/singleDare.vue'
import leaderBoard from './components/leaderBoard.vue'
import dareList from './components/dareList.vue'
import playerProfile from './components/playerProfile.vue'
import store from './components/store.vue'
import help from './components/help.vue'
import rules from './components/rules.vue'


import playerHomepage from './components/player/playerHomepage.vue'
import pickDare from './components/player/pickDare.vue'
import pendingDares from './components/player/pendingDares.vue'
import upload from './components/player/upload.vue'

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
        },
        {
            path: '/player-profile',
            name: 'playerProfile',
            component: playerProfile,
             meta:{
              //  auth: true
            }
        },
        {
            path: '/store',
            name: 'store',
            component: store,
             meta:{
              //  auth: true
            }
        },
        {
            path: '/help',
            name: 'help',
            component: help,
             meta:{
              //  auth: true
            }
        },
        {
            path: '/rules',
            name: 'rules',
            component: rules,
             meta:{
              //  auth: true
            }
        },







        {
            path: '/player-homepage',
            name: 'playerHomepage',
            component: playerHomepage,
             meta:{
              //  auth: true
            }
        },
        
        {
            path: '/pick-dare',
            name: 'pickDare',
            component: pickDare,
             meta:{
              //  auth: true
            }
        },
        
        {
            path: '/pending-dares',
            name: 'pendingDares',
            component: pendingDares,
             meta:{
              //  auth: true
            }
        },
        
        {
            path: '/upload-dare',
            name: 'upload',
            component: upload,
             meta:{
              //  auth: true
            }
        },
    ]
})