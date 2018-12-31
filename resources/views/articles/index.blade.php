@extends('layouts.app')

@section('content')
<div class="row">
  @forelse($articles as $article)
  <div class="col-md-6 col-md-offset-3">
<div class="panel panel-default">
  <div class="panel-heading">

<span>Name</span>
 <span class="pull-right">
   article
 </span>
  </div>
  <div class="panel-body ">
{{$article->shortContent}}
<a href="/articles/{{$article->id}}">Read More</a>
  </div>
  <div class="panel-footer clearfix"style="background-color:white">
    @if($article->users_id== Auth::id())
    <form action="/articles/{{$article->id}}" method="POST" class="pull-right" style="margin-left:10px" >
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
<input type="submit" name="submit" value="delete" class="btn btn-danger btn-sm">
</form>
<a href="/articles/{{$article->id}}/edit" class="btn btn-info btn-sm pull-right" style="margin-left:15px"> Edit</a>
    @endif

<i class="fa fa-heart pull-right"></i>
  </div>

</div>

  </div>
  @empty
  No Articles.
  @endforelse
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      {{ $articles->links()}}
    </div>
  </div>

</div>


@endsection
