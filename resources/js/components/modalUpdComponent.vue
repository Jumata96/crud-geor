 <template>
    <div class="text-center">
        <v-dialog v-model="dialog" width="500">
            <template v-slot:activator="{ on, attrs }">
                

                <v-btn
                  class="mx-2"
                  fab
                  dark
                  small
                  color="primary"
                  v-bind="attrs"
                    v-on="on"
                >
                  <v-icon dark>
                    mdi-pencil
                  </v-icon>
                </v-btn>
            </template>

            <v-card>
                <v-card-title class="text-h5 grey lighten-2">
                    AGREGAR REGISTROS
                </v-card-title>

                <v-card-text>
                    <template>
                        <v-form v-model="valid">
                            <v-container>
                                <v-row>
                                    <v-col cols="12" md="6">
                                        <v-text-field
                                            v-model="firstname"
                                            :rules="nameRules"
                                            :counter="25"
                                            label="Nombre del libro"
                                            required
                                        ></v-text-field>
                                    </v-col>

                                    <v-col cols="12" md="6">
                                        <v-select
                                            v-model="select"
                                            :items="items"
                                            item-text="nombre"
                                            item-value="id"
                                            label="Biblioteca"
                                            persistent-hint
                                            return-object
                                        ></v-select>
                                    </v-col>

                                    <v-col cols="12" md="12">
                                        <v-text-field
                                            v-model="comentario"
                                            :rules="nameRules"
                                            :counter="255"
                                            label="Edicion"
                                            required
                                        ></v-text-field>
                                    </v-col>
                                      <template v-if="error>0">
                                         <v-alert
                                          border="top"
                                          color="red lighten-2"
                                          dark
                                          v-model="error"
                                        >
                                          <div v-for="error in errorMostrarMsjArticulo" :key="error" v-text="error">

                                        </div>
                                        </v-alert>


                                      </template>
                                   


                                </v-row>
                            </v-container>
                        </v-form>
                    </template>
                </v-card-text>

                <v-divider></v-divider>

                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="teal"   @click="actualizar()" >
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
    data() {
        return {
            dialog: false,
            select:null,
            error:0,
            errorMostrarMsjArticulo : [],          
            items: [
                { state: "Florida", abbr: "FL" }, 
            ],
            valid: false,
            firstname: '',
            comentario: '',nameRules: [
              v => !!v || 'Name is required',
              v => v.length <= 220 || 'Name must be less than 220 characters',
            ],
            email: '',
        };
    },
    methods: {
      listarForm(){
      //firstname
      //comentario
      //items
      //select
      let me=this;
             var url='/api/libro/'+this.id ;
                console.log(url,"llego")
                axios.get(url).then(function (response) {
                    var respuesta= response.data; 
                       console.log(respuesta,"llego")
                      me.firstname=respuesta[0].nombre;
                      me.comentario=respuesta[0].edicion;
                      me.items=respuesta[0].blibliotecas;
                     me.select=respuesta[0].biblioteca;


                    // me.items= respuesta;  
                })
                .catch(function (error) {
                    console.log(error);
                });
      },
      actualizar(){ 
          if (this.validardatos()){
                    return;
          }
          let me = this; 
          let variableId=0;

          if(Number.isInteger(this.select)){
                variableId=this.select;
          }else{
                variableId= this.select.id;
          }

          console.log(this.select,Number.isInteger(this.select));
                    
                axios.post('/api/updLibros',{ 
                    'descripcion': me.comentario,
                    'nombre': me.firstname, 
                    'idBiblioteca': variableId,
                    'id': me.id,
                }).then(function (response) {  
                    me.dialog = false; 
                   
                }).catch(function (error) {
                    console.log(error);
                });  
                this.$emit("click");
        },
        validardatos(){ 
                this.error=0;
                this.errorMostrarMsjArticulo =[];
               
                if (!this.select) this.errorMostrarMsjArticulo.push("La biblioteca no puede estar vacío.");
                if (!this.comentario) this.errorMostrarMsjArticulo.push("El comentario no puede estar vacío.");
                if (!this.firstname) this.errorMostrarMsjArticulo.push("El nombre  no puede estar vacío.");   
                 if (this.errorMostrarMsjArticulo.length) this.error = 1; 
                return this.error;
        },
    },
    mounted(){
    this.listarForm();
    }
  }
</script>