//Vue, Vuexをインポート
import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
import VModal from 'vue-js-modal'
Vue.use(VModal);
//VueにVuexを登録
Vue.use(Vuex)
import FeedList from './components/App'
const store = new Vuex.Store ({
    state: {
	    users:[],
	    count: 0,
	    selectFeedId: null,
	    tcomments: [],
	    nextTaskId: 3,
    },
    getters: {
        users : function(state){
  		return state.users.filter(user => user.age < 30);
  	    }
    },
    mutations: {
        increment : function(state) {		
		state.count++
        },
        setUsers : function(state,users) {
            state.users = users
        },
        selectFeedId (state, i) {
            state.selectFeedId = i
        },
        addComment (state, { content }) {
            state.tcomments.push({
                id: state.nextTaskId,
                content,
            })
            state.nextTaskId++
        },
    },
    actions: {
        incrementOne: function(context){
	        setTimeout(() => {
	            context.commit('increment')
	        }, 3000)
  
	    },
	    getUsers: function({commit}){
            return axios.get('vuetest/json')
            .then(response => {
            commit('setUsers',response.data)
            })
            .catch(function (error) {
                    console.log(error)
            })
        }
    },
    modules: {
    }
})
export default store