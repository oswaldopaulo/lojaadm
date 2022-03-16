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
                
                
                <form  role="form" action="{{ url('transacoes/setstatus') }}" method="post" class="form-inline">    
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
						<input type="hidden" name="id" value="{{$transacao->id}}" />
						
						
						 <div class="form-group mb-2">
                            <label for="staticEmail2" class="sr-only">Status</label>
                            <input type="text" readonly class="form-control-plaintext"  value="Status: {{ $transacao->status_desc}}">
                          </div>
                          
                          @if($transacao->notafiscal)
                              <div class="form-group mb-2">
                                <label for="notafiscal" class="sr-only">Nota Fiscal</label>
                                <input type="text" readonly class="form-control-plaintext"  value="Nota Fiscal: {{ $transacao->notafiscal}}">
                              </div>
                          @endif
                          
                          @if($transacao->codigorastreio)
                              <div class="form-group mb-2">
                                <label for="codigorastreio" class="sr-only">C. Rastreio</label>
                                <input type="text" readonly class="form-control-plaintext"  value="C.Rastreio: {{ $transacao->codigorastreio}}">
                              </div>
                          @endif
                          
                          <!-- 
                          <div class="form-group mx-sm-3 mb-2">
                            <label for="inputPassword2" class="sr-only">Password</label>
                            <input type="password" class="form-control" id="inputPassword2" placeholder="Password">
                          </div>
                           -->
                          @if($transacao->status == 'A') 
                          	<button type="submit" class="btn btn-primary mb-2">Mudar o status para Processado</button>
                          @elseif($transacao->status == 'P') 
                          		<button type="submit" class="btn btn-primary mb-2">Mudar o status para em separação</button>
                          @elseif($transacao->status == 'S') 
                          	 <div class="form-group mx-sm-3 mb-2">
                            <label for="notafiscal" class="sr-only">Nota Fiscal</label>
                            <input type="text" class="form-control" name="notafiscal" placeholder="Nota Fiscal" required>
                            
                            <label for="notafiscalfile" class="sr-only">Arquivo</label>
                            <input type="file" class="form-control" name="notafiscalfile" placeholder="Arquivo Nota Fiscal">
                            
                          </div>
                          	<button type="submit" class="btn btn-primary mb-2">Mudar o status para  Faturado</button>
                          	
                          @elseif($transacao->status == 'F') 
                          	 <div class="form-group mx-sm-3 mb-2">
                            <label for="codigorastreio" class="sr-only">Codigo de Rastreio</label>
                            <input type="text" class="form-control" name="codigorastreio" placeholder="Cod.Rastreio" required>
                            
                            </div>
                          	<button type="submit" class="btn btn-primary mb-2">Mudar o status para  Em transporte</button>
                          	
                          @elseif($transacao->status == 'T') 
                          	
                          	<button type="submit" class="btn btn-primary mb-2">Mudar o status para  Entregue</button>
                          	
                          @endif
                            
                
                              
                              
                          
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
