@extends('layouts.app')

@section('template_title')
    Almacene
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Almacenes') }}
                            </span>

                            {{-- Mostrar el botón de creación solo si la ruta actual no es almacene.index --}}
                            @if (request()->route()->getName() !== 'almacene.index')
                            <div class="float-right">
                                <a href="{{ route('almacenes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Crear nuevo') }}
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Nombre</th>
                                        <th>Direccion</th>
                                        <th>Telefono</th>
                                        <th>Capacidad</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($almacenes as $almacene)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $almacene->nombre }}</td>
                                            <td>{{ $almacene->direccion }}</td>
                                            <td>{{ $almacene->telefono }}</td>
                                            <td>{{ $almacene->capacidad }}</td>
                                            <td>
                                                {{-- Ocultar botones cuando la ruta es almacene.index --}}
                                                @if (request()->route()->getName() !== 'almacene.index')
                                                <form action="{{ route('almacenes.destroy',$almacene->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('almacenes.show',$almacene->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('almacenes.edit',$almacene->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Borrar') }}</button>
                                                </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Aplicando estilos para las flechas de paginación -->
                <div class="d-flex justify-content-center">
                    {!! $almacenes->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
