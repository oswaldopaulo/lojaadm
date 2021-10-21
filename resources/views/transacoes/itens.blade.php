@extends('default')
@section('content')  
@include('modalremover')

<style>
 td {
    white-space: nowrap;
 }
</style>

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Itens da Transação</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ url ('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url ('transacoes') }}">Transações</a></li>
            <li class="breadcrumb-item active">Itens da Transação</li>
        </ol>
        
        
                   @if (!empty($errors->all())) 
                    	 <div class="card bg-danger text-white mb-4 card mb-4" id="msg" style="padding: 5px">
                        	<ul>
                        	@foreach ($errors->all() as $error)
                        		<li>{{ $error }}</li>
                        	@endforeach
                        	</ul>
                    	</div>
                    @endif
                  					 
                              
                       
       
  
          			@if(session('acao'))
                    	 @if(session('id'))
                    	  <div class="card bg-warning text-white mb-4 card mb-4" id="msg" style="padding: 5px">
                                    <div class="card-body">
                                    <strong>Sucesso!</strong>
                                   	O registro {{ session('id')  }}  foi deletado.
                                     </div>   
                                    
                                </div>
                     @endif
                    @else
                    	@if(session('id'))
        				 <div class="card bg-success text-white mb-4 card mb-4" id="msg" style="padding: 5px">
                        	<div class="card-body">
                            	<strong>Sucesso! </strong>
                            	O registro {{ session('id')  }} {{ session('desc')  }} foi gravado.
                           </div>
                        </div>
                    
                      @endif
                    @endif
                    
         <div class="card mb-4">
            <div class="card-header">
                 <i class="fas fa-table mr-1"></i>
                             Transação {{ $transacao->id}}
            </div>
            
           
            <div class="card-body">
            
            <div class="row">
                
                
                <form  role="form" action="{{ url('/loja/novo') }}" method="post" class="form-inline">    
                          <input type="hidden"
										name="_token" value="{{{ csrf_token() }}}" />
                            
                            <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">Tra</label>
                    <div class="col-sm-4">
                      <input type="text" name="nome_estado" id="nome_estado" class="form-control"  required value="{{old('nome_estado')}}">
                    </div>
                      <label for="uf_estado" class="col-sm-1 col-form-label">UF</label>
                    <div class="col-sm-2">
                      <input type="text" name="uf_estado" id="uf_estado" class="form-control" required value="{{old('uf_estado')}}">
                    </div>
                    
                   <label for="codigo_estado" class="col-sm-1 col-form-label">C. IBGE</label>
                    <div class="col-sm-3">
                      <input type="text" name="codigo_estado" id="codigo_estado" class="form-control"  required  value="{{old('codigo_estado')}}">
                    </div>
                 </div>	
                              
                              
                          
                            </form>
            
             
             </div>
                        
            
         </div>
      </div>
        
                    
                    
        <div class="card mb-4">
            <div class="card-header">
                 <i class="fas fa-table mr-1"></i>
                               Cadastros 
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width ="100%" cellspacing="0">
                        <thead>
                            <tr>
                            
                                <th>Pedido</th>
                                <th>Produto</th>
                                <th>QTD</th>
                                <th>Preço U.</th>
                               
                                
                               
                            </tr>
                        </thead>
                     
                 
                        <tbody>
                        @foreach($t as $r)
                            <tr>
                            	
                            									
                            									
                            	
                                <td>{{$r->id_trans}} </td>
                              	<td>{{$r->description}}</td>
                              <td>{{$r->quantity}}</td>
                                <td>{{$r->price_unit}}</td>
                                
                           
                            </tr>
                          
                         @endforeach
     
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<script type="text/javascript">


 setInterval(function () {
    	 $('#msg').hide(); // show next div
    }, 5 * 1000); // do this every 10 seconds    


</script>
 @endsection        
