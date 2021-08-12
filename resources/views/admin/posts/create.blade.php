<h1>Cadastrar Novo Post</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('posts.store') }}" method="post">
    @csrf
    <input type="text" name="title" id="title" placeholder="Título" value="{{ old('title') }}"/><br/>
    <textarea name="content" id="content" placeholder="Conteúdo" rows="4" cols="30">{{ old('content') }}</textarea><br/>
    <button type="submit">Salvar</button>
</form>