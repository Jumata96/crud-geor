<template>
  <div class="text-center">
    <v-btn
      class="mx-2"
      fab
      dark
      small
      color="pink"
    >
      <v-icon dark>
        mdi-minus
      </v-icon>
    </v-btn>

    <v-btn
      class="mx-2"
      fab
      dark
      small
      color="primary"
    >
      <v-icon dark>
        mdi-pencil
      </v-icon>
    </v-btn>

 
    
    
  </div>
  
</template>

<script>
  export default {
     props : ['ruta'],
    data () {
      return {
        headers: [ 
        ],
        desserts: [ 
        ],
      }
    },
  }
</script>