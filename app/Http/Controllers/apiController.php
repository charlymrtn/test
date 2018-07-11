<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Repo;

class apiController extends Controller
{
    //
    public function show(){

    		$repos = Repo::all();

			if (isset($repos) && count($repos) > 0) {
				$bd = 1;
			}else{
				$bd = 0;
				$client = new Client([
		    		'base_uri' => 'https://api.github.com',
					]);

				$response = $client->request('GET', 'orgs/githubtraining/repos');

				$repos = json_decode($response->getBody());

				//guarda en bd si no existe
				foreach ($repos as $repo) {
					# code...

					$repoLocal = Repo::where('id_repo',$repo->id);

					if($repoLocal){
						$repoLocal->delete();
					}
					$repoNew = Repo::create([
								'id_repo' => $repo->id,
								'name' => $repo->name,
								'owner' => $repo->owner->login,
								'fecha_creacion' => $repo->created_at,
								'fecha_commit' => $repo->pushed_at]);
				}
			}

    		
    	return view('api',compact('repos','bd'));
    }
}
