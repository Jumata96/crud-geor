@extends('layoutsVuetify.app')

@section('content')
<v-app app>
  <v-container>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8"> 
      <hr> 
      {{-- <modal-component :ruta="ruta"> </modal-component> --}}
        <example-component></example-component>  
    </div>
  </div>
</div>
</v-container>
</v-app>
@endsection



 