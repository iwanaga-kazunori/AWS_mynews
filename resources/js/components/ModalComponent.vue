<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div id="app">
                        <button v-on:click="show" class="button">show!</button>
                        <modal name="hello-world" :draggable="true" :resizable="true">
                            <div class="modal-header">
                              <h2>Modal title</h2>
                            </div>
                            <div class="modal-body">
                              <p>you're reading this text in a modal!</p>
                              <button v-on:click="hide">閉じる</button>
                            </div>  
                        </modal>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
  
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
            
        },
        methods: {
        show : function() {
            this.$modal.show('hello-world');
        },
        hide : function () {
            this.$modal.hide('hello-world');
        },
        // computed: {
        // //     return this.$store.state.
        // // }
    },
    }
</script>
