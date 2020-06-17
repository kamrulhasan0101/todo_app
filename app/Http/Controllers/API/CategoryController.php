<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\Category\CategoryCollection;
use App\Http\Resources\Category\CategoryResource;
use App\Model\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\CategoryNotBelongsToUser;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new CategoryCollection(Auth::user()->categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $category= new Category;
        $category->name=$request->name;
        $category->user_id=$request->user_id;
        $category->save();
        return response([
            'data'=> new CategoryResource($category)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        if(Auth::user()->id==$category->user_id){
            return new CategoryResource($category);
        }

        return response()->json([
               'error'=>'Category Not Belongs To User'
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if(Auth::user()->id==$category->user_id){
             $category-> update($request->all());
      return response([
        'data' => new CategoryResource($category)
      ]);}
      throw new CategoryNotBelongsToUser;
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if(Auth::user()->id===$category->user_id){
          $category->delete();
           return response([
        'data' => "Data Deleted Successfilly!"
      ]);
        }
        else{
            return response()->json([
                'error'=>'Category Does not belongs to User'
            ]);
        }

    }
}
