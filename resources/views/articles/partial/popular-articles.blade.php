<div class="blog-card spring-fever">
  <div class="title-content">
    <h3>{{$article->title}}</h3>
    <hr />

  </div><!-- /.title-content -->
  <div class="card-info">
    {!!markdown($article->content)!!}
  </div><!-- /.card-info -->
  <div class="utility-info">
    <ul class="utility-list">
      <li class="comments">{{$article->comment_count}}</li>
      <li class="date">{{$article->updated_at}}</li>
    </ul>
  </div><!-- /.utility-info -->
  <!-- overlays -->
  <div class="gradient-overlay"></div>
  <div class="color-overlay"></div>
</div><!-- /.blog-card -->
