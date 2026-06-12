<!-- keep/delete.blade.php -->
@extends('keep/_base')

@section('conteudo')
<p>Apagar nota</p>
<p>Tem certeza que deseja apagar a nota?</p>
<p style="border:1px solid green">{{ Str::limit($nota['nota'], 50) }}</p>

<form method="post" action="{{ route('keep.delete', $nota['id']) }}">
    @csrf
    @method('delete')
    <input type="submit" value="Sim, apagar!">
</form>

<a href="{{ route('keep.index') }}">Não, voltar</a>
@endsection