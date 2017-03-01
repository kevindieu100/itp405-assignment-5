<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<title>Twitter</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>

	<div class="container">
    <!--displays error message if one does exist for the tweet-->
    @if (count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }} </li>
          @endforeach
        </ul>
      </div>
    @endif

    <!--displays success message if tweet was added to database-->
    @if(session('successStatus'))
      <div class="alert alert-s uccess" role="alert">
        {{ session('successStatus') }}
      </div>
    @endif

    <form action="/tweets/{{ $tweet->id }}/edit" method="post">
        {{ csrf_field() }}
        <!--creates a session-->
        <div class="form-group">
          <label for="newTweet">Edit Tweet: </label>
          <input type="text" name="newTweet" id="newTweet" class="form-control" value=" {{ $tweet->tweet }}"></input>
        </div>
        <button class="btn" type="submit" name="button">Edit</button>
    </form>
  </div>
</body>
</html>
