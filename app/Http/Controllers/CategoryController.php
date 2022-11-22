<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Queries\QueryBuilderCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(QueryBuilderCategory $categories)
    {
         return $categories->getCategories();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->accepts(['text/html', 'application/json'])) {
            $validated = $request->only(['name', 'img_name']);
       }
        $category = new Category($validated);
        if ($category->save()){
            return response()->json('ok');
        } else {
            return response()->json('error', 400);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if ($request->accepts(['text/html', 'application/json'])) {
            $validated = $request->only(['name', 'img_name']);
        }

        $category = $category->fill($validated);
        if($category->save()){
            return response()->json('ok');;
        }

        return response()->json('error', 400);;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return response()->json('ok');
        } catch(\Exception $e){
            \Log::error($e->getMessage());
            return response()->json('error', 400);
        }
    }
}
