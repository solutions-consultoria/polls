@extends('templates.default')
@section('content')
<div style="width:50%; margin-left:25%; margin-top: 200px">



  <div class="card" style="">
      <h5 class="card-header text-center" style="background-color: #937DC2;color: #f8fafc">Polls</h5>
      <div class="card-body">
        <form action="{{ route('auth.login') }}" method="post">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="text" id="cpf" name="cpf" class="form-control" required />
            <label class="form-label" for="cpf" >CPF</label>
          </div>
        
          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" id="login_token" name="login_token" class="form-control" required />
            <label class="form-label" for="login_token">Token</label>
          </div>
        
          <div class="row mb-4" style="width:50%;margin-left:16%"> 
            <button type="submit" class="btn btn-primary btn-block mb-4">Logar</button>
          </div>
        
          </div>
          <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        </form>
      </div>
  </div>

</div>
@stop