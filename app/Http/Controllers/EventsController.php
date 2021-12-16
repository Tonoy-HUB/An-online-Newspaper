<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\Event; 
use App\Models\Category;
use App\Models\International; 
use App\Models\Feedback;
use App\Models\Reporter;
use App\Models\Role; 
use App\Models\User;

use Image;  
use File; 
use Auth;

class EventsController extends Controller
{

    public function __construct()
    {
        $this->middleware('is_admin');
    }
    
    public function create(){
        $types = Category::all();
        return view('post.create', compact('types')); 
    }
 
    public function index(){
       // $posts = Event::all();
        $posts = Event::orderBy('id', 'desc')->paginate(6);
        return view('post.index', compact('posts')); 
    }

    public function show($id){
        $post = Event::find($id);
        return view('post.show', compact('post'));
    }

 
    public function delete($id){
        $post = Event::find($id);
        $oldImg = $post->image;
        if($oldImg != 'no_image.png'){
            File::delete(public_path('images/'.$oldImg));
        } 
        $post->delete();
        return redirect()->route('post.index')->with('error', 'Successfully Removed');
    }


    public function store(Request $request){
           $this->validate($request, 
           [
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',             
           ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            Image::make($file)->resize(700, 455)->save(public_path('images/events/'.$file_name));
        }else{
            $file_name = 'no_image.png';
        }
        $post = new Event;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->category_id = $request->input('category_id');
        $post->image = $file_name;
        $post->user_id = Auth::user()->id;
        $post->save();
        return redirect()->route('post.index')->with('success', 'You Have Successfully Created');
     }


        public function edit($id){
        $event = Event::find($id);
        return view('post.edit', compact('event'));
        }


        public function update(Request $request, $id){
            $this->validate($request, [
                'title' => 'required',
                'body' => 'required',
            ]);
            $post = Event::find($id);
            $oldImg = $post->image;
             if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            Image::make($file)->resize(700, 455)->save(public_path('images/events/'.$file_name));
            if($oldImg != 'no_image.png'){
                File::delete(public_path('images/'.$oldImg));
            }
        }
            else{
                $file_name = $oldImg;
            }
            $oldType = $post->category_id;
            $newType = $request->input('category_id');
            if($newType !== 'xyz'){
                $type = $newType;
            }
            else{
                $type = $oldType;
            }
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->category_id = $type;
            $post->image = $file_name;
            $post->save();
            return redirect()->route('post.index')->with('warning', 'You Have Successfully Updated');       
       }





            public function type_create(){
                $types = Category::all();
                return view('types.create', compact('types')); 
            }
            public function type_index(){
                $types = Category::all();
                $types = Category::orderBy('id', 'desc')->get();
                return view('types.index', compact('types'));
            } 
            public function type_show($id){
                $types = Category::find($id);
                return view('types.show', compact('types'));
            }
            public function type_delete($id){
                $types = Category::find($id);
                $types->delete();
                return redirect()->route('types.index')->with('error', 'Successfully Removed');
                }
            public function type_store(Request $request){
                    $this->validate($request, 
                    [
                    'title' => 'required',            
                    ]);           
                $types = new Category;
                $types->title = $request->input('title');  
                $types->save();
                return redirect()->route('types.index')->with('success', 'You Have Successfully Created');
            }
            public function type_edit($id){
                $Category = Category::find($id);
                return view('types.edit', compact('Category'));
                }

            public function type_update(Request $request, $id){
                $this->validate($request, [
                    'title' => 'required',
                    ]);

                $types = Category::find($id);
                $types->title = $request->input('title');
                $types->save();
                return redirect()->route('types.index')->with('warning', 'You Have Successfully Updated');       
                }





        public function reporter_index(){
            $reporters = User::latest()->paginate(10);
            return view('reporter.index', compact('reporters'));
        }
        public function reporter_create(){
            $roles = Role::where('status', true)->get();
            return view('reporter.create', compact('roles'));
        }
        public function reporter_store(Request $request){
            $this->validate($request, [
                'name'=>'required',
                'email'=>'required|email',
                'password'=>'required'
            ]);
            $role = $request->input('role_id');
            if($role != 'null'){
                $reporter = new User;
                $reporter->name = $request->input('name');
                $reporter->email = $request->input('email');
                $reporter->password = Hash::make($request->input('password'));
                $reporter->role_id = $role;
                $reporter->save();
                return redirect()->route('reporter_index')->with('success', 'Successfully Created');
            }else{
                return redirect()->route('reporter_create')->with('error', 'Please select a Role');
            }
        }


        public function reporter_edit($id){
            $reporter = User::find($id);
            return view('reporter.edit', compact('reporter'));
            }          
        public function reporter_update(Request $request, $id){
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                ]);
                $reporter = User::find($id);
                $reporter->name = $request->input('name');
                $reporter->email = $request->input('email');
                $reporter->role_id = $request->input('role_id');                
                $reporter->save();
                return redirect()->route('reporter_index')->with('error', 'Successfully Update');       
            }
            public function reporter_delete($id){
                $reporter = User::find($id);
                $reporter->delete();
                return redirect()->route('reporter_index')->with('error', 'Successfully Removed');
            }


        

            
        public function event_search(Request $request){
            //$this->validate($request, ['search', 'required']);
            $search = $request->input('search');
            $posts = Event::where('title', 'LIKE', '%'.$search.'%')
                    ->orWhere('body', 'LIKE', '%'.$search.'%')
                    ->orWhere('id', 'LIKE', '%'.$search.'%')
                    ->paginate(100);
           // return $events;
           //$posts = Event::orderBy('id', 'desc')->paginate(6);
            return view('post.index', compact('posts')); 
        }

}