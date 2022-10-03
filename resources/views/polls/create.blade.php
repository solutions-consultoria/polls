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
                                    <option id="1question">1</option>
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
                                 <input id="question1" name="question1" type="text" class="form-control" >
                                 <input id="question2" name="question2" type="text" class="form-control" >
                                 <input id="question3" name="question3" type="text" class="form-control" >
                                 <input id="question4" name="question4" type="text" class="form-control" >
                                 <input id="question5" name="question5" type="text" class="form-control" >
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
  $('#question2').hide();
  $('#question3').hide();
  $('#question4').hide();
  $('#question5').hide();

  $('#selecthowquetions').change(function() {
    if ($('#selecthowquetions').val() == '1') {
      $('#question1').show();
      $('#question2').hide();
      $('#question3').hide();
      $('#question4').hide();
      $('#question5').hide();
      $('#question2').val('');
      $('#question3').val('');
      $('#question4').val('');
      $('#question5').val('');
    }
    if ($('#selecthowquetions').val() == '2') {
      $('#question1').show();
      $('#question2').show();
      $('#question3').hide();
      $('#question4').hide();
      $('#question5').hide();
      $('#question3').val('');
      $('#question4').val('');
      $('#question5').val('');
    }
    if ($('#selecthowquetions').val() == '3') {
      $('#question1').show();
      $('#question2').show();
      $('#question3').show();
      $('#question4').hide();
      $('#question5').hide();
      $('#question4').val('');
      $('#question5').val('');
    }
    if ($('#selecthowquetions').val() == '4') {
      $('#question1').show();
      $('#question2').show();
      $('#question3').show();
      $('#question4').show();
      $('#question5').hide();
      $('#question5').val('');
    }
    if ($('#selecthowquetions').val() == '5') {
      $('#question1').show();
      $('#question2').show();
      $('#question3').show();
      $('#question4').show();
      $('#question5').show();
    }
  });
});
</script>
@endsection

