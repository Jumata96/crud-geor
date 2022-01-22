<template>
  <div class="text-center" >
    <v-dialog
      v-model="dialog"
      width="500"
      card class="pink"
    >
      <template v-slot:activator="{ on, attrs }"> 

        <v-btn
          class="mx-2"
          fab
          dark
          small
          color="pink"
           v-bind="attrs"
          v-on="on"
        >
          <v-icon dark>
            mdi-minus
          </v-icon>
        </v-btn>
      </template>

      <v-card class="pink">
         
        <v-card-text> 
        <br/>
        <br/>
           <h3 class="white--text"  >ESTA SEGURO DE ELIMINAR ESTE REGISTRO ?</h3>


            
           
        </v-card-text>

        <v-divider></v-divider>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
           color="deep-pink lighten-2"
            text
            @click="eliminar"
          >
            I accept
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>
<script>
  export default { 
      props : ['id'], 
      inheritAttrs: false, 
      data () {
      return {
        dialog: false,
      }
    },
    methods: {
      obtenerValor(){
      console.log("llego 12");
      console-log("llego dato ",this.idElemento);
      },
      eliminar(){
       console.log("llego a eleiminar",this.id);

                    let me=this;
                    let valor =me.idElemento;
                    axios.post('/api/deleteLibros',{
                        'id':this.id,
                    }).then(function (response) {
                        //me.listarArticulo(1,'','nombre');
                        console.log(response,"llego eliminar");
                        me.dialog = false;
                         
                    }).catch(function (error) {
                        console.log(error);
                    });
                   this.$emit("click");
      }, 

    },
    mounted() { 
    this.obtenerValor(); 
    },
  }
</script>