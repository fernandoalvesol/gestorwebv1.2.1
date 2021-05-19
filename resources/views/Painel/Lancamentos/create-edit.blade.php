@extends('adminlte::page')

@section('title', 'GESTORISP')

@section('content_header')

<div class="container">
    <div class="row col-md-12">
        <div class="breadcrumb">
            <a href="{{url('/painel')}}" class="breadcrumb-item">Home  /</a> 
            <a href="{{url('/lancamentos')}}" class="breadcrumb-item">Lançamentos</a>
        </div>
        <div class="title-pg">
            @if(isset($lancamentos))

            <h1 class="title-pg">PROTOCOLO Nº {{$lancamentos->protocolo}}</h1>
            @else

            <h1 class="title-pg">CADASTRAR NOVO LANCAMENTO</h1>

            @endif

        </div>

    </div>
</div>
<div class="voltar-lita">
    <i class="fas fa-arrow-circle-left"></i><a href="{{url('/lancamentos')}}"> Voltar para a lista de Lançamentos</a> 
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="bloco-home box box-primary">
                    <table class="tabela table table-striped">

                        <div class="formulario col-md-12">
                            @if( isset($errors) && count($errors) > 0)

                            <div class="alert alert-warning">
                                @foreach($errors->all() as $error)

                                <p>{{$error}}</p>
                                @endforeach

                            </div>

                            @endif


                            @if(isset($lancamentos))
                            {!! Form::model($lancamentos, ['route' => ['lancamentos.update', $lancamentos->id], 'class' => 'form-search form-ds', 'file' => true, 'method' => 'PUT'])!!}

                            @else
                            {!! Form::open(['route' => 'lancamentos.store', 'class' => 'form-search form-ds', 'file' => true])!!}

                            @endif

                            <div class="form-group col-md-12 col-xl-12">

                                <div class="form-group col-md-2">
                                    <p>Escolha o Setor:</p>
                                    {!! Form::select('areas_id', $setores, null, ['placeholder' => 'Escolha o Setor', 'class' => 'form-control'])!!}
                                    <div class="voltar-lita">
                                        <a href="{{route('setores.create')}}"> Cadastrar Novo Setor</a> 
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <p>Escolha o Indicador:</p>
                                    {!! Form::select('indicadores_id', $indicadores, null, ['placeholder' => 'Escolha do Indicador', 'class' => 'form-control'])!!}
                                    <div class="voltar-lita">
                                        <a href="{{route('indicador.create')}}"> Cadastrar Novo Indicador</a> 
                                    </div>
                                </div>
                                <div class="form-group col-md-2 col-xl-2">    

                                    <label>Data do Lançamento</label><br>
                                    {!! Form::date('data', 'null', ['class' => 'form-control'])!!}

                                </div>
                                <div class="form-group col-md-2 col-xl-2">    

                                    <label>Hora do Lançamento</label><br>
                                    {!! Form::time('hora', null, ['class' => 'form-control'])!!}

                                </div>
                                <div class="form-group col-md-2 col-xl-2">  

                                    <label>Competência</label><br>
                                    {!! Form::select('competencia', ['JANEIRO' => 'JANEIRO', 'FEVEREIRO' => 'FEVEREIRO', 'MARÇO' => 'MARÇO', 'ABRIL' => 'ABRIL',
                                    'MAIO' => 'MAIO', 'JUNHO' => 'JUNHO', 'JULHO' => 'JULHO', 'AGOSTO' => 'AGOSTO', 'SETEMBRO' => 'SETEMBRO',
                                    'OUTUBRO' => 'OUTUBRO', 'NOVEMBRO' => 'NOVEMBRO', 'DEZEMBRO' => 'DEZEMBRO'])!!}

                                </div>

                            </div>
                            <label class="material">Material Usado</label>
                            <div class="form-group col-md-12 col-xl-12">

                                <div class="form-group col-md-2">
                                    <p>ONU</p>
                                    {!! Form::text('onu', null, ['placeholder' => 'Total de ONU:', 'class' => 'form-control'])!!}
                                </div>
                                <div class="form-group col-md-2">
                                    <p>PTO</p>
                                    {!! Form::text('pto', null, ['placeholder' => 'Total de PTO:', 'class' => 'form-control'])!!}
                                </div>
                                <div class="form-group col-md-2">
                                    <p>CORDAO SC/APC</p>
                                    {!! Form::text('cordao', null, ['placeholder' => 'Total de Cordao:', 'class' => 'form-control'])!!}
                                </div>
                                <div class="form-group col-md-2">
                                    <p>CONECTOR FB</p>
                                    {!! Form::text('conector', null, ['placeholder' => 'Conector:', 'class' => 'form-control'])!!}
                                </div>
                            </div>

                            <div class="form-group col-md-12 col-xl-12">
                                <div class="form-group col-md-2">
                                    <p>PASSANTE</p>
                                    {!! Form::text('passante', null, ['placeholder' => 'Passante:', 'class' => 'form-control'])!!}
                                </div>
                                <div class="form-group col-md-2">
                                    <p>ESTICADOR CUNHA</p>
                                    {!! Form::text('esticador', null, ['placeholder' => 'Esticador de Cunha:', 'class' => 'form-control'])!!}
                                </div>
                                <div class="form-group col-md-2">
                                    <p>DROP</p>
                                    {!! Form::text('drop', null, ['placeholder' => 'Drop:', 'class' => 'form-control'])!!}
                                </div>
                                <div class="form-group col-md-2 col-xl-2">  

                                    <label>Tipo de O.S.</label><br>
                                    {!! Form::select('tipo', ['INSTALAÇÃO' => 'INSTALAÇÃO', 'SUPORTE' => 'SUPORTE'])!!}

                                </div>
                                <div class="form-group col-md-2">
                                    <p>PROTOCOLO</p>
                                    {!! Form::text('protocolo', null, ['placeholder' => 'Protocolo:', 'class' => 'form-control'])!!}
                                </div>
                            </div>

                            <div class="form-group col-md-12 col-xl-12">


                            </div>
                            <div class="form-group col-md-12 col-xl-12">
                                <div class="form-group col-md-11 col-xl-11">      

                                    <label>Descrição</label>
                                    {!! Form::textarea('descricao', null, ['placeholder' => 'Descrição:', 'class' => 'form-control'])!!}

                                </div>
                                <div class="form-group col-md-12 col-xl-12">
                                    <div class="form-group col-md-11 col-xl-11">
                                        <button class="btn btn-enviar"> Enviar</button>
                                    </div>
                                </div>
                            </div>  


                            {!! Form::close()!!}

                        </div><!--Content Dinâmico-->
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection