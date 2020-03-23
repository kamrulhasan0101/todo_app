<?php

namespace App\Http\Controllers;

use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CategoryController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('category.list',['categories'=>Auth::user()->categories]);
    }



    public function create()
    {
        return view('category.create');
    }



    public function store(Request $request)
    {
        $data=$request->validate([
            'name' => ['required', 'unique:categories', 'max:255'],
        ]);
        $data['user_id']=Auth::user()->id;
        Category::create($data);
        return redirect()->route('category.index')->with('status', 'Operation Successful!');

    }


    public function show(Category $category)
    {
        return view('category.show',['category'=>$category]);
    }


    public function edit(Category $category)
    {
        return view('category.edit',['category'=>$category]);
    }


    public function update(Request $request, Category $category)
    {
        $category->update($request->validate([
            'name' => ['required', 'unique:categories', 'max:255'],
        ]));
        return redirect()->route('category.show',$category->id)->with('status', 'Operation Successful!');
    }

    public function destroy(Category $category)
    {
//        return $category->id;
        $category->delete();
        return redirect()->route('category.index')->with('status', 'Operation Successful!');
    }
    public function category_task($id)
    {
        return view('category.categoryTask',['tasks'=>Category::findOrFail($id)->tasks]);
    }
}
