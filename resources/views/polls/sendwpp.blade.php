@extends('templates.default')

@section('content')
<div class="container" id="app">

    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-top: 20px">
            <div class="card">
                <div class="card-header" style="background-color: #937DC2;color: #f8fafc">Enviar Link do WhatsApp para votação</div>

                <div class="card-body">
                    <h4>Para selecionar multiplos usuários, segurar CTRL.</h4>
                    <form method="post" action="">
                        <div class="form-group row">
                            <select style="" name="users[]" class="mdb-select md-form" multiple>
                                <option value="" disabled>Escolha os usuários</option>
                                @foreach($users as $u)
            
                                <option value="{{$u->id}}" >{{$u->cpf}}</option>
            
                                @endforeach
            
            
                            </select>
                        </div>
                        <input type="hidden" name="id" value="{{$poll->id}}">
                        @csrf
                       
                        <button type="submit" class="btn-save btn btn-success btn-sm">Enviar link da enquete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
