<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                    <div v-if="arrayAttribute != null">
                        ログインしています
                    </div>
                    <div v-else>
                        ログインしていません
                    </div>
                    
                    <app-child></app-child>
                    <p><button v-on:click="increment">UP</button>
                    <h1>Count:{{ count }}</h1>
                    <h1>ユーザ一覧</h1>
                    <div v-for="(user, index) in users" :key=user.id>
                      {{ user.id }}
                      {{ user.title }}
    
                    <button v-on:click="show(index)" class="button">show!</button>    
                    </div>
                    
                        <modal name="hello-world" :draggable="true" :resizable="true">
                            <div class="modal-header">
                                <h2>Modal title</h2>
                            </div>
                            <div class="modal-body" v-if="Id !== null">
                                <p>you're reading this text in a modal!</p>
                                <p>{{ users[Id].id }}</p>
                                <p>{{ users[Id].title }}</p>
                                <button v-on:click="hide">閉じる</button>
                            </div>  
                            <ul>
            <li v-for="tcomment in tcomments" v-bind:key="tcomment.id">
                {{ tcomment.id }}
                {{ tcomment.content }}
                {{ users[Id].id }}
            </li>
        </ul>
        <form v-on:submit.prevent="addComment">
            <textarea type="text" v-model="newComment" placeholder="コメント投稿"></textarea>
            <button type="submit">閉じる</button>
        </form>
                        </modal>
                    <div>selectFeedId : {{ Id }}</div>
                    
                    
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import AppChild from './AppChild.vue'
import VModal from 'vue-js-modal'
    export default {
        name: "FeedList",
        components:{
  	        AppChild
	    },
	    data: function () {
            return {
                user: "",
                tcomment: "",
                newComment: '',
                newTaskLabelIds: [],
            }  
        },
	    methods: {
  	        increment : function(){
  		        this.$store.dispatch('incrementOne')
  	        },
  	        show (i) {
            console.log("show")
            console.log(i)

            this.$store.commit('selectFeedId', i)
            this.$modal.show('hello-world')
            },
            hide : function () {
                this.$modal.hide('hello-world');
            },
            addComment () {
                this.$store.commit('addComment', {
                    content: this.newComment,
                })
                this.newComment = ''
            },
        },
        computed : {
  	        count : function(){
  		        return this.$store.state.count
  	        },
  	        users : function(){
  		        return this.$store.state.users
  	        },
  	        Id : function(){
  		        return this.$store.state.selectFeedId
  	        },
  	        tcomments () {
                return this.$store.state.tcomments
            },
        },
        mounted(){
            this.$store.dispatch('getUsers')
        },
        props: {
            arrayAttribute: Array,
        }
    }
</script>
