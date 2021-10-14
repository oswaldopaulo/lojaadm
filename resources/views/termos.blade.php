@extends('default')
@section('content')  
@include('modalremover')
@php use \App\Http\Controllers\ParametrosController @endphp

 <script src="{{ asset ('summernote/summernote-bs4.min.js') }}"></script>
 <link href="{{ asset('summernote/summernote-bs4.min.css') }}" rel="stylesheet">



<main>
    <div class="container-fluid">
        <h1 class="mt-4">Termos</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ url ('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url ('cadastros/produtos') }}">Termos</a></li>
            <li class="breadcrumb-item active">Alteração Cadastro</li>
        </ol>
        <!-- 
        <div class="card mb-4">
        
            <div class="card-body">
         		
             
            </div>
        </div>
         -->
        <div class="card mb-4">
            <div class="card-header">
                 <i class="fas fa-table mr-1"></i>
                              Alteração Cadastros
            </div>
            
           
            <div class="card-body">
              
                 @if (!empty($errors->all())) 
                    	<div class="alert alert-danger col-lg-12">
                    	<ul>
                    	@foreach ($errors->all() as $error)
                    		<li>{{ $error }}</li>
                    	@endforeach
                    	</ul>
                    	</div>
                    @endif  
                
              
			<form role="form" action="{{ url('parametros')}}" class="form" method="post" enctype="multipart/form-data">
			 <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
			
		
				 <div class="form-group row">
                    <label for="descricao" class="col-sm-1 col-form-label">Descrição</label>
                    <div class="col-sm-11">
                      <input type="text"  class="form-control"  required value="Termos" readonly="readonly">
                    </div>
              </div>   
              
             	
                
                <div class="form-group row">
                    <label for="par[termos]" class="col-sm-1 col-form-label">Termos e Condicões</label>
                    <div class="col-sm-11">
                    
                    <textarea  class="form-control" name="par[termos]" id="ficha" rows="20" cols="">{!! ParametrosController::getParametro('termos') !!}</textarea>
                   
                 </div>
                 
                  
                 </div>
                 
                 <div class="form-group row">
                    <label for="par[politica]" class="col-sm-1 col-form-label">Política de Privacidade</label>
                    <div class="col-sm-11">
                    
                    <textarea  class="form-control" name="par[politica]" id="politica" rows="20" cols="">{!! ParametrosController::getParametro('politica') !!}</textarea>
                   
                 </div>
                 </div>
        
        
					
					<a href="{{ url()->previous() }}"  class="btn btn-secondary">Cancelar</a>
					<button type="submit" class="btn btn-primary">Salvar</button>
				
            </form>
		 
                
                
                
                
            </div>
        </div>
        
          
        
        
    </div>
    
    
</main>

<script type="text/javascript">
$(document).ready(function() {
    $('#ficha').summernote({
      height:300,
    });

    $('#politica').summernote({
        height:300,
      });
});
    
</script>


 @endsection        
