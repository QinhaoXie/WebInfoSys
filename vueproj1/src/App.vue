<template>
  <div id="app" >
    <v-row><MainpageHeader/></v-row>
    
    <!-- <nav>
      <router-link to="/">Home</router-link> |
      <router-link to="/about">About</router-link>
    </nav> -->
    <router-view  id="scrolling-techniques-3" />
    
    <!-- <MainpageFooter/> -->
  </div>
</template>
<!-- 
<style lang="scss">
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

nav {
  padding: 30px;

  a {
    font-weight: bold;
    color: #2c3e50;

    &.router-link-exact-active {
      color: #42b983;
    }
  }
}
</style> -->

<script>

import MainpageHeader from '@/components/MainpageHeader';
// import MainpageFooter from '@/components/MainpageFooter';
export default {
  name: 'App',

  components: {
    MainpageHeader,
    // MainpageFooter,
    // HelloWorld,
  },

  
  data: () => ({
    drawer: false,

    }),

};
</script>
