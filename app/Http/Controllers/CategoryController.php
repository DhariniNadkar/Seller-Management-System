<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;

class CategoryController extends Controller
{
    public function index(){
        $categories = Info::paginate(10);
        return view('categories.list',['categories' => $categories]);
    }
    public function create(){
        $categories = Info::get();
        return view('categories.new');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required|max:40',
            'name' => 'required|alpha|max:40',
            'address' => 'required|max:50',
            'contact' => 'required|numeric',
            'email' => 'required|email|unique:info|max:50',
            'image'=> 'required',
        ]);
        
        echo "<pre>";
        print_r($request->all());
        
       //insert query
        $info = new Info;
        $info->title = $request->title;
        $info->name = $request->name;
        $info->address = $request->address;
        $info->contact = $request->contact;
        $info->email = $request->email;
        $info->product = $request->file('image')->getClientOriginalName();
       
        $request->image->move(public_path('images'), $info->product);
        $info->save();
        
        return redirect('/category')->withSuccess('New Category Created');  //flash message
        
    }
    public function edit($id){
        //dd($id);
        $info = Info::where('id',$id)->first();
        return view('categories.edit',['info'=> $info]);
    }
    
    public function update(Request $request,$id){
        $validated = $request->validate([
            'title' => 'required|max:40',
            'name' => 'required|alpha|max:40',
            'address' => 'required|max:50',
            'contact' => 'required|numeric',
            'email' => 'required|email|max:50',
            'image'=> 'required'
        ]);
        $info = Info::where('id',$id)->first();
        $info->title = $request->title;
        $info->name = $request->name;
        $info->address = $request->address;                              
        $info->contact = $request->contact;
        $info->email = $request->email;
        $info->product = $request->file('image')->getClientOriginalName();
        $info->save();
        return redirect('/category')->withSuccess('New Category Updated'); 
    }
    public function destroy($id){
        $info = Info::where('id',$id)->first();
        $info->delete();
        return redirect('/category')->with('success', 'Category deleted successfully.');

    }
    
}
