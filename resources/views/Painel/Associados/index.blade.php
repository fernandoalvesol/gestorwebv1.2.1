@extends('adminlte::page')

@section('title', 'GESTORISP')

@section('content_header')

<div class="right_col" role="main">

    <div class="breadcrumb">
        <a href="/painel" class="breadcrumb-item">Home  /</a>
        <a href="" class="breadcrumb-item"> Usuarios</a>
    </div>


    <div class="title-pg">
        <h1 class="title">
            <i class="fas fa-user-plus"></i> GESTÃO DE ASSOCIADOS
        </h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">               
                <a href="{{route('adesao.create')}}" class="btn-insert">
                    <span class="glyphicon glyphicon-plus"></span>
                    CADASTRAR
                </a>      
            </div>
            <div class="col-md-6">
                <div class="form-search">
                    {!! Form::text('', null, ['class' => 'form-control', 'placeholder' => 'Pesquisar por Certame:']) !!}
                    {!! Form::submit('Filtrar', ['class' => 'btn']) !!}
                    {!! Form::close() !!}
                </div>

            </div>                  
        </div>
    </div>
    @if( Session::has('sucess') )
    <div class="alert alert-success hide-msg" style="float: left; width: 100%; margin: 10px 0px;">
        {{Session::get('sucess')}}
    </div>
    @endif
    <div row>
        <div class="col-md-12">
            <div class="box box-default">
                <div class="bloco-home box box-primary">
                    <table class="tabela table table-striped">
                        <tr>
                            <th>Nome Associado</th>
                            <th>CPF</th>
                            <th>RG</th>
                            <th>Data de Nascimento</th>
                            <th>Data de Adesão</th>
                            <th>Fone</th>
                            <th>Celular</th>
                            <th width="250">Ações</th>
                        </tr>

                        @forelse($associados as $associado)
                        <tr>
                            <th>{{$associado->name}}</th>
                            <th>{{$associado->cpf}}</th>
                            <th>{{$associado->rg}}</th>
                            <th>{{$associado->dtnascimento}}</th>
                            <th>{{$associado->dtadesao}}</th>
                            <th>{{$associado->fone}}</th>
                            <th>{{$associado->celular}}</th>

                            <td>

                                <a href="" title="Exibir Associado" class="exibir_conteudo"><span class="glyphicon glyphicon-eye-open"></span></a>
                                <a href="" title="Editar Associado" class="editar_conteudo"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="" title="incluir veículo" class="veiculo_conteudo"><i class="fa fa-car" aria-hidden="true"></i></a>

                            </td>

                        </tr>

                        @empty

                        <p>Nenhum Setor Cadastrado</p>

                        @endforelse

                    </table>

                </div>
            </div>

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

