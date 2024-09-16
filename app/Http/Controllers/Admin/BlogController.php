<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogDetails;
use App\Models\Language;
use Illuminate\Http\Request;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\Notify;
use App\Http\Traits\Upload;

class BlogController extends Controller
{
    use Notify, Upload;

    public function blogList()
    {
        $data['blogs'] = Blog::with('blogDetails', 'category.blogCategoryDetails')->latest()->get();
        return view('admin.blogs.list', $data);
    }

    public function blogCreate()
    {
        $blogCategory = BlogCategory::with('blogCategoryDetails')->latest()->get();
        $languages = Language::all();
        return view('admin.blogs.create', compact('languages', 'blogCategory'));
    }

    public function blogStore(Request $request, $language = null)
    {
        $purifiedData = Purify::clean($request->except('image', '_token', '_method'));
        if ($request->has('image')) {
            $purifiedData['image'] = $request->image;
        }
        $rules = [
            'category_id' => 'required|max:50',
            'author.*' => 'required|max:200',
            'service_name.*' => 'required|max:200',
            'title.*' => 'required|max:200',
            'description.*' => 'required',
            'image' => 'required|max:3072|mimes:jpg,jpeg,png',
        ];
        $message = [
            'category_id' => 'Category Name field is required',
            'category_id.max' => 'This field may not be greater than :max characters.',
            'author.*.required' => 'Author field is required',
            'service_name.*.required' => 'Title field is required',
            'title.*.required' => 'Title field is required',
            'description.*.required' => 'Please Add Blog Description',
            'image.required' => 'Image is required',
            'image.mimes' => 'This image must be a file of type: jpg, jpeg, png.',
            'image.max' => 'This image may not be greater than :max kilobytes.',
        ];
        $validate = Validator::make($purifiedData, $rules, $message);
        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        }

        $blog = new Blog();
        if ($request->has('category_id')) {
            $blog->blog_category_id = $request->category_id;
        }

        if ($request->hasFile('image')) {
            try {
                $blog->image = $this->uploadImage($request->image, config('location.blog.path'), config('location.blog.size'), $blog->image);
            } catch (\Exception $exp) {
                return back()->with('error', 'Image could not be uploaded.');
            }
        }

        $blog->save();

        $blog->blogDetails()->create([
            'language_id' => $language,
            'author' => $purifiedData["author"][$language],
            'service_name' => $purifiedData["service_name"][$language],
            'title' => $purifiedData["title"][$language],
            'description' => $purifiedData["description"][$language],
        ]);

        return redirect()->route('admin.blog.list')->with('success', 'Blog Saved Successfully');
    }

    public function blogDelete($id)
    {
        $blogData = Blog::findOrFail($id);
        $blogDetailsData = BlogDetails::where('blog_id', $id);
        $old_image = $blogData->image;
        $location = config('location.blog.path');

        if (!empty($old_image)) {
            unlink($location . '/' . $old_image);
        }

        $blogData->delete();
        $blogDetailsData->delete();
        return back()->with('success', 'Blog has been deleted');
    }

    public function blogEdit($id)
    {
        $data['languages'] = Language::all();
        $data['blogCategory'] = BlogCategory::with('blogCategoryDetails')->get();
        $data['blogDetails'] = BlogDetails::with('blog')->where('blog_id', $id)->get()->groupBy('language_id');
        return view('admin.blogs.edit', $data, compact('id'));
    }

    public function blogUpdate(Request $request, $id, $language = null)
    {
        $purifiedData = Purify::clean($request->except('image', '_token', '_method'));

        if ($request->has('image')) {
            $purifiedData['image'] = $request->image;
        }

        $rules = [
            'category_id' => 'sometimes|required|max:50',
            'author.*' => 'required|max:200',
            'service_name.*' => 'required|max:200',
            'title.*' => 'required|max:200',
            'description.*' => 'required',
            'image' => 'sometimes|required|max:3072|mimes:jpg,jpeg,png',
        ];
        $message = [
            'category_id' => 'Category Name field is required',
            'category_id.max' => 'This field may not be greater than :max characters.',
            'author.*.required' => 'Author field is required',
            'service_name.*.required' => 'Title field is required',
            'title.*.required' => 'Title field is required',
            'description.*.required' => 'Please Add Blog Description',
            'image.required' => 'Image is required',
            'image.mimes' => 'This image must be a file of type: jpg, jpeg, png.',
            'image.max' => 'This image may not be greater than :max kilobytes.',
        ];


        $validate = Validator::make($purifiedData, $rules, $message);

        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        }

        $blog = Blog::findOrFail($id);

        if ($request->has('category_id')) {
            $blog->blog_category_id = $request->category_id;
        }

        if ($request->hasFile('image')) {
            try {
                $blog->image = $this->uploadImage($request->image, config('location.blog.path'), config('location.blog.size'));
            } catch (\Exception $exp) {
                return back()->with('error', 'Image could not be uploaded.');
            }
        }

        $blog->save();

        $blog->blogDetails()->create([
            'language_id' => $language,

        ]);

        $blog->blogDetails()->updateOrCreate(
            [
                'language_id' => $language,
            ],
            [
                'author' => $purifiedData["author"][$language],
                'service_name' => $purifiedData["service_name"][$language],
                'title' => $purifiedData["title"][$language],
                'description' => $purifiedData["description"][$language],
            ]
        );

        return redirect()->route('admin.blog.list')->with('success', 'Blog Updated Successfully');
    }
}
