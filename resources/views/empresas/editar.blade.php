@extends('default')
@section('content')  

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Empresas</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ url ('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url ('cadastros/empresas') }}">Empresas</a></li>
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
                
              
			<form role="form" action="{{ url('cadastros/empresas/editar')}}" class="form" method="post">
			 <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
			 <input type="hidden" name="id" id="id" value="{{ $r->id}}" />
			 
				 <div class="form-group row">
                        <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-4">
                          <input type="text" name="nome"  class="form-control"  required value="{{$r->nome}}">
                        </div>

                         <label for="cpf" class="col-sm-2 col-form-label">CPF/CNPJ</label>
                        <div class="col-sm-4">
                          <input type="number" name="cpf"  class="form-control"  required value="{{$r->cpf}}">
                        </div>
                        
                     
                            
             	    </div>  
                
                    <div class="form-group row">
                             <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                              <input type="email" name="email"  class="form-control"   value="{{$r->email}}" required>
                            </div>
                  
                    </div>
                    
                       <div class="form-group row">
                            
                        <label for="token" class="col-sm-2 col-form-label">Token Publico</label>
                            <div class="col-sm-4 input-group">
                              <input type="text" name="token" id="token" class="form-control"   value="{{$r->token}}" required readonly>
                                 <div class="input-group-append">
                                <button class="btn btn-primary" type="button"  onClick="generateToken(token,50)" title="alterar token"><i class="fas fa-sync"></i></button>
                                </div>
                            </div>
                            
                            <label for="token" class="col-sm-2 col-form-label">Token Privado</label>
                            <div class="col-sm-4 input-group">
                              <input type="text" name="token2" id="token2" class="form-control"   value="{{$r->token2}}" required readonly>
                                 <div class="input-group-append">
                                <button class="btn btn-primary" type="button"  onClick="generateToken(token2,50)" title="alterar token"><i class="fas fa-sync"></i></button>
                                </div>
                            </div>
                    </div>
                
                    <div class="form-group row">
                        <label for="telefone" class="col-sm-2 col-form-label">Telefone</label>
                        <div class="col-sm-3">
                          <input type="text" name="telefone"  class="form-control"  value="{{ $r->telefone}}">
                        </div>

                         <label for="celular" class="col-sm-1 col-form-label">Celular</label>
                        <div class="col-sm-3">
                          <input type="text" name="celular"  class="form-control"  value="{{$r->celular}}">
                        </div>
                          <label for="cep_end" class="col-sm-1 col-form-label">CEP</label>
                        <div class="col-sm-2 input-group">
                          <input type="text" name="cep_end" id="cep_end"  class="form-control"  value="{{$r->cep_end}}">
                             <div class="input-group-append">
                            <button class="btn btn-primary" type="button"  onClick="getcep(cep_end.value)"title="Baixar do ViaCep"><i class="fas fa-cloud-download-alt"></i></button>
                        </div>
                        </div>
                        
                     </div>
                
                    
                    <div class="form-group row">
                      
                        
                         <label for="des_end" class="col-sm-2 col-form-label">Endereço</label>
                        <div class="col-sm-4">
                          <input type="text" name="des_end" id="des_end"  class="form-control"  value="{{$r->des_end}}">
                        </div>
                        
                        <label for="num_end" class="col-sm-1 col-form-label">Nº</label>
                        <div class="col-sm-2">
                          <input type="text" name="num_end" id="num_end"  class="form-control"  value="{{$r->num_end}}">
                        </div>
                        
                          <label for="compl_num_end" class="col-sm-1 col-form-label">Compl.</label>
                        <div class="col-sm-2">
                          <input type="text" name="compl_num_end" id="compl_num_end"  class="form-control"  value="{{$r->compl_num_end}}">
                        </div>
                      
                     </div> 
                
                <div class="form-group row">
                    
                    
                         <label for="bairro" class="col-sm-2 col-form-label">Bairro</label>
                        <div class="col-sm-3">
                          <input type="text" name="bairro" id="bairro"  class="form-control"  value="{{$r->bairro}}">
                        </div>
                    
                      <label for="des_cidade" class="col-sm-1 col-form-label">Cidade</label>
                        <div class="col-sm-3">
                          <input type="text" name="des_cidade" id="des_cidade"  class="form-control"  value="{{$r->des_cidade}}">
                        </div>
                        
                         <label for="des_uf" class="col-sm-1 col-form-label">UF</label>
                        <div class="col-sm-2">
                          <input type="text" name="des_uf" id="des_uf"  class="form-control"  value="{{$r->des_uf }}">
                        </div>
                    
                       
                       
                    
                     </div>  
                
                  <div class="form-group row">
                      <label for="observacao" class="col-sm-2 col-form-label">Observação</label>
                        <div class="col-sm-10">
                            <textarea name="observacao" id="observacao"   rows="5" class="form-control">{{$r->observacao}}</textarea>
                         
                        </div>
                    </div>
               
        		 <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="S" id="ativo" name="ativo"  @if($r->ativo=='S') checked @endif>
                      <label class="form-check-label" for="ativo">
                       Ativo 
                      </label>
                    </div>
                  </div>
					
					<a href="{{ url()->previous() }}"  class="btn btn-secondary">Cancelar</a>
					<button type="submit" class="btn btn-primary">Salvar</button>
				
            </form>
		 
                
                
                
                
            </div>
        </div>
    </div>
</main>
<script type="text/javascript" src="{{ asset('js/getcep.js')}}"/></script>
<script type="text/javascript" src="{{ asset('js/gettoken.js')}}"/></script>

 @endsection        
