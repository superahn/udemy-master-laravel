

<h1>{{ $post->id }}. {{ $post->title }}</h1>
<p>{{ $post->content }}</p>

<div>
  <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <input type="submit" value="Delete!">
  </form>
</div>

