<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<title>Twitter</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <style>
    #centered{
       position: relative;
       top: 45vh !important;
       margin: auto;
       border-color: black;
			 text-align: center;
    }
  </style>
</head>

<body>
	<!--displays success message if tweet was added to database-->
	@if(session('successStatus'))
		<div class="alert alert-success" role="alert">
			{{ session('successStatus') }}
		</div>
	@endif

	<div id="centered" class="panel panel-default">
		{{ csrf_field() }}
    <p class="text-center" style="font-size: 40px">{{ $tweet->tweet }}</p>
		<a href="/tweets/{{ $tweet->id }}/edit"><button class="btn" type="button" type="submit" name="button">Edit</button> </a>
	</div>

</body>

</html>
