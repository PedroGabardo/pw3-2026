@extends('list/_base')

@section('conteudo')
    <p>Lixão dos guri</p>
    <p><a href="{{ @route('list.index') }}">Voltar</a></p>
    <hr>

    @if (session('mensagem'))
        <div> {{ session('mensagem') }}</div>
    @endif

    @foreach ($tasks as $task)
        <div style="border:1px solid; background-color: {{ $nota['cor'] }};padding:2px;width:200px;display:inline-block;margin:5px;">
            {{ $task['task'] }}
            <br><br>
            @if ($task['imagem'])
                <img src="{{ asset('storage/'.$task['imagem']) }}" width="200">
                <br><br>
            @endif

            <br>
            <a href="{{ route('list.trash.restore', $nota['id']) }}">Restaurar</a>
            <br>
            <a href="#">Apagar na moral</a>
        </div>
    @endforeach
@endsection