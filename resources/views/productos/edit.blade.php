@extends('layout')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Editar Producto</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('productos.update', $producto->id_producto) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('productos.form')
                </form>
            </div>
        </div>
    </div>
@endsection


