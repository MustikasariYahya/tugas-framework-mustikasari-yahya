<div>
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
     <p>Whats up</p>
     @foreach ($posts as $post)
        <h2>{{ $post -> title }}</h2>
        @if ($post -> published)
            <span>published</span>
        @else
            <span>draft</span>
        @endif
     @endforeach

     @datetime($post->created_at)
</div>
