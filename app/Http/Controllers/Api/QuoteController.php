<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\QuoteRequest;
use App\Models\Quote;
use App\Models\Character;

class QuoteController extends Controller
{
    public function __construct() 
    {
        $this->middleware(['auth:api', 'throttle:20,1']);
    }
    
    public function getAllQuotes(Request $request)
    {
        $quotes = Quote::with('character')->paginate($request->get('limit') ? $request->get('limit') : 10);

        return response($quotes, 200);
    }

    public function getRandomQuoteByAuthor(QuoteRequest $request)
    {
        $data = $request->validated();

        $author = Character::where('name','LIKE','%'.$data['author'].'%')->first();

        if ($author) {
            $quote = Quote::where('character_id', $author->id)->inRandomOrder()->first();

            return response(['success' => true, 'data' => $quote], 200);
        }

        return response(['success' => true, 'data' => null], 200);
    }
}
