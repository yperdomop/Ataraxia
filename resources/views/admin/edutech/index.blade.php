<x-app-layout>
    {{--   @if (session('info'))
         <div class="alert alert-success">
             <strong>{{session('info')}}</strong>
         </div>    
     @endif  --}}
     <body>
      <form action="" class="formulario"> 
      <h1 class="formulario__titulo">Formulario de datos</h1>
      <div class="mb-3"><br>
        
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese el nombre">
      </div>
      <div class="mb-3">
       
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese el apellido">
      </div>
      <div class="mb-3">
        
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese la cédula">
      </div>
      <div class="mb-3">
       
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese la dirección">
      </div>
      <div class="mb-3">
        
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese el nit">
      </div>
      <div class="mb-3">
        
        <input type="phone" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese el teléfono">
      </div>
      <div class="mb-3">
        
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese el email">
      </div>
      <div class="mb-3">
     
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese la razón social">
      </div>
      <div class="mb-3">
        
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese el país">
      </div>
      <div class="mb-3">
      
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese el deporte">
      </div>
      <div class="mb-3">
       
        <input class="form-control" type="file" id="formFileMultiple" multiple>
      </div>
      
      <input type="submit" class="formulario__submit" value="Continuar">
      
  </form>
  </tbody>    
     
 </x-app-layout>