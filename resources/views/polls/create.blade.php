@extends('templates.default')

@section('content')
<div class="container" id="app">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cadastro</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('polls.create.post') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome da Enquete</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="known_name" class="col-md-4 col-form-label text-md-right">Qual a quantidade de respostas possíveis?</label>

                            <div class="col-md-6">
                                <select>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>

                                @error('known_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">Tipo</label>

                            <div class="col-md-6">

                                <select name="type" id="type"  class="form-control @error('type') is-invalid @enderror" value="{{ old('type') }}" required autofocus>
                                    <option value="Faculdade">Faculdade</option>
                                    <option value="Universidade">Universidade</option>
                                </select>

                                @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">Pública ou Privada</label>

                            <div class="col-md-6">

                                <select name="public_or_private" id="public_or_private"  class="form-control " required autofocus>
                                    <option value="Privada">Privada</option>
                                    <option value="Pública">Pública</option>
                                </select>

                                @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right">Estado</label>

                            <div class="col-md-6">
                                <select id="state" multiple name="states[]" class="form-control @error('state') is-invalid @enderror" value="{{ old('state') }}" required>
                                  @foreach($states as $s)
                                        <option value="{{$s->id_state}}">{{$s->descricao}}</option>
                                    @endforeach
                                </select>

                                @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="main_city" class="col-md-4 col-form-label text-md-right">Cidade Sede</label>

                            <div class="col-md-6">

                                <input id="main_city" type="text" class="form-control @error('main_city') is-invalid @enderror" name="main_city" value="{{ old('main_city') }}"  autocomplete="name" autofocus>


                                @error('main_city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Cadastrar Instituição
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

