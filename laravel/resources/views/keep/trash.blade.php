@extends('keep/_base')

@section('conteudo')
    <p>🚮 Lixeira do Little Keep!</p>
    <p><a href="{{ @route('keep.index') }}">Voltar</a></p>
    <hr>

    @if (session('mensagem'))
        <div> {{ session('mensagem') }}</div>
    @endif

    @foreach ($notas as $nota)
        <div style="border:1px solid; background-color: {{ $nota['cor'] }};padding:2px;width:200px;display:inline-block;margin:5px;">
            {{ $nota['nota'] }}
            <br><br>
            Apagada: {{ \Carbon\Carbon::parse($nota['deleted_at'])->diffForHumans() }}

            <br>
            <a href="{{ route('keep.trash.restore', $nota['id']) }}">♻️ Restaurar</a>
            <a href="#">🔥 Apaga de vez</a>
        </div>
    @endforeach
@endsection