<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\Category;

class PagesController extends Controller
{ 
    public function homepage(){
        $entertainments = Event::latest()->where('category_id', 15)->take(4)->get();
        $business = Event::latest()->where('category_id', 14)->take(4)->get();
        $technology = Event::latest()->where('category_id' , 16)->take(4)->get();
        $sports = Event::latest()->where('category_id' , 40)->take(4)->get();
        $featured = Event::latest()->where('category_id' , 45)->take(4)->get();
        $popular = Event::latest()->where('category_id' , 54)->take(4)->get();
        $latest = Event::latest()->where('category_id' , 47)->take(4)->get();
        $market_rate = Event::latest()->where('category_id' , 49)->take(4)->get();
        $lifestyle = Event::latest()->where('category_id' , 50)->take(4)->get();
        $history = Event::latest()->where('category_id' , 51)->take(4)->get();
        $breaking = Event::latest()->where('category_id' , 53)->take(4)->get();
        $horoscope = Event::latest()->where('category_id' , 55)->take(4)->get();

        

               

        return view('welcome', compact('entertainments' ,'business' ,'technology' , 'sports' , 'featured' , 'popular' , 'latest'  ,'market_rate' , 'lifestyle' , 'history' , 'breaking' , 'horoscope'));
    }

    public function categorya($id) 
    {

        //$events = Category::find($id)->events;
        $category = Category::find($id);
        $events = Event::where('category_id', $category->id)->paginate(4);

        return view('category.category', compact('events', 'category')); 
    }
    public function event_search(Request $request){
        $this->validate($request, [
            'search' => 'required'
        ]);
        
        $search = $request->input('search');
        $events = Event::where('title', 'LIKE', '%'.$search.'%')
                    ->orWhere('body', 'LIKE', '%'.$search.'%')->get();
        return $events;
    }

    public function contactus()
    {      
        return view('category.contactus'); 
    }

    public function article($id) 
    {
        $event = Event::find($id);
        // $event->increment('visits');
        // $event->save();    
        return view('category.article', compact('event')); 
    }
}
