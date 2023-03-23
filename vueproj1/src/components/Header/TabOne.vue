<template>
      

        <v-container fluid >
        <v-row justify="center" class="my-auto" >
          <!-- <v-col><v-container max-width="5%"/></v-col> -->
          <!-- <v-col>  -->
              <v-img  src="https://cdn.vuetifyjs.com/images/parallax/material.jpg" max-height="300"> <v-row justify="center" style="padding:9vw">
                 <v-text-field
          
                class="mx-4"
                flat
                hide-details
                label="Search"
                solo-inverted
              ></v-text-field>
              
              <v-btn icon>
                <v-icon>mdi-magnify</v-icon>
              </v-btn> </v-row></v-img>
              
            
           
              
                
               
              
         
           

            
            
          
        <!-- </v-col> -->
          <!-- <v-col><v-container max-width="5%"/></v-col> -->
        </v-row> 
        <v-row dense justify="center">
          <!-- <v-col><v-container width="20%"/></v-col> -->
          <!-- <v-row><v-divider/></v-row> -->
          <v-card
          class="mx-auto"
          max-width="100%"
          justify="center"
        >
        
          <v-container fluid >
            <v-row  >
              <v-col
                v-for="card in cards"
                :key="card.title"
                :cols="card.flex"
                :sm="card.flex"
                :lg="card.flex-2"
              >
                <v-card>
                  <v-img
                    :src="card.src"
                    class="white--text align-end"
                    gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
                    height="20vw"
                  
                  >
                    <v-card-title v-text="card.title"></v-card-title>
                  </v-img>
      
                  <v-card-actions>
                    <v-spacer></v-spacer>
      
                    <v-btn icon>
                      <v-icon>mdi-heart</v-icon>
                    </v-btn>
      
                    <v-btn icon>
                      <v-icon>mdi-bookmark</v-icon>
                    </v-btn>
      
                    <v-btn icon>
                      <v-icon>mdi-share-variant</v-icon>
                    </v-btn>
                  </v-card-actions>
                </v-card>
              </v-col>
            </v-row>
          </v-container>
        </v-card>
      
        
      </v-row>  
  
    </v-container>

       
  
</template>

 

  <script>
    // import HeaderCarousel from '@/components/HeaderCarousel'
  export default {
    name: 'TabOne',
    components:{
      // HeaderCarousel
    },
    data: () => ({
        cards: [
          { title: 'Favorite road trips', src: 'https://cdn.vuetifyjs.com/images/cards/road.jpg', flex: 6 },
          { title: 'Best airlines', src: 'https://cdn.vuetifyjs.com/images/cards/plane.jpg', flex: 6 },
          { title: 'Best airlines', src: 'https://cdn.vuetifyjs.com/images/cards/plane.jpg', flex: 6 },
          { title: 'Best airlines', src: 'https://cdn.vuetifyjs.com/images/cards/plane.jpg', flex: 6 },
          { title: 'Best airlines', src: 'https://cdn.vuetifyjs.com/images/cards/plane.jpg', flex: 6 },
          { title: 'Best airlines', src: 'https://cdn.vuetifyjs.com/images/cards/plane.jpg', flex: 6 },
          { title: 'Best airlines', src: 'https://cdn.vuetifyjs.com/images/cards/plane.jpg', flex: 6 },
          { title: 'Best airlines', src: 'https://cdn.vuetifyjs.com/images/cards/plane.jpg', flex: 6 },
          { title: 'Best airlines', src: 'https://cdn.vuetifyjs.com/images/cards/plane.jpg', flex: 6 },
          { title: 'Best airlines', src: 'https://cdn.vuetifyjs.com/images/cards/plane.jpg', flex: 6 },
          { title: 'Best airlines', src: 'https://cdn.vuetifyjs.com/images/cards/plane.jpg', flex: 6 },
          { title: 'Pre-fab homes', src: 'https://cdn.vuetifyjs.com/images/cards/house.jpg', flex: 6 },
        ],
      }),
    }
  </script>

<style lang="sass" scoped>
$text-field-border-radius :2
</style>