<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	
    <title>URL Shortener</title>
	
	<link rel="stylesheet" href="<?= asset('css/bootstrap.css') ?>">
	<link rel="stylesheet" href="<?= asset('css/style.css') ?>">
	
	<script src="<?= asset('js/bootstrap.min.js') ?>"></script>
	
  </head>
  <body>
    <div id="container">
		<h2>Uber-Shortener</h2>
		<br />

		@if(Session::has('errors'))
			<div class="alert alert-warning">
				{{$errors->first('link')}}
			</div>
			<h3 class="error"></h3>
		@endif

		@if(Session::has('link'))
			<div class="alert alert-success">
			  <a href="{{Session::get('link')}}"> Click here for your shortened URL </a> 
			</div>
		@endif

		<form name="frmURL" action="/" method="post" class="form-horizontal" novalidate="" >

		{{ csrf_field() }}
			<div class="form-group error">
				<label for="link" class="col-sm-1 control-label">link</label>
				<div class="col-sm-8">
					<input type="text" name="link" id="link" class="form-control has-error" placeholder="Insert your URL here and press enter!" > 
				</div>
			</div>
			<input type="submit" value="Save" class="btn btn-info" ></button>

		</form>
		
		<br />
		
		<div class="col-sm-9" >
			<table class="table table-bordered pagin-table">
				<thead>
				<tr>
					<th>Website</th>
					<th>Short Link</th>
				</tr>
				</thead>
				<tbody>
					@foreach($links as $link)
						<tr><td>{{ $link->url }}</td><td><a href="{{ $link->hash }}">{{ $link->hash }} </a> </td></tr>
					@endforeach
				</tbody>
			</table>
		</div>
		
    </div>
  </body>
</html>