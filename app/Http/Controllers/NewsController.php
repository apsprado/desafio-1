<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('news.index', ['news' => News::where('user_id', Auth::user()->id)
                                    ->where('title', 'LIKE', "%{$request->search}%")
                                    ->paginate(30)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $news = [];
        return view('news.create', compact('news'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNewsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
        $attributes = $request->validated();
        $attributes['user_id'] = Auth::user()->id;
        $news = News::create($attributes);
        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::query()->where('id', $id)->get()->first();
        return view('news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::query()->where('id', $id)->get()->first();
        return view('news.create', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNewsRequest  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request, $id)
    {
        $attributes  = $request->validated();
        News::find($id)->update($attributes);
        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $model, $id)
    {
        $news = $model->search($id);
        if ($news->user != Auth::user()->id) {
            return back();
        }
        $news->delete();
        return redirect()->route('news.index');
    }
}
