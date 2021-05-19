@extends('adminlte::page')

@section('title', 'GESTORISP')

@section('content_header')

<div class="container">
    <div class="row col-md-12">
        <div class="breadcrumb">
            <a href="{{url('/painel')}}" class="breadcrumb-item">Home  /</a> 
            <a href="{{url('/cobranca')}}" class="breadcrumb-item">Acordo</a>
        </div>
        <div class="title-pg">
            @if(isset($cobranca))

            <h1 class="title-pg"><i class="far fa-handshake"></i> EDITAR ACORDO Nº {{$cobranca->id}}</h1>
            <div class="voltar-lita">
                <i class="fas fa-arrow-circle-left"></i><a href="{{url('/cobranca')}}"> Voltar para a lista de Acordo</a> 
            </div>
            @else

            <h1 class="title-pg"><i class="far fa-handshake"></i> LANÇAR NOVO ACORDO</h1>
            <div class="voltar-lita">
                <i class="fas fa-arrow-circle-left"></i><a href="{{url('/cobranca')}}"> Voltar para a lista de Acordo</a> 
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


                        @if(isset($cobranca))
                            {!! Form::model($cobranca, ['route' => ['cobranca.update', $cobranca->id], 'class' => 'form-search form-ds', 'file' => true, 'method' => 'PUT'])!!}

                        @else
                            {!! Form::open(['route' => 'cobranca.store', 'class' => 'form-search form-ds', 'file' => true])!!}

                        @endif

                        <div class="form-group col-md-12 col-xl-12">

                            <div class="form-group col-md-6 col-xl-6">
                                <label>Associado</label>
                                {!! Form::text('associado', null, ['placeholder' => 'Associado:', 'class' => 'form-control'])!!}
                            </div>
                            <div class="form-group col-md-3 col-xl-3">    

                                <label>Placa</label>
                                {!! Form::text('placa', null, ['placeholder' => 'Placa:', 'class' => 'form-control'])!!}

                            </div>
                            <div class="form-group col-md-3 col-xl-3">      

                                <label>Data</label>
                                {!! Form::date('data', null, ['placeholder' => 'Data:', 'class' => 'form-control'])!!}

                            </div>
                            <div class="form-group col-md-3 col-xl-3">      

                                <label>Mensalidade</label>
                                {!! Form::number('valor_mensalidade', null, ['placeholder' => 'Valor R$:', 'class' => 'form-control',  'step' => 0.01, 'id' => 'valor_mensalidade'])!!}

                            </div>
                            <div class="form-group col-md-3 col-xl-3">      

                                <label>Valor Acordo</label>
                                {!! Form::number('valor_acordo', null, ['placeholder' => 'Valor R$:', 'class' => 'form-control',  'step' => 0.01, 'id' => 'valor_acordo'])!!}
                            </div>
                            <div class="form-group col-md-3 col-xl-3">      

                                <label>Programado</label>
                                {!! Form::date('data_pagamento', null, ['placeholder' => 'Programado:', 'class' => 'form-control'])!!}

                            </div>
                            <div class="form-group col-md-3 col-xl-3">      

                                <label>Local do Pagamento</label>
                                {!! Form::text('local_pag', null, ['placeholder' => 'Local do Pagamento:', 'class' => 'form-control'])!!}

                            </div>

                        </div>
                        <div class="form-group col-md-12 col-xl-12">
                            <div class="form-group col-md-6 col-xl-6">      

                                <label>Atendente</label>
                                {!! Form::text('atendente', null, ['placeholder' => 'Atendente:', 'class' => 'form-control'])!!}

                            </div>
                            <div class="form-group col-md-3 col-xl-3">      

                                <label>Possue Rastreador? </label>
                                {!! Form::select('rastreador', ['placeholder' => 'Escolha uma Opção', 'SIM' => 'SIM', 'NÃO' => 'NÃO'])
                                !!}

                            </div>
                            <div class="form-group col-md-3 col-xl-3">      

                                <label>Status</label><br>
                                {!! Form::select('status', ['placeholder' => 'Escolha uma Opção', 
                                'PAGO' => 'PAGO', 'ABERTO' => 'ABERTO', 'CANCELADO' => 'CANCELADO'])
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