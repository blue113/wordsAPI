<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Previous_searches;
use Unirest;

class SearchController extends Controller
{
    /* Display Default search form */
    public function index($value='')
    {
    	return view('search_form');
    }
    
    /* Display previours searches page */
    public function previous_searches()
    {
    	$previous_searches = Previous_searches::all()->toArray();
    	return view('previous_searches',compact('previous_searches'));
    }

    /* API call to wokrdsAPI and get response */
    public function search_definition(Request $request)
    {   
        $text = $request->text;
    	if($text != ''){
            $task = new Previous_searches;
            $task->search_text = $text;
            $task->save();

            $response = Unirest\Request::get("https://wordsapiv1.p.rapidapi.com/words/$text",
                  array(
                    "X-Mashape-Key" => "ad95e72ae7msh2b57961027a93efp148899jsn3affce8f4806",
                    "Accept" => "application/json"
                  )
                );

            $response = (array)$response;
            if($response['code'] ==  200){
                echo json_encode($response['body']->results);
            } else {    
                echo 0;
            }

        } else {
                echo 0;
        }
    }
}
