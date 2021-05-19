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
            <h1 class="title-pg"><i class="far fa-handshake"></i> ACORDO Nº  <b>{{$cobranca->id or 'Novo'}}</b></h1>
            <div class="voltar-lita">
                <i class="fas fa-arrow-circle-left"></i><a href="{{url('/cobranca')}}"> Voltar para a lista de Acordo</a> 
            </div>
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
                                {!! Form::text('associado', null, ['placeholder' => 'Associado:', 'class' => 'form-control', 'disabled' => 'disabled'])!!}
                            </div>
                            <div class="form-group col-md-3 col-xl-3">    

                                <label>Placa</label>
                                {!! Form::text('placa', null, ['placeholder' => 'Placa:', 'class' => 'form-control', 'disabled' => 'disabled'])!!}

                            </div>
                            <div class="form-group col-md-3 col-xl-3">      

                                <label>Data</label>
                                {!! Form::date('data', null, ['placeholder' => 'Data:', 'class' => 'form-control', 'disabled' => 'disabled'])!!}

                            </div>
                            <div class="form-group col-md-3 col-xl-3">      

                                <label>Mensalidade</label>
                                <input type="text" name="valor_mensalidade" class="form-control" placeholder="{{$cobranca->valor_mensalidade}}" disable="disable">

                            </div>
                            <div class="form-group col-md-3 col-xl-3">      

                                <label>Valor Acordo</label>
                                <input type="text" name="valor_acordo" class="form-control" placeholder="{{$cobranca->valor_acordo}}" disable="disable">

                            </div>
                            <div class="form-group col-md-3 col-xl-3">      

                                <label>Programado</label>
                                {!! Form::date('data_pagamento', null, ['placeholder' => 'Programado:', 'class' => 'form-control', 'disabled' => 'disabled'])!!}

                            </div>
                            <div class="form-group col-md-3 col-xl-3">      

                                <label>Local do Pagamento</label>
                                {!! Form::text('local_pag', null, ['placeholder' => 'Local do Pagamento:', 'class' => 'form-control', 'disabled' => 'disabled'])!!}

                            </div>

                        </div>
                        <div class="form-group col-md-12 col-xl-12">
                            <div class="form-group col-md-6 col-xl-6">      

                                <label>Atendente</label>
                                {!! Form::text('atendente', null, ['placeholder' => 'Atendente:', 'class' => 'form-control', 'disabled' => 'disabled'])!!}

                            </div>
                            <div class="form-group col-md-3 col-xl-3">      

                                <label>Possue Rastreador? </label>
                                <input type="text" name="rastreador" class="form-control" placeholder="{{$cobranca->rastreador}}" disable="disable">


                            </div>
                            <div class="form-group col-md-3 col-xl-3">      

                                <label>Status</label><br>
                                <input type="text" name="status" class="form-control" placeholder="{{$cobranca->status}}" disable="disable">


                            </div>
                            <div class="form-group col-md-12 col-xl-12">
                                <div class="form-group col-md-12 col-xl-12">      

                                    <label>Obsevação</label>
                                    {!! Form::textarea('observacao', null, ['placeholder' => 'Observação:', 'class' => 'form-control', 'disabled' => 'disabled'])!!}

                                </div>

                            </div>

                        </div>
                </table>
                @can('view_caixa')
                <div class="bnt-excluir-cobranca">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo">
                        Excluir
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">DESEJA REALMENTE EXCLUIR O LANÇAMENTO?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-footer">

                                    {!! Form::open(['route' => ['cobranca.destroy', $cobranca->id], 'class' => 'form-search form-ds', 'method' => 'DELETE'])!!}

                                    <div class="form-group">

                                        {!! Form::submit("SIM", ['class' => 'btn btn-danger'])!!}

                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                @endcan

                {!! Form::close()!!}

            </div><!--Content Dinâmico-->

        </div>
    </div>
</div>
@endsection
<script>

    $('#meuModal').on('shown.bs.modal', function () {
        $('#meuInput').trigger('focus')
    })

</script>