require('./bootstrap');
//Vue, Vuexをインポート
import Vue from 'vue';
import Vuex from 'vuex';
//VueにVuexを登録
Vue.use(Vuex);

//ストアを作成
const store = new Vuex.Store ({
    //ステート
    state: {
        count: 0  
    },
    //ミューテーション
    mutations: {
        increment (state, amount) {
            state.count += amount
        }  
    },
})

//ステートを参照
console.log (store.state.count)
//ミューテーションを実行し、ステートを更新
store.commit('increment', 1)
//ステートの更新を確認
console.log(store.state.count)
