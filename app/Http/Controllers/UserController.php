<?php 

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Event;
use App\Models\Member;
use App\Models\User;
use App\Models\Feedback;
use App\Models\Contuct;


use Image;  
use File; 
 
class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('is_user');
    }
  
  
    public function contuct_create(){
        $contucts = Contuct::all();
        return view('contuct.create', compact('contucts')); 
        }      
    public function contuct_index(){
        $contuct = Contuct::all();
        $contuct = Contuct::orderBy('id', 'desc')->get();
        return view('contuct.index', compact('contuct'));
        }
    public function contuct_show($id){
        $contuct = Contuct::find($id);
        return view('contuct.show', compact('contuct'));
        }
    public function contuct_edit($id){
        $contuct = Contuct::find($id);
        return view('contuct.edit', compact('contuct'));
        }          
    public function contuct_update(Request $request, $id){
         $this->validate($request, 
         [
                'name' => 'required',
                'email' => 'required',
                'number' => 'required',
                'subject' => 'required',
                'message' => 'required',
        ]);
            $contuct = Contuct::find($id);
            $contuct->name = $request->input('name');
            $contuct->email = $request->input('email');
            $contuct->number = $request->input('number');
            $contuct->subject = $request->input('subject');
            $contuct->message = $request->input('message');
            $contuct->save();
            return redirect()->route('contuct.index')->with('error', 'Successfully Update');        
            }
    public function contuct_delete($id){
        $contuct = Contuct::find($id);
        $contuct->delete();
        return redirect()->route('contuct.index')->with('error', 'Successfully Removed');
        }  
    public function contuct_store(Request $request){
        $this->validate($request, 
        [
                'name' => 'required',
                'email' => 'required',
                'number' => 'required',
                'subject' => 'required',
                'message' => 'required',                    
        ]);            
             $contuct = new Contuct;
             $contuct->name = $request->input('name');
             $contuct->email = $request->input('email');
             $contuct->number = $request->input('number');
             $contuct->subject = $request->input('subject');
             $contuct->message = $request->input('message');
             $contuct->save();
             return redirect()->route('contuct.index')->with('success', 'You Have Successfully Created');
          }
          public function feedback_index(){
            $feedback = Feedback::all();
            $feedback = Feedback::orderBy('id', 'desc')->get();
            return view('feedback.index', compact('feedback'));
            } 
        public function feedback_show($id){
            $feedback = Feedback::find($id);
            return view('feedback.show', compact('feedback'));
            }
        }
