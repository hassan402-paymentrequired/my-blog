<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogPostRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Mail\Connect;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class BlogPostController extends Controller
{

    public function index()
    {

        return view('blog.home', [
            'blogposts' => BlogPost::all(),
        ]);
    }
    public function store(BlogPostRequest $request)
    {
        $validatedData = $request->validated();


        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
        }

        $blogPost = BlogPost::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['editorValue'],
            'author' => "Hassan@laramic",
            'image' => $path
        ]);

        return redirect(route('dashboard'));
    }



    // Route::get('/blog-post/{blog_post:slug}/{post_id}', [BlogPostController::class, 'show'])->name("show.blog.post");

    public function show(BlogPost $blog_post)
    {
        // $post = BlogPost::where('post_id',$post_id)->first();
        return view("BlogPost/BlogPost", [
            'blogpost' => $blog_post,
        ]);
    }


    public function connect()
    {
        return Inertia::render('Connect/Connect');
    }

    public function edit($id)
    {
        $post = BlogPost::where('post_id', $id)->first();
        return Inertia::render('BlogPost/EditBlogPost', ['blogPost' => $post]);
    }

    public function update(BlogUpdateRequest $request,$id)
    {

        // dd($request->all());

        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
            $path = 'storage/images/' . $imageName;
            if (file_exists($path)) {
                unlink($path);
            }
            $request->file('image')->storeAs('public/images', $imageName);
            $path = 'images/' . $imageName;
        } else {
            $path = $request->input('image');
        }
        $blog_post = BlogPost::find($id);


        $blog_post->update([
            'title' => $validatedData['title'],
            'content' => $validatedData['editorValue'],
            'image' => $path
        ]);

        return redirect(route('dashboard'));
    }

    public function sendConnection(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'reason' => 'required',
        ]);
            Mail::to('lateefoluwafemi@gmail.com')->queue(new Connect($request['name'], $request['email'], $request['reason']));
            return redirect()->back();
    }
}
