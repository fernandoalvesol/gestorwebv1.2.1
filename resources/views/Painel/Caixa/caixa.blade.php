@extends('adminlte::page')

@section('title', 'GESTORISP')

@section('content_header')

<div class="right_col" role="main">

    <div class="breadcrumb">
        <a href="{{ url('/painel') }}" class="breadcrumb-item">Painel</a>
    </div>


    <div class="title-pg">
        <h1 class="title">FLUXO DE CAIXA</h1>
    </div>

    @if( Session::has('sucess') )
    <div class="alert alert-success hide-msg" style="float: left; width: 100%; margin: 10px 0px;">
        {{Session::get('sucess')}}
    </div>
    @endif

    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="form-search col-xl-6 col-md-6">
            @can('view_caixa')
                <span>Pesquisar por: Conta | Número do Boleto | Filial | Placa </span>
            @endcan    
                {!! Form::open(['route' => 'caixas.search', 'class' => 'form form-inline']) !!}
                {!! Form::text('key-search', null, ['class' => 'form-control', 'placeholder' => 'Pesquisar por: Título | Placa' ]) !!}
                {!! Form::submit('Filtrar', ['class' => 'btn']) !!}
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
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Placa</th>
                            <th>Tipo</th>
                            <th>Data</th>
                            <th>Descrição</th>
                            <th>Conta</th>
                            <th>Filial</th>
                            <th>Valor</th>   
                            @can('view_caixa')
                            <th width="30">Ação</th>
                            @endcan

                        </tr>
                    </thead>
                    <tbody>
                        @forelse($caixas as $caixa)

                        <tr>
                            <td>{{$caixa->N_TITULO}}</td>
                            <td>{{$caixa->PLACA}}</td>
                            @if($caixa->TIPO == 1)
                            <td>Entrada</td>
                            @else
                            <td>Saída</td>
                            @endif                   
                            <td> {{date('d/m/Y', strtotime($caixa->DATA))}} </td>
                            <td>{{$caixa->DESCRICAO}}</td>
                            <td>{{ $caixa->CONTA }}</td>
                            <td>{{$caixa->FILIAL}}</td>                    
                            <td>R$ &nbsp;{{$caixa->VALOR}}</td>
                            @can('view_caixa')
                            <td>
                                <div class="form-inline">
                                    <button class="edit-btn"><a href="{{route('caixaedit.edit', $caixa->id)}}"><i class="fas fa-pencil-alt"></i></a></button>
                                    <button class="show-btn"><a href="{{route('caixaedit.show', $caixa->id)}}"><i class="glyphicon glyphicon-eye-open"></i></a></button>
                                </div>
                            </td>
                            @endcan
                        </tr>
                        @empty
                    <div style="text-align: center;">
                        <h3><b>CAIXA NÃO TEM MOVIMENTO</b></h3>
                    </div>
                    @endforelse
                    </tbody>

                </table>

            </div>

        </div>
    </div>    
</div>

@if( isset($dataForm) )
{!! $caixas->appends($dataForm)->links() !!}
@else
{!! $caixas->links() !!}
@endif

</div>

@endsection

@push('scripts')

<script>

    $('#meuModal').on('shown.bs.modal', function () {
        $('#meuInput').trigger('focus')
    })

</script>
