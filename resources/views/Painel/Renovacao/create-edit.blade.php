@extends('adminlte::page')

@section('title', 'GESTORISP')

@section('content_header')

<div class="container">
    <div class="row col-md-12">
        <div class="breadcrumb">
            <a href="{{url('/painel')}}" class="breadcrumb-item">Home  /</a> 
            <a href="{{url('/renovar')}}" class="breadcrumb-item">Renovação</a>
        </div>
        <div class="title-pg">
            @if(isset($renovar))

            <h1 class="title-pg"><i class="far fa-handshake"></i> EDITAR RENOVAÇÃO Nº {{$renovar->id}}</h1>
            <div class="voltar-lita">
                <i class="fas fa-arrow-circle-left"></i><a href="{{url('/renovar')}}"> Voltar para a lista de Renovação</a> 
            </div>
            @else

            <h1 class="title-pg"><i class="far fa-handshake"></i> LANÇAR NOVA RENOVAÇÃO</h1>
            <div class="voltar-lita">
                <i class="fas fa-arrow-circle-left"></i><a href="{{url('/renovar')}}"> Voltar para a lista de Renovação</a> 
            </div>

            @endif

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box box-default">
            <div class="bloco-home box box-primary">
                <table class="tabela table table-striped">

                    <div class="formulario">
                        @if( isset($errors) && count($errors) > 0)

                        <div class="alert alert-warning">
                            @foreach($errors->all() as $error)

                            <p>{{$error}}</p>
                            @endforeach

                        </div>

                        @endif


                        @if(isset($renovar))
                            {!! Form::model($renovar, ['route' => ['renovar.update', $renovar->id], 'class' => 'form-search form-ds', 'file' => true, 'method' => 'PUT'])!!}

                        @else
                            {!! Form::open(['route' => 'renovar.store', 'class' => 'form-search form-ds', 'file' => true])!!}

                        @endif

                        <div class="form-group col-md-12 col-xl-12">

                            <div class="form-group col-md-6 col-xl-6">
                                <label>Associado</label>
                                {!! Form::text('associado', null, ['placeholder' => 'Associado:', 'class' => 'form-control'])!!}
                            </div>
                            
                            <div class="form-group col-md-3 col-xl-3">      

                                <label>Data Renovação</label>
                                {!! Form::date('data_r', null, ['placeholder' => 'Data da Renovação:', 'class' => 'form-control'])!!}

                            </div>
                            <div class="form-group col-md-3 col-xl-3">      

                                <label>Data do Atendimento</label>
                                {!! Form::date('data_a', null, ['placeholder' => 'Data do Atendimento:', 'class' => 'form-control'])!!}

                            </div>
                            <div class="form-group col-md-3 col-xl-3">      

                                <label>Valor Mensalidade</label>
                                {!! Form::number('valor_mensalidade', null, ['placeholder' => 'Valor R$:', 'class' => 'form-control',  'step' => 0.01, 
                                'id' => 'valor_mensalidade'])!!}

                            </div>
                            <div class="form-group col-md-3 col-xl-3">      

                                <label>Valor Renovação</label>
                                {!! Form::number('valor_renovacao', null, ['placeholder' => 'Valor R$:', 'class' => 'form-control',  'step' => 0.01, 
                                'id' => 'valor_acordo'])!!}
                            </div>
                            <div class="form-group col-md-3 col-xl-3">    

                                <label>Placa</label>
                                {!! Form::text('placa', null, ['placeholder' => 'Placa:', 'class' => 'form-control'])!!}

                            </div>
                        </div>
                        <div class="form-group col-md-12 col-xl-12">
                            <div class="form-group col-md-6 col-xl-6">      

                                <label>Atendente</label><br>
                                {!! Form::select('atendente', $filial, ['placeholder' => 'Escolha a Sua Filial:', 'class' => 'form-control'])!!}

                            </div>
                            <div class="form-group col-md-3 col-xl-3">      

                                <label>Possue Rastreador? </label>
                                {!! Form::select('rastreador', ['placeholder' => 'Escolha uma Opção', 'SIM' => 'SIM', 'NÃO' => 'NÃO'])
                                !!}

                            </div>
                            <div class="form-group col-md-3 col-xl-3">      

                                <label>Status</label><br>
                                {!! Form::select('status', ['placeholder' => 'Escolha uma Opção', 
                                'RENOVADO' => 'RENOVADO', 'A RENOVAR'=>'A RENOVAR', 
                                'AGUARDANDO' => 'AGUARDANDO', 'CANCELADO' => 'CANCELADO', 
                                'SEM CONTATO' => 'SEM CONTATO'])
                                !!}

                            </div>
                            <div class="form-group col-md-12 col-xl-12">
                            <div class="form-group col-md-12 col-xl-12">      

                                <label>Obsevação</label>
                                {!! Form::textarea('observacao', null, ['placeholder' => 'Observação:', 'class' => 'form-control'])!!}

                            </div>
                                
                            </div>
                            <div class="form-group col-md-12 col-xl-12">
                                <div class="form-group col-md-12 col-xl-12">
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
@endsection