@extends('templates.default')

@section('content')
<div class="container" id="app">

    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-top: 20px">
            <div class="card">
                <div class="card-header" style="background-color: #937DC2;color: #f8fafc">Cadastro</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('polls.createPost') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome da Enquete</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="known_name" class="col-md-4 col-form-label text-md-right">Qual a quantidade de respostas possíveis?</label>

                            <div class="col-md-6">
                                <select class="form-control" id="selecthowquetions">
                                    <option id="2question">2</option>
                                    <option id="3question">3</option>
                                    <option id="4question">4</option>
                                    <option id="5question">5</option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Digite as respostas</label>

                            <div class="col-md-6">
                                 <input id="answer1" name="answer1" type="text" class="form-control" required>
                                 <input id="answer2" name="answer2" type="text" class="form-control" required>
                                 <input id="answer3" name="answer3" type="text" class="form-control" >
                                 <input id="answer4" name="answer4" type="text" class="form-control" >
                                 <input id="answer5" name="answer5" type="text" class="form-control" >
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Cadastrar Enquete
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    //Para deixar os selects da quantidade de questão dinamicos
    //FOI FEITO DE FORMA TOSCA FAVOR NÃO REPETIR, OTIMIZAR POSTERIORMENTE


$(document).ready(function() {
  $('#answer3').hide();
  $('#answer4').hide();
  $('#answer5').hide();

  $('#selecthowquetions').change(function() {
    if ($('#selecthowquetions').val() == '2') {
      $('#answer1').show();
      $('#answer2').show();
      $('#answer3').hide();
      $('#answer4').hide();
      $('#answer5').hide();
      $('#answer3').val('');
      $('#answer4').val('');
      $('#answer5').val('');
    }
    if ($('#selecthowquetions').val() == '3') {
      $('#answer1').show();
      $('#answer2').show();
      $('#answer3').show();
      $('#answer4').hide();
      $('#answer5').hide();
      $('#answer4').val('');
      $('#answer5').val('');
    }
    if ($('#selecthowquetions').val() == '4') {
      $('#answer1').show();
      $('#answer2').show();
      $('#answer3').show();
      $('#answer4').show();
      $('#answer5').hide();
      $('#answer5').val('');
    }
    if ($('#selecthowquetions').val() == '5') {
      $('#answer1').show();
      $('#answer2').show();
      $('#answer3').show();
      $('#answer4').show();
      $('#answer5').show();
    }
  });
});
</script>
@endsection

