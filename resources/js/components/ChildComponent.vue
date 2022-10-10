<template>
    
</template>

<script>
    var counterButton = Vue.extend({
  template: '<span>{{counter}}個<button v-on:click="addToCart">追加</button></span>',
  data: function () {
    return {
      counter: 0
    }
  },
  methods: {
    addToCart: function () {
      this.counter += 1
      this.$emit('increment') // incrementカスタムイベントの発火
    }
  },
})
</script>
