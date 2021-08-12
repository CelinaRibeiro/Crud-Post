<br/>
<a href="{{ route('posts.create') }}">Criar Novo Post</a> <br/><br/>
<hr/>

@if(session('message'))
    <div>
        {{ session('message') }}
    </div>
@endif

<form action="{{ route('posts.search') }}" method="post">
    @csrf
    <input type="text" name="search" placeholder="Filtrar" />
    <button type="submit">Filtrar</button>
</form>

<h3>Posts</h3>
@foreach ($posts as $post)
    <ul style="list-style: none">
        <li> 
            {{ $post->title }} 
            [<a href="{{ route('posts.show', $post->id) }}">Ver</a>] 
            [<a href="{{ route('posts.edit', $post->id) }}">Editar</a>]
        </li>
    </ul>
@endforeach

<hr/>

@if (isset($filters))
    {{ $posts->appends($filters)->links() }}
@else
    {{ $posts->links() }}
@endif

