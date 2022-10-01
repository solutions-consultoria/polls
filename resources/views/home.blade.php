@extends('templates.default')
@section('content')
<div style="width:50%; margin-left:25%; margin-top: 200px">

<h2 class="text-center">Polls</h2>
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

  <div class="row mb-4" style="width:50%;margin-left:25%"> 
    <button type="submit" class="btn btn-primary btn-block mb-4">Logar</button>
  </div>

  </div>
  <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
</form>
</div>
@stop