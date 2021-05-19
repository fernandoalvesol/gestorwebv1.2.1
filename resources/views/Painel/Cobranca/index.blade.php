@extends('adminlte::page')

@section('title', 'GESTORISP')

@section('content_header')

<div class="right_col" role="main">

    <div class="breadcrumb">
        <a href="/painel" class="breadcrumb-item">Home  /</a>
        <a href="" class="breadcrumb-item"> Acordo</a>
    </div>

    <div class="title-pg">
        <h1 class="title"><i class="far fa-handshake"></i> LANÇAMENTO DE ACORDOS</h1>
    </div>

    @if( Session::has('sucess') )
    <div class="alert alert-success hide-msg" style="float: left; width: 100%; margin: 10px 0px;">
        {{Session::get('sucess')}}
    </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3">               
                <a href="{{route('cobranca.create')}}" class="btn-insert">
                    <span class="glyphicon glyphicon-plus"></span>
                    LANÇAMENTO
                </a>      
            </div>
            <div class="col-md-3">
                <span>Digite a data da Cobrança</span>
                <div class="form-search">
                    {!! Form::open(['route' => 'cobranca.search', 'class' => 'form form-inline', 'btn-pesquisar-acordos']) !!}
                    {!! Form::date('key-search', null, ['class' => 'form-control']) !!}
                    {!! Form::submit('Pesquisar', ['class' => 'btn']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="col-md-3">
                <span>Pesquisar: Placa</span>
                <div class="form-search">
                    {!! Form::open(['route' => 'cobranca.search', 'class' => 'form form-inline']) !!}
                    {!! Form::text('key-search', null, [ 'class' => 'form-control', 'placeholder' => 'Pesquisar']) !!}
                    {!! Form::submit('Pesquisar', ['class' => 'btn']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="col-md-3">
                <span>Pesquise: Status</span>
                <div class="form-search">
                    {!! Form::open(['route' => 'cobranca.search', 'class' => 'form form-inline']) !!}
                    {!! Form::select('key-search', ['placeholder' => 'Escolha uma Opção', 
                                'ABERTO'=>'ABERTO','PROGRAMADO'=>'PROGRAMADO',
                                'CANCELADO' => 'CANCELADO','PAGO'=>'PAGO'])
                                !!}
                    {!! Form::submit('Pesquisar', ['class' => 'btn']) !!}
                    {!! Form::close() !!}
                </div>                 
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="bloco-home box box-primary">
                        <table class="tabela table table-striped">
                            <tr>
                                <th>Acordo</th>
                                <th>Associado</th>
                                <th>Placa</th>
                                <th>Mensalidade</th>
                                <th>Acordo</th>
                                <th>Data</th>
                                <th>Programado</th>
                                <th>Atendente</th>
                                <th>Rastredor</th>
                                <th>Status</th>
                                <th width="250">Ações</th>
                            </tr>

                            @forelse($cobranca as $cobrancas)
                            <tr>
                                <td>{{$cobrancas->id}}</td>
                                <td>{{$cobrancas->associado}}</td>
                                <td>{{$cobrancas->placa}}</td>
                                <td>R$ &nbsp;{{$cobrancas->valor_mensalidade}}</td>
                                <td>R$ &nbsp;{{$cobrancas->valor_acordo}}</td>
                                <td>{{$cobrancas->data}}</td>
                                <td>{{$cobrancas->data_pagamento}}</td>
                                <td>{{$cobrancas->atendente}}</td>
                                <td>{{$cobrancas->rastreador}}</td>
                                <td>{{$cobrancas->status}}</td>

                                <td>

                                    <a href="{{route('cobranca.show', $cobrancas->id)}}" class="exibir_conteudo"><span class="glyphicon glyphicon-eye-open"></span> Exibir</a>
                                    <a href="{{route('cobranca.edit', $cobrancas->id)}}" class="editar_conteudo"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
                                    <!-- Botão para acionar modal -->
                                </td>
                            </tr>

                            @empty

                            <p>Nenhuma Cobrança Cadastrada</p>

                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>


        @if( isset($dataForm) )
        {!! $cobranca->appends($dataForm)->links() !!}
        @else
        {!! $cobranca->links() !!}
        @endif


    </div>

    @endsection

    @push('scripts')

    <script>

        $('#meuModal').on('shown.bs.modal', function () {
            $('#meuInput').trigger('focus')
        })

    </script>

