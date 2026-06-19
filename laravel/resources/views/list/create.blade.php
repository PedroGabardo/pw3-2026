@extends('list/_base')

@section('conteudo')
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ isset($task) ? route('task.edit', $task['id']) : route('task.create') }}" enctype="multipart/form-data">
        @csrf
        @if (isset($task))
            @method('PUT')
        @endif
        <textarea name="task">{{ old('task', $task['task'] ?? '') }}</textarea>
        <br>
        <br>
        <input type="color" name="cor" value="{{ old('cor', $task['cor'] ?? '') }}">
        <br>
        <br>
        Imagem: <input type="file" name="imagem">
        <br>
        <br>
        <input type="submit" value="Gravar">
    </form>

    <a href="{{ route('task.index') }}">Cancelar</a>
@endsection