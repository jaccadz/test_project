<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <title>URL Shortener</title>
	
	<link rel="stylesheet" href="<?= asset('css/bootstrap.css') ?>">
	<link rel="stylesheet" href="<?= asset('css/style.css') ?>">
	
	<script src="<?= asset('js/bootstrap.min.js') ?>"></script>
	
  </head>
  <body>
    <div id="container">
      <h2>Uber-Shortener</h2>
	  <br />
	  
	  <form name="frmURL" action="/" method="post" class="form-horizontal" novalidate="">
			<div class="form-group error">
				<label for="link" class="col-sm-1 control-label">link</label>
				<div class="col-sm-8">
					<input type="text" class="form-control has-error" placeholder="Insert your URL here and press enter!" > 
				</div>
			</div>
			<input type="submit" value="Save" class="btn btn-info" ></button>

		</form>
	  
    </div>
  </body>
</html>