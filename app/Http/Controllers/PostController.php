<?php

namespace App\Http\Controllers;

use DB;
use Uuid;
use \Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBlogPost;
use App\Repositories\Tag\TagRepository;
use App\Repositories\Post\PostRepository;

class PostController extends Controller
{
    protected $tagRepository;
    protected $postRepository;

    public function __construct(PostRepository $postRepository, TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
        $this->postRepository = $postRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cms.post.index')->with([
            'posts' => $this->postRepository->showAll(),
            'tags' => $this->tagRepository->showAll(),
            'total_tags' => $this->tagRepository->count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.post.create')->with(['tags' => $this->tagRepository->showAll()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPost $request)
    {
        DB::beginTransaction();

        try {
            if ($request->hasFile('photo')) {
                $file = $request->file("photo");
                $filename = $file->getClientOriginalName();
                $linkfile = md5(uniqid() . $filename) . "." . $file->getClientOriginalExtension();
                $destinationPath = "uploads/";
                $file->move($destinationPath, $linkfile);

                $data = [
                    'uuid' => Uuid::generate(),
                    'title' => $request->title,
                    'slug' => str_slug($request->title),
                    'content' => $request->content,
                    'photo' => $linkfile,
                    'published_at' => Carbon::now()
                ];

                $post = $this->postRepository->store($data);
                $post->tags()->sync($request->tags);

                DB::commit();

                return redirect("posts")->with("success", "Post has been created");
            }
        } catch (Exception $e) {
            DB::rollback();

            $errors = [
                'status' => false,
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ];

            return redirect()->back()->with("error", $errors);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        if (!$slug = $this->postRepository->showBySlug($slug)) {
            return redirect()->back();
        }

        return view('cms.post.show')->with(['post' => $slug]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
