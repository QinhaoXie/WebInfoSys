<template>
  <v-app class="overflow-hidden">
  <v-sheet  class="overflow-hidden">
    <v-container fluid>  
      
      <router-link to="/addcourse">
            <v-btn  plain large>
            Add Course
          </v-btn>
        </router-link>
        <router-link to="/userprofile">
            <v-btn  plain large>
            User Profile
          </v-btn>
        </router-link>
            
    </v-container>
  </v-sheet>
</v-app>
 
     
  
</template>

 

  <script>
    // import HeaderCarousel from '@/components/HeaderCarousel'
  export default {
    name: 'HomeView3',
    components:{
      // HeaderCarousel
    },
    data: () => ({
      model: 1,
    }),
  }
</script>

<style lang="sass" scoped>
$text-field-border-radius :2
</style>