<template>
  <v-sheet  class="overflow-hidden">
    <v-container fluid>  
      <v-row justify="center">
        <v-col :cols="3">
          <template>
          <v-card
            class="mx-auto"
          >
            <v-list>
              <v-list-item-group v-model="model">
                <v-list-item
                  v-for="(item, i) in items"
                  :key="i"
                >
                  <v-list-item-icon>
                    <v-icon v-text="item.icon"></v-icon>
                  </v-list-item-icon>
                  <v-list-item-content>
                    <v-list-item-title v-text="item.text"></v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
              </v-list-item-group>
            </v-list>
          </v-card>
        </template>

        </v-col>



        <v-col :cols="9"> 
                            <v-card
                            class="mx-auto"
                            
                          >
                          
                            <v-container fluid>
                              <v-row dense>
                                <v-col
                                  v-for="card in cards"
                                  :key="card.title"
                                  :cols="card.flex"
                                  :lg="card.flex-2"
                                >
                                  <v-card>
                                    <v-img
                                      :src="card.src"
                                      class="white--text align-end"
                                      gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
                                      height="200px"
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
        </v-col>
          <!-- <v-col><v-container max-width="30%"/></v-col> -->
        </v-row> 
        <v-row dense>
          <!-- <v-col><v-container width="20%"/></v-col> -->

      </v-row>  
    </v-container>
  </v-sheet>
     
  
</template>

 

  <script>
    // import HeaderCarousel from '@/components/HeaderCarousel'
  export default {
    name: 'TabTwo',
    components:{
      // HeaderCarousel
    },
    data: () => ({
      items: [
        {
          icon: 'mdi-inbox',
          text: 'Courselist',
        },
        {
          icon: 'mdi-star',
          text: 'Favorite',
        },
        {
          icon: 'mdi-send',
          text: 'Withdraw',
        },
        {
          icon: 'mdi-send',
          text: 'Homework Submission',
        },
        {
          icon: 'mdi-email-open',
          text: 'More..',
        },
        {
          icon: 'mdi-email-open',
          text: 'Drafts',
        },
      ],
      cards: [
        { title: 'Pre-fab homes', src: 'https://cdn.vuetifyjs.com/images/cards/house.jpg', flex: 6 },
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
      ],
      model: 1,
    }),
  }
</script>

<style lang="sass" scoped>
$text-field-border-radius :2
</style>