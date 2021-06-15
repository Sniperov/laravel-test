<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Character;

class CharacterController extends Controller
{
    public function __construct() 
    {
        $this->middleware(['auth:api', 'throttle:20,1']);
    }
    
    public function getAllCharacters(Request $request)
    {
        if ($request->get('name')){
            $characters = Character::with('quotes')->where('name','LIKE','%'.$request->get('name').'%')
                        ->paginate($request->get('limit') ? $request->get('limit') : 10);
        }else{
            $characters = Character::with('quotes')->paginate($request->get('limit') ? $request->get('limit') : 10);
        }

        return response($characters, 200);
    }

    public function getRandomCharacter()
    {
        return response(['success' => true, 'data' => Character::inRandomOrder()->first()], 200);
    }
}
