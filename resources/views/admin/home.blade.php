@extends('templates.default')
@section('content')
    <div class="d-flex justify-content-end">
      <form action="{{ route('auth.logoff') }}" method="post">
        <button type="submit" class="btn btn-danger">Deslogar</button>
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
      </form>
    </div>
    
    <div style="width:50%; margin-left:25%; margin-top: 200px">
        <div class="card" style="">
            <h5 class="card-header text-center" style="background-color: #937DC2;color: #f8fafc">Enquetes</h5>
            <div class="card-body text-center">
                <h5 class="card-title text-center">Crie, edite ou veja as enquentes criadas</h5>
                <a href="{{ route('polls.index') }}" class="btn btn-primary">Entrar</a>
            </div>
        </div>
        <div class="card" style="margin-top: 20px">
            <h5 class="card-header text-center" style="background-color: #937DC2;color: #f8fafc">Usuários</h5>
            <div class="card-body text-center">
                <h5 class="card-title text-center">Crie, edite ou veja os usuários criados</h5>
                <a href="#" class="btn btn-primary">Entrar</a>
            </div>
        </div>
        
    </div>
    @stop
