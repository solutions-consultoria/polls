@extends('templates.default')

@section('content')
<div class="container">
    <a href="{{route('polls.create')}}" class="btn btn-success" style="color: #f8fafc">Cadastrar nova Enquete</a>
    <table class="table table-bordered" style="margin-top: 2%;background-color: #f8fafc;border: solid;border-color: #937DC2">
        <thead>
            <tr>
                <th scope="col" style="width:20%">#</th>
                <th scope="col" style="width:20%">Nome</th>
                <th scope="col" style="width:16%">Criado em</th>
                <th scope="col" style="width:16%">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($polls as $s)
            <tr>
                <td>{{$s->id}}</td>
                <td>{{$s->name}}</td>
                <td>{{$s->created_at}}</td>
                <td>
                    <a href="" class="btn btn-danger">Deletar  enquete</a><br>
                    <a href="{{route('polls.sendWpp',['id'=>$s->id])}}" class="btn btn-success">Mandar link WPP</a>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
    <div class="row">
        {{ $polls->links('pagination::bootstrap-4')}}
    </div>
</div>


@endsection
