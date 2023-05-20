<template>
  <v-app class="overflow-hidden" >
    
    <v-main>      
      <div>
    
        <NeviMenu/>
        <!-- space before login sheet -->
        <v-container style="height: 150px;"> </v-container>
        <!-- login sheet -->
        <v-sheet>
              <v-container
              class="fill-height"
              fluid
            >
              <v-row
                align="center"
                justify="center"
              >
                <v-col
                  cols="12"
                  sm="8"
                  md="4"
                >
                  <v-card class="elevation-12">
                        <!-- top Login Form Bar -->
                        <v-toolbar
                          color="primary"
                          dark
                          flat
                        >
                            <!-- background-color -->
                            <template v-slot:img="{ props }">
                              <v-img
                                v-bind="props"
                                gradient="to top right, rgba(100,115,201,.7), rgba(25,32,72,.7)"
                              ></v-img>
                            </template>
                            <!-- text -->
                            <v-app-bar-title>Login Form</v-app-bar-title>
                            <v-spacer></v-spacer>
                        </v-toolbar>
                    <v-card-text>

                      <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
  <!-- Identify your business so that you can collect the payments. -->
  <input type="hidden" name="business" value="kin@kinskards.com">

  <!-- Specify a PayPal Shopping Cart Add to Cart button. -->
  <input type="hidden" name="cmd" value="_cart">
  <input type="hidden" name="add" value="1">

  <!-- Specify details about the item that buyers will purchase. -->
  <input type="hidden" name="item_name"
        value="Birthday - Cake and Candle">
  <input type="hidden" name="amount" value="3.95">
  <input type="hidden" name="currency_code" value="USD">

  <!-- Provide a drop-down menu option field, without prices. -->
  <input type="hidden" name="on0" value="Color">
  <label for="os0">Color scheme</label>
    <select name="os0" id="os0">
      <option value="Select a color scheme">-- Select a color scheme --</option>
      <option value="Blue">Blue</option>
      <option value="Pink">Pink</option>
      <option value="Yellow">Yellow</option>
  </select>

  <!-- Display the payment button. -->
  <input type="image" name="submit"
    src="https://www.paypalobjects.com/en_US/i/btn/btn_cart_LG.gif"
    alt="Buy with Paypal">
  <img alt="" width="1" height="1"
    src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
</form>

                      
                    </v-card-text>
                    
                    <v-card-actions>
             
                    </v-card-actions>
                  </v-card>
                </v-col>
              </v-row>
            </v-container>
   
            
            <!-- <MainpageFooter/> -->

        </v-sheet>
      </div>
    </v-main>
   
  </v-app>
  
</template>

<script>
// @ is an alias to /src
import $ from 'jquery'
import NeviMenu from '@/components/NeviMenu';
//  import MainpageHeader from '@/components/MainpageHeader';
//  import MainpageFooter from '@/components/MainpageFooter';
$(document).ready(function(){
  $("#loginbtn").click(function(){
  $.ajax({url:"https://infs3202-942629ae.uqcloud.net/lara/user/login/111/222/",
  dataType:'json',
  async:false,
  success:function(data){
  console.log(data);
  }
  
});
// alert(htmlobj.responseText)
  });
});
export default {
  name: 'PayPage',

  components: {
    // MainpageHeader,
    // MainpageFooter,
    NeviMenu,
    // HelloWorld,
  },

  data: () => ({
    drawer: false,
    checkbox: false, 
    login:{
      username:null,
      password:null
    },
    }),
    methods:{
      loginpost(){
        console.log("clicked");
        

        $.post("https://infs3202-942629ae.uqcloud.net/lara/user/login",
        // $.post("https://localhost:8000/user/login",
          {
            username: this.login.username,
            password: this.login.password,
          },
          function(data, status){
            console.log("sent");
            console.log("Data: " + data + "\nStatus: " + status);
            if(data!="login failed:The provided credentials do not match our records."){
              // alert("Login Success");
            window.location.href="https://infs3202-942629ae.uqcloud.net/vue";
            }else{alert(data);}
          
          });
        } 
    }

    // watch: {
    //   group () {
    //     this.drawer = false
    //   },
    // },

};
</script>




