@extends('layouts.app')

@section('title1')

@endsection

@section('title2')
                <h5>
                    Reserva de Ambientes
                </h5>

@endsection

@section('content')
                <div style="margin-top: 1%; display: flex; justify-content: center;">
                        @if ($errors->any())
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Por favor corrige los siguentes errores:</strong>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                        @endif
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        @csrf

                    </form>
                </div>

@endsection


@section('footer')



@endsection
