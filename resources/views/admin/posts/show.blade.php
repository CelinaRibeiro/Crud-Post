<h3>Detalhes do Post {{ $post->title }} </h3>

<ul style="list-style: none">
    <li><strong>Título: </strong>{{ $post->title }}</li>
    <li><strong>Conteúdo: </strong>{{ $post->content }}</li>
</ul>

<form method="post" action="{{ route('posts.destroy', $post->id) }}">
    @csrf
    @method('delete')
    <button type="submit">Deletar o post: <strong>{{ $post->title }}</strong> </button> 
</form>

<hr/>
<a href="{{ route('posts.index') }}">Voltar</a> 


