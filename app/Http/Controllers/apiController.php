<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class apiController extends Controller
{
    //
    public function show(){

    	$client = new Client([
		    'base_uri' => 'https://api.github.com',
		]);

		$response = $client->request('GET', 'orgs/githubtraining/repos');

		$repos = json_decode($response->getBody());

		//return $repos;

    	return view('api',compact('repos'));
    }
}
