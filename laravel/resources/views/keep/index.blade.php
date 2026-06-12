@extends('keep/_base')

@section('conteudo')
    <p>Bem-vindo ao Little Keep!</p>
    <p><a href="{{ @route('keep.create') }}">Adicionar nota</a></p>
    <p><a href="{{ @route('keep.trash') }}">🚮 Lixeira</a></p>
    <hr>
    
    @if (session('mensagem'))
        <div> {{ session('mensagem') }}</div>
    @endif

    @foreach ($notas as $nota)
        <div style="border:1px solid; background-color: {{ $nota['cor'] }};padding:2px;width:200px;display:inline-block;margin:5px;">
            {{ $nota['nota'] }}
            <br><br>
            @if ($nota['imagem'])
                <img src="{{ asset('storage/'.$nota['imagem']) }}" width="190px">
                <br><br>
            @endif
            Criada: {{ \Carbon\Carbon::parse($nota['created_at'])->diffForHumans() }}

            @if ($nota['created_at'] != $nota['updated_at'])
                <br>
                Editada: {{ \Carbon\Carbon::parse($nota['updated_at'])->diffForHumans() }}
            @endif

            <br>
            <a href="{{ route('keep.edit', $nota['id']) }}">📝</a>
            <a href="{{ route('keep.delete', $nota['id']) }}">❌</a>
        </div>
    @endforeach
@endsection