@extends('adminlte::page')

@section('title', 'GESTORISP')

@section('content_header')

<div class="right_col" role="main">

    <div class="breadcrumb">
        <a href="/painel" class="breadcrumb-item">Home  /</a>
        <a href="" class="breadcrumb-item"> Renovação</a>
    </div>

    <div class="title-pg">
        <h1 class="title"><i class="far fa-handshake"></i> CONTROLE DE RENOVAÇÃO</h1>
    </div>

    @if( Session::has('sucess') )
    <div class="alert alert-success hide-msg" style="float: left; width: 100%; margin: 10px 0px;">
        {{Session::get('sucess')}}
    </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3">               
                <a href="{{route('renovar.create')}}" class="btn-insert">
                    <span class="glyphicon glyphicon-plus"></span>
                    LANÇAMENTO
                </a>      
            </div>
            <div class="col-md-3">
                <span>Digite a data da Renovação</span>
                <div class="form-search">
                    {!! Form::open(['route' => 'renovar.search', 'class' => 'form form-inline']) !!}
                    {!! Form::date('key-search', null, ['class' => 'form-control']) !!}
                    {!! Form::submit('Pesquisar', ['class' => 'btn']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="col-md-3">
                <span>Pesquisar: Placa</span>
                <div class="form-search">
                    {!! Form::open(['route' => 'renovar.search', 'class' => 'form form-inline', 'btn-pesquisar-renovar']) !!}
                    {!! Form::text('key-search', null, [ 'class' => 'form-control', 'placeholder' => 'Pesquisar']) !!}
                    {!! Form::submit('Pesquisar', ['class' => 'btn']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="col-md-3">
                <span>Pesquise: Status</span>
                <div class="form-search">
                    {!! Form::open(['route' => 'renovar.search', 'class' => 'form form-inline']) !!}
                    {!! Form::select('key-search', ['placeholder' => 'Escolha uma Opção', 
                                'RENOVADO' => 'RENOVADO', 'A RENOVAR'=>'A RENOVAR'])
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
                                <th>Renovação</th>
                                <th>Associado</th>
                                <th>Placa</th>
                                <th>Valor Mensalidade</th>
                                <th>Valor Renovação</th>
                                <th>Data</th>
                                <th>Atendente</th>
                                <th>Rastredor</th>
                                <th>Status</th>
                                <th width="250">Ações</th>
                            </tr>

                            @forelse($renovar as $renova)
                            <tr>
                                <td>{{$renova->id}}</td>
                                <td>{{$renova->associado}}</td>
                                <td>{{$renova->placa}}</td>
                                <td>R$ &nbsp;{{$renova->valor_mensalidade}}</td>
                                <td>R$ &nbsp;{{$renova->valor_renovacao}}</td>
                                <td>{{$renova->data}}</td>
                                <td>{{$renova->atendente}}</td>
                                <td>{{$renova->rastreador}}</td>
                                <td>{{$renova->status}}</td>

                                <td>

                                    <a href="{{route('renovar.show', $renova->id)}}" class="exibir_conteudo"><span class="glyphicon glyphicon-eye-open"></span> Exibir</a>
                                    <a href="{{route('renovar.edit', $renova->id)}}" class="editar_conteudo"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
                                    <!-- Botão para acionar modal -->
                                </td>
                            </tr>

                            @empty

                            <p>Nenhuma Renovação Cadastrada</p>

                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    
        @if( isset($dataForm) )
        {!! $renovar->appends($dataForm)->links() !!}
        @else
        {!! $renovar->links() !!}
        @endif


    </div>

    @endsection

    @push('scripts')

    <script>

        $('#meuModal').on('shown.bs.modal', function () {
            $('#meuInput').trigger('focus')
        })

    </script>

