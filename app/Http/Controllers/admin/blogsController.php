<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\blogsModel;
use App\Models\category\categoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class blogsController extends Controller
{
    public function blogs()
    {
        $blogsModel = new blogsModel();
        $blogs = $blogsModel->getAllBlogs();
        return view("admin.blogs.blogs", ['blogs' => $blogs]);
    }
    public function addBlog()
    {
        $categoryModel = new categoryModel();
        $category = $categoryModel->getAllCategory();
        return view("admin.blogs.add-blogs", ['categories' => $category]);
    }
    public function addBlogProcess(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "slug" => "required|string",
            "title" => "required|string",
            "short_description" => "required|string",
            "description" => "required|string",
            "feature_image" => "required|image",
            "status" => "required",
        ]);
        if ($validation->passes()) {
            if ($request->hasFile('feature_image')) {
                $image = $request->file('feature_image');

                $originalName = $image->getClientOriginalName();
                $extension = time() . '.' . $image->getClientOriginalExtension();
                $imageName = uniqid() . "_" . $originalName;
                $path = $image->move('public/blogs/' . $imageName);
            }
            $data = [
                'slug' =>  $request->input('slug'),
                'title' => $request->input('title'),
                'short_description' => $request->input('short_description'),
                'description' => $request->input('description'),
                'category' => $request->input('category'),
                'tags' => $request->input('tags'),
                'author' => Session::get('admin')->name,
                'feature_image' => $path,
                'status' => $request->input('status')
            ];
            if ($insert = DB::table('t_blogs')->insertGetId($data)) {
                $result = [
                    "status" => "success",
                    "message" => "Blog added successfully!",
                    "user" => $insert
                ];
                return response()->json($result);
            } else {
                $result = [
                    "status" => "error",
                    "message" => "Blog could not be added!",
                    "user" => $insert
                ];
                return response()->json($result);
            }
        } else {
            $result = [
                "status" => "error",
                "error" => $validation->errors()
            ];
            return response()->json($result);
        }
    }

    public function editBlog($id)
    {
        $categoryModel = new categoryModel();
        $category = $categoryModel->getAllCategory();

        $blog = blogsModel::find($id);
        return view("admin.blogs.edit-blog", ['blog' => $blog, 'categories' => $category]);
    }

    public function editBlogProcess(Request $request)
    {
        $id = $request->input('id');
        if (!$id) {
            $result = [
                "status" => "error",
                "message" => "Blog ID not found!",
            ];
            return response()->json($result);
        }
        $validation = Validator::make($request->all(), [
            "slug" => "required|string",
            "title" => "required|string",
            "short_description" => "required|string",
            "description" => "required|string",
            "status" => "required",
        ]);
        if ($validation->passes()) {
            $data = [
                'slug' =>  $request->input('slug'),
                'title' => $request->input('title'),
                'short_description' => $request->input('short_description'),
                'description' => $request->input('description'),
                'category' => $request->input('category'),
                'tags' => $request->input('tags'),
                'author' => Session::get('admin')->name,
                'status' => $request->input('status')
            ];

            if ($request->hasFile('feature_image')) {
                $image = $request->file('feature_image');
                $originalName = $image->getClientOriginalName();
                $imageName = uniqid() . "_" . $originalName;
                $path = $image->move('public/blogs/' . $imageName);
                if (!$path) {
                    return response()->json([
                        "status" => "error",
                        "message" => "Failed to upload product image!."
                    ]);
                }
                $data['feature_image'] = $path;
            }
            if ($update = DB::table('t_blogs')->where('id', '=', $id)->update($data)) {
                $result = [
                    "status" => "success",
                    "message" => "Blog updated successfully!",
                    "update" => $update
                ];
                return response()->json($result);
            } else {
                $result = [
                    "status" => "error",
                    "message" => "No changes found!",
                ];
                return response()->json($result);
            }
        } else {
            $result = [
                "status" => "error",
                "error" => $validation->errors()
            ];
            return response()->json($result);
        }
    }
}
