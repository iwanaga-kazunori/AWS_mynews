<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                    <ul>
  	                    <li v-for="user in users">{{ user.name }} ({{ user.email }})</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'AppChild',
        computed :{
  	        users : function(){
  		        return this.$store.getters.users;
  	        }
        },
    }
</script>
