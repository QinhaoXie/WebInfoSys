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
 v-model="searchword"
              ></v-text-field>
                <!-- v-model="searchword"-->
              <br>

<v-autocomplete
  auto-select-first
  clearable
  dense
  solo
  v-model="searchword"
  :items="items"

></v-autocomplete>

              
              <v-btn @click="search" icon>
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
            
                    <v-card-title @click="detail(card.title)" v-text="card.title"></v-card-title>
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
  import $ from 'jquery'
    // import HeaderCarousel from '@/components/HeaderCarousel'
  export default {
    name: 'TabOne',
    components:{
      // HeaderCarousel
    },
    data: () => ({
        searchword:null,
        cards: [{ title: 'Favorite road trips', src: 'https://cdn.vuetifyjs.com/images/cards/road.jpg', flex: 6 },
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
        items:[],
      }),
      methods:{
        search(){
          var url = "https://infs3202-942629ae.uqcloud.net/lara/course/index/"+this.searchword;
          console.log(url);
              $.get(url,
                  {
                  },
                  function(data, status){
                    console.log("sent");
                    console.log("Data: " + data + "\nStatus: " + status);
                    // if(data!="login failed:The provided credentials do not match our records."){
                    //   // alert("Login Success");
                    // window.location.href="https://infs3202-942629ae.uqcloud.net/vue";
                    // }else{alert(data);}
                    localStorage.setItem("data",data);
                    
                  });
                  var list=[];
          var result =JSON.parse(localStorage.getItem("data"));
          // this.cards=[];
          $.each(result, function (id, course) {
            
          if(id==1){
            console.log(id,course); 
            console.log(course.coursename);
            console.log(course.teacher);
            console.log(course.course_description);
        }
          list.push({title :course.coursename, src: 'https://cdn.vuetifyjs.com/images/cards/road.jpg', flex: 6})
          
          // this.id=result[0].id;
          //   this.name=result[0].name;
          //   // this.infos.email=result[0].email;
          //   this.personalintro=result[0].personalintro;
          //   if( this.personalintro==''){ this.personalintro='empty';}
            
          });
          console.log(list);
          this.cards=list;
        },
        detail(coursename){
            // this.$router.push({ name: 'CourseInfo', params: { coursename: coursename }});
            this.$router.push({path: '/CourseInfo', query: {coursename: coursename}});
        },
        searchautocomp(){
          console.log("autocomplete")
          var url = "https://infs3202-942629ae.uqcloud.net/lara/course/index/autocomp"+this.searchword;
          console.log(url);
              $.get(url,
                  {
                  },
                  function(data, status){
                    console.log("sent");
                    console.log("Data: " + data + "\nStatus: " + status);
                    // if(data!="login failed:The provided credentials do not match our records."){
                    //   // alert("Login Success");
                    // window.location.href="https://infs3202-942629ae.uqcloud.net/vue";
                    // }else{alert(data);}
                    localStorage.setItem("itemsdata",data);
                    
                  });
                  var autocomplist=[];
          var result =JSON.parse(localStorage.getItem("itemsdata"));
          // this.cards=[];
          $.each(result, function (id, course) {
            
          if(id==1){
            console.log(id,course); 
            console.log(course.coursename);
        
        }
          autocomplist.push(course.coursename)
          
          // this.id=result[0].id;
          //   this.name=result[0].name;
          //   // this.infos.email=result[0].email;
          //   this.personalintro=result[0].personalintro;
          //   if( this.personalintro==''){ this.personalintro='empty';}
            
          });
          console.log(autocomplist);
          this.items=autocomplist;
        },
      }
    }
  </script>

<style lang="sass" scoped>
$text-field-border-radius :2
</style>