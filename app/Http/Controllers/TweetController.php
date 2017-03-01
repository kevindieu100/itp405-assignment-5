<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Tweet;
use Validator;

class TweetController extends Controller
{
  //displays the index page with form and tweet timeline
  public function index()
	{
		// $tweets = DB::table('tweets')
		// 	->select('id', 'tweet')
		// 	->orderBy('id', 'desc')
		// 	->get();
    $tweets = Tweet::orderBy('id', 'desc')
      ->get();

		return view('twitter.index', [
			'tweets' => $tweets
		]);
	}//end of index

	//stores a new tweet while also validating it
	public function store(Request $request)
	{
		$validation = Validator::make( $request->all(),
		[
			'newTweet' => 'required|max:140'
		]);

		if($validation->passes())
		{
			//code if validation passes, adds to tweets table
			// DB::table('tweets')->insert([
			// 	'tweet' => request('newTweet')
			// ]);
      Tweet::insert([
        'tweet' => request('newTweet')
      ]);

			return redirect('/')
				->with('successStatus', 'Tweet successfully created!');
		}
		else
		{
			//code if the validation fails
			return redirect('/')
        ->withInput()
				->withErrors($validation);
		}
	}//end of store

	//deletes a tweet if user clicks on 'X'
	public function destroy($tweetID)
	{
		// DB::table('tweets')
		// 	->where('id', '=', $tweetID)
		// 	->delete();
    $tweet = Tweet::find($tweetID);
    $tweet->delete();

		return redirect('/')
			->with('successStatus', 'Tweet successfully deleted!');
	}//end of destroy

	//redirects to show a singular tweet
	public function view($tweetID)
	{
		// $tweet = DB::table('tweets')
		// 	->where('id', '=', $tweetID)
		// 	->get();

    $tweet = Tweet::find($tweetID);

		return view('twitter.view', [
			'tweet' => $tweet
		]);
	}//end of view

  //redirects to a form to edit a tweet
  public function edit($tweetID)
  {
    $tweet = Tweet::find($tweetID);

    return view('twitter.edit', [
      'tweet' => $tweet
    ]);
  }//end of edit

  //updates a tweet
  public function update($id)
  {
    // $validation = Validator::make( $request->all(),
    // [
    //   'newTweet' => 'required|max:140'
    // ]);
    $validation = Validator::make([
        'tweet' => request('newTweet')
    ], [
        'tweet' => 'required|max:140'
    ]);

    if($validation->passes())
    {
      //code if validation passes, adds to tweets table
      // DB::table('tweets')->insert([
      // 	'tweet' => request('newTweet')
      // ]);
      $tweet = Tweet::where('id', $id)
        ->update(['tweet' => request('newTweet')]);

      return redirect("/tweets/$id")
        ->with('successStatus', 'Tweet successfully updated!')
        ->with('tweet', $tweet);
    }
    else
    {
      //code if the validation fails
      return redirect("/tweets/$id/edit")
        ->withInput()
        ->withErrors($validation);
    }
  }//end of update
}
