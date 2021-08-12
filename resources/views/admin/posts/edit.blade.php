<h3>Editar Post: <strong>{{ $post->title }}</strong></h3>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('posts.update', $post->id) }}" method="post">
    @csrf
    @method('put')
    <input type="text" name="title" id="title" placeholder="Título" value="{{ $post->title }}"/><br/>
    <textarea name="content" id="content" placeholder="Conteúdo" rows="4" cols="30">{{ $post->content }}</textarea><br/>
    <button type="submit">Atualizar</button>
</form>