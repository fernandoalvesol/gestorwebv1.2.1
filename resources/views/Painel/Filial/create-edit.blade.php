@extends('adminlte::page')

@section('title', 'GESTORISP')

@section('content_header')

<div class="row">
    <div class="col-md-12">
        <div class="breadcrumb">
            <a href="{{url('/painel')}}" class="breadcrumb-item">Home  /</a> 
            <a href="{{url('/filial')}}" class="breadcrumb-item">Filial</a>
        </div>
        <div class="title-pg">
            @if(isset($filial))

            <h1 class="title-pg">EDITAR: {{$filial->name}}</h1>
            @else
            <div class="title-pg">
                <h1 class="title"><i class="fa fa-industry" aria-hidden="true"></i>
                    GESTÃO DE FILIAIS
                </h1>
            </div>
            @endif

        </div>
    </div>
    <div class="voltar-filial">
        <i class="fas fa-arrow-circle-left"></i><a href="{{url('/filial')}}"> Voltar para a lista de Usuários</a> 
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


                        @if(isset($filial))
                        {!! Form::model($filial, ['route' => ['filial.update', $filial->id], 'class' => 'form-search form-ds', 'file' => true, 'method' => 'PUT'])!!}

                        @else
                        {!! Form::open(['route' => 'filial.store', 'class' => 'form-search form-ds', 'file' => true])!!}

                        @endif

                        <div class="form-group col-md-10 col-xl-10">
                            <label>Nome da Filial</label>
                            {!! Form::text('name', null, ['placeholder' => 'Filial:', 'class' => 'form-control'])!!}
                        </div>
                        <div class="form-group col-md-10 col-xl-10">  

                            <label>Cidade</label>
                            {!! Form::text('cidade', null, ['placeholder' => 'Localização:', 'class' => 'form-control'])!!}

                        </div>
                        <div class="form-group col-md-10 col-xl-10">

                            <label>Endereço</label><br>
                            {!! Form::text('endereco', null, ['placeholder' => 'Endereco:', 'class' => 'form-control'])!!}

                        </div>
                        <div class="form-group col-md-10 col-xl-10">  

                            <label>Fone</label><br>
                            {!! Form::text('fone', null, ['placeholder' => 'Fone:', 'class' => 'form-control'])!!}

                        </div>
                        <div class="form-group col-md-10 col-xl-10"> 

                            <label>Email</label><br>
                            {!! Form::text('email', null, ['placeholder' => 'Email:', 'class' => 'form-control'])!!}

                        </div>


                        <div class="form-group col-md-10 col-xl-10">

                            <button class="btn btn-enviar"> Enviar</button>

                        </div>
                    </div>
                    {!! Form::close()!!}
                </table>
            </div>
        </div>
    </div><!--Content Dinâmico-->

</div>
@endsection