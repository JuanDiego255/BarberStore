<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogCategoryDetails;
use App\Models\Language;
use Illuminate\Http\Request;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Validator;

class BlogCategoryController extends Controller
{
    public function blogCategoryList()
    {
        $data['manageBlogCategory'] = BlogCategory::with('blogCategoryDetails')->latest()->get();
        return view('admin.blog_category.list', $data);
    }

    public function blogCategoryCreate()
    {
        $languages = Language::all();
        return view('admin.blog_category.create', compact('languages'));
    }

    public function blogCategoryStore(Request $request, $language)
    {

        $purifiedData = Purify::clean($request->except('_token', '_method'));

        $rules = [
            'name.*' => 'required|max:100',
        ];
        $message = [
            'name.*.required' => 'Category Name field is required',
            'name.*.max' => 'This field may not be greater than :max characters',
        ];

        $validate = Validator::make($purifiedData, $rules, $message);

        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        }

        $category = new BlogCategory();
        $category->save();

        $category->blogCategoryDetails()->create([
            'language_id' => $language,
            'name' => $purifiedData["name"][$language]
        ]);

        return redirect()->route('admin.blog.category.list')->with('success', 'Blog Category Successfully Saved');
    }

    public function blogCategoryDelete($id)
    {
        $categoryData = BlogCategory::with('blog')->findOrFail($id);
        if (count($categoryData->blog) > 0) {
            return back()->with('error', 'Category has lots of blog');
        }
        $categoryData->delete();
        return back()->with('success', 'Blog Category has been deleted');
    }

    public function blogCategoryEdit($id)
    {
        $data['languages'] = Language::all();
        $data['blogCategoryDetails'] = BlogCategoryDetails::with('category')->where('category_id', $id)->get()->groupBy('language_id');
        return view('admin.blog_category.edit', $data, compact('id'));
    }

    public function blogCategoryUpdate(Request $request, $id, $language)
    {
        $purifiedData = Purify::clean($request->except('image', '_token', '_method'));

        $rules = [
            'name.*' => 'required|max:40',
        ];
        $message = [
            'name.*.required' => 'Category Name field is required',
            'name.*.max' => 'This field may not be greater than :max characters',
        ];


        $validate = Validator::make($purifiedData, $rules, $message);

        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        }

        $category = BlogCategory::findOrFail($id);
        $category->save();

        $category->blogCategoryDetails()->updateOrCreate([
            'language_id' => $language,
        ],
            [
                'name' => $purifiedData["name"][$language],
            ]
        );

        return redirect()->route('admin.blog.category.list')->with('success', 'Blog Category Successfully Updated');
    }
}
