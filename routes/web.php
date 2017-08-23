<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Link;


Route::get('/', function()	
{
  return View::make('form');
});


Route::post('/',function(){
  //We first define the Form validation rule(s)
  $rules = array(
    'link' => 'required|url'
  );
  //Then we run the form validation
  $validation = Validator::make(Input::all(),$rules);
  //If validation fails, we return to the main page with an error info
  if($validation->fails()) {
    return Redirect::to('/')
    ->withInput()
    ->withErrors($validation);
  } else {
    //Now let's check if we already have the link in our database. If so, we get the first result
    $link = Link::where('url','=',Input::get('link'))
    ->first();
    //If we have the URL saved in our database already, we provide that information back to view.
    if($link) {
      return Redirect::to('/')
      ->withInput()
      ->with('link',$link->hash);
      //Else we create a new unique URL
    } else {
      //First we create a new unique Hash
      do {
        $newHash = Str::random(6);
      } while(Link::where('hash','=',$newHash)->count() > 0);

      //Now we create a new database record
      Link::create(array('url' => Input::get('link'),'hash' => $newHash
      ));

      //And then we return the new shortened URL info to our action
      return Redirect::to('/')
      ->withInput()
      ->with('link',$newHash);
    }
  }
});
