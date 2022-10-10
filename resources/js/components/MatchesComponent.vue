<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        mathces component
                        {{ matches }}
                        {{ match2 }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        data() {
            return {
                matches:[],
                match2: [
                    {id:2},
                    {id:3}
                ]
                
            }
        },
        mounted() {
            console.log('Component mounted.11111')
            axios.get('/api/matches')
            .then(function(response){
                console.log(response.data)
                this.matches = response.data
            })
            .catch(function(error){
                console.log(error)
            })
            
        },
        computed: {
            getMatches () {
                return this.$store.state.matches = matches
            }
        }
    }
</script>
