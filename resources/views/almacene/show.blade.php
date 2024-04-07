@extends('layouts.app')

@section('template_title')
    {{ $almacene->name ?? __('Show') . " " . __('Almacene') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Almacene</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('almacenes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Nombre:</strong>
                            {{ $almacene->nombre }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Direccion:</strong>
                            {{ $almacene->direccion }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Telefono:</strong>
                            {{ $almacene->telefono }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Capacidad:</strong>
                            {{ $almacene->capacidad }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
