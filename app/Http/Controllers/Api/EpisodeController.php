<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Episode;

class EpisodeController extends Controller
{
    public function __construct() 
    {
        $this->middleware(['auth:api', 'throttle:20,1']);
    }
    
    public function getAllEpisodes(Request $request)
    {
        $episodes = Episode::paginate($request->get('limit') ? $request->get('limit') : 10);

        return response($episodes, 200);
    }

    public function getEpisode($id)
    {
        return response(['success' => true, 'data' => Episode::with('characters')->find($id)], 200);
    }
}
