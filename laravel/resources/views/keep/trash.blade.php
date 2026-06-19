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
            @if ($nota['imagem'])
                <img src="{{ asset('storage/'.$nota['imagem']) }}" width="200">
                <br><br>
            @endif
            Apagada: {{ \Carbon\Carbon::parse($nota['deleted_at'])->diffForHumans() }}

            <br>
            <a href="{{ route('keep.trash.restore', $nota['id']) }}">♻️ Restaurar</a>
            <br>
            <a href="#">🔥 Apagar para sempre, para nunca mais ser recuperado</a>
        </div>
    @endforeach
@endsection