<div class="card sticky-action">

  <div class="card-image waves-effect waves-block waves-light">
      @if ($article->attachments->count() > 0)
          @foreach ($article->attachments as $attachment)
              <img  class="activator" src="/files/{{ $attachment->filename }}">
          @endforeach
      @endif
</div>

  <div class="card-content">
    <span class="card-title activator grey-text text-darken-4">
      <a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
      <i class="material-icons right">more_vert</i>
    </span>

    @include('users.partial.avatar', ['user' => $article->user])

    <p class="text-muted meta__article">
      <a href="{{ gravatar_profile_url($article->user->email) }}">
        {{ $article->user->name }}
      </a>

      <small>
        • {{ $article->created_at->diffForHumans() }}
        • {{ trans('forum.articles.form_view_count') }} {{ $article->view_count }}

        @if ($article->comment_count > 0)
          • {{ trans('forum.comments.title') }} {{ $article->comment_count }}
        @endif
      </small>
    </p>

      @include('tags.partial.list', ['tags' => $article->tags])
  </div>


  <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">{{ $article->title }}<i class="material-icons right">close</i></span>
          {!! markdown( $article->content) !!}
    </div>
</div>
