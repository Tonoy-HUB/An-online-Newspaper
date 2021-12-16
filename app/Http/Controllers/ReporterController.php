<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;


use Illuminate\Http\Request;
use App\Models\Reporter;
use App\Models\Category;
use App\Models\Member;
use App\Models\Role; 
use App\Models\Event;  



use Image;  
use File;  

class ReporterController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_reporter');
    }

        public function user_index(){
            $users = Member::latest()->paginate(10);
            return view('user.index', compact('users'));
        }
        public function user_create(){
            $roles = Role::all();
            return view('user.create', compact('roles'));
        }
        public function user_store(Request $request){
            $this->validate($request, [
                'name'=>'required',
                'email'=>'required|email',
                'password'=>'required'
            ]);
            $role = $request->input('role_id');
            if($role != 'null'){
                $user = new Member;
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->password = Hash::make($request->input('password'));
                $user->role_id = $role;
                $user->save();
                return redirect()->route('user_index')->with('success', 'Successfully Created');
            }else{
                return redirect()->route('user_create')->with('error', 'Please select a Role');
            }
        }
    
    
        public function user_edit($id){
            $user = Member::find($id);
            return view('user.edit', compact('user'));
            }          
        public function user_update(Request $request, $id){
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                ]);
                $user = Member::find($id);
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->save();
                return redirect()->route('user_index')->with('error', 'Successfully Update');       
            }
            public function user_delete($id){
                $user = Member::find($id);
                $user->delete();
                return redirect()->route('user_index')->with('error', 'Successfully Removed');
            }
            public function user_show($id){
                $user = Member::find($id);
                return view('user.show', compact('user'));
            }





            public function news_create(){
                $types = Category::all();
                return view('reporters.news.create', compact('types')); 
            }
         
            public function news_index(){
                $news = Event::orderBy('id', 'desc')->paginate(6);
                return view('reporters.news.index', compact('news')); 
            }
        
            public function news_show($id){
                $news = Event::find($id);
                return view('reporters.news.show', compact('news'));
            }
                
            public function news_delete($id){
                $news = Event::find($id);
                $oldImg = $news->image;
                if($oldImg != 'no_image.png'){
                    File::delete(public_path('images/'.$oldImg));
                } 
                $news->delete();
                return redirect()->route('reporters.news_index')->with('error', 'Successfully Removed');
            }
               
            public function news_store(Request $request){
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
                    Image::make($file)->resize(700, 455)->save(public_path('images/'.$file_name));
                }else{
                    $file_name = 'no_image.png';
                }        
                $news = new Event;
                $news->title = $request->input('title');
                $news->body = $request->input('body');
                $news->category_id = $request->input('category_id');
                $news->image = $file_name;           
                $news->save();
                return redirect()->route('reporters.news_index')->with('success', 'You Have Successfully Created');
             }

                public function news_edit($id){
                $news = Event::find($id);
                return view('reporters.news.edit', compact('news'));
                }
             
                public function news_update(Request $request, $id){
                    $this->validate($request, [
                        'title' => 'required',
                        'body' => 'required',
                    ]);        
                    $news = Event::find($id);       
                    $oldImg = $news->image;
                     if($request->hasFile('image')){
                    $file = $request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $file_name = time().'.'.$extension;
                    Image::make($file)->resize(700, 455)->save(public_path('images/'.$file_name));
                    if($oldImg != 'no_image.png'){
                        File::delete(public_path('images/'.$oldImg));
                    }
                    }else{
                        $file_name = $oldImg;
                    }        
                    $oldType = $news->category_id;
                    $newType = $request->input('category_id');
                    if($newType !== 'xyz'){
                        $type = $newType;
                    }
                    else{
                        $type = $oldType;
                    }       
                    $news->title = $request->input('title');
                    $news->body = $request->input('body');
                    $news->category_id = $type;
                    $news->image = $file_name;
                    $news->save();
                    return redirect()->route('reporters.news_index')->with('warning', 'You Have Successfully Updated');
                
        }


        public function news_search(Request $request){
            $search = $request->input('search');
            $news = Event::where('title', 'LIKE', '%'.$search.'%')
                    ->orWhere('body', 'LIKE', '%'.$search.'%')
                    ->orWhere('id', 'LIKE', '%'.$search.'%')
                    ->paginate(50);
            return view('reporters.news.index', compact('news')); 
        }

}
