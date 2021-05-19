@extends('adminlte::page')

@section('title', 'GESTORISP')

@section('content_header')

<div class="right_col" role="main">

    <div class="breadcrumb">
        <a href="/painel" class="breadcrumb-item">Home  /</a>
        <a href="" class="breadcrumb-item"> Lançamentos</a>
    </div>

    <div class="title-pg">
        <h1 class="title">GESTÃO DOS LANÇAMENTOS</h1>
    </div>
    @can('view_caixa')
    @if( Session::has('sucess') )
    <div class="alert alert-success hide-msg" style="float: left; width: 100%; margin: 10px 0px;">
        {{Session::get('sucess')}}
    </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4">               
                <a href="{{route('lancamentos.create')}}" class="btn-insert">
                    <span class="glyphicon glyphicon-plus"></span>
                    CADASTRAR
                </a>      
            </div>
            <div class="col-md-4">
                <span>Digite uma Data</span>
                <div class="form-search">
                    {!! Form::open(['route' => 'lancamentos.search', 'class' => 'form form-inline']) !!}
                    {!! Form::date('key-search', null, ['class' => 'form-control']) !!}
                    {!! Form::submit('Filtrar', ['class' => 'btn']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="col-md-4">
                <span>Pesquise por competencia ou protocolo</span>
                <div class="form-search">
                    {!! Form::open(['route' => 'lancamentos.search', 'class' => 'form form-inline']) !!}
                    {!! Form::text('key-search', null, [ 'class' => 'form-control', 'placeholder' => 'Competência ou Protocolo']) !!}
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
                        <tr>
                            <th>PROTOCOLO</th>
                            <th>SETOR</th>
                            <th>INDICADOR</th>
                            <th>COMPETÊNCIA</th>
                            <th>DATA</th>
                            <th>ONU</th>
                            <th>PTO</th>
                            <th>CORDAO</th>
                            <th>PASSANTE</th>
                            <th>CONECTOR</th>
                            <th>ESTICADOR</th>
                            <th>DROP</th>
                            <th>TIPO</th>
                            <th width="250">Ações</th>
                        </tr>

                        @forelse($lancamentos as $Lancamentos)

                        <tr>
                            <td>{{$Lancamentos->protocolo}}</td>
                            <td>{{$Lancamentos->areas['name']}}</td>
                            <td>{{$Lancamentos->indicador['name']}}</td>
                            <td>{{$Lancamentos->competencia}}</td>
                            <td>{{$Lancamentos->data}}</td>
                            <td>{{$Lancamentos->onu}}</td>
                            <td>{{$Lancamentos->pto}}</td>
                            <td>{{$Lancamentos->cordao}}</td>
                            <td>{{$Lancamentos->passante}}</td>
                            <td>{{$Lancamentos->conector}}</td>
                            <td>{{$Lancamentos->esticador}}</td>
                            <td>{{$Lancamentos->drop}}</td>
                            <td>{{$Lancamentos->tipo}}</td>

                            <td>

                                <a href="{{route('lancamentos.edit', $Lancamentos->id)}}" class="editar_conteudo"><span class="glyphicon glyphicon-pencil"></span></a>
                                <!-- Botão para acionar modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo">
                                    <i class="fa fa-trash" aria-hidden="true"></i></button>
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

                                                {!! Form::open(['route' => ['lancamentos.destroy', $Lancamentos->id], 'class' => 'form-search form-ds', 'method' => 'DELETE'])!!}

                                                <div class="form-group">

                                                    {!! Form::submit("SIM", ['class' => 'btn btn-danger'])!!}

                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>


                        @empty

                        <p>Nenhum Setor Cadastrado</p>
                        @endcan
                        @endforelse
                    </table>

                    @if( isset($dataForm) )
                    {!! $lancamentos->appends($dataForm)->links() !!}
                    @else
                    {!! $lancamentos->links() !!}
                    @endif


                </div>
            </div>
        </div>

                @endsection

                @push('scripts')

                <script>

                    $('#meuModal').on('shown.bs.modal', function () {
                        $('#meuInput').trigger('focus')
                    })

                </script>

