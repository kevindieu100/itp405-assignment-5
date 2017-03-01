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
      <div class="alert alert-success" role="alert">
        {{ session('successStatus') }}
      </div>
    @endif

    <form action="/" method="post">
        {{ csrf_field() }}
        <!--creates a session-->
        <div class="form-group">
          <label for="newTweet">New Tweet</label>
          <input type="text" name="newTweet" id="newTweet" class="form-control" value="{{ old('newTweet') }}"></input>
        </div>
        <button type="submit" class="btn btn-primary">Tweet</button>
    </form>

  	<table class="table">
  		<thead>
  			<tr>
  				<th>Twitter Newsfeed</th>
  				<th colspan="2"></th>
          <th colspan="2"></th>
  			</tr>
  		</thead>

  		<tbody>
  			@foreach($tweets as $tweet)
  				<tr>
  					<td>{{ $tweet->tweet }}</td>
            <td> <a href="/tweets/{{ $tweet->id }}"><button class="btn" type="button" name="button">View</button> </a></td>
            <td> <a href="/{{ $tweet->id }}/delete"><button class="btn" type="button" name="button">X</button> </a></td>
  				</tr>
  			@endforeach
  		</tbody>
  	</table>

	</div>

</body>

</html>
