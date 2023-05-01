<?php

namespace App\Http\Controllers;

use App\Models\News;
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
    public function index()
    {
        return view('news.index', ['news' => News::where('user_id',Auth::user()->id)->paginate(30)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNewsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request, News $model)
    {
        $attributes = $request->validated();
        $news = new News($attributes);
        $news['image'] = $model->verifiedImage($attributes);
        $news->save();
        return redirect(route('news.create'))->with('status', __('Notícia cadastrada com sucesso.'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news, $id)
    {
        return view('news.show', [ 'news' => $news->search($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $model, $id)
    {
        $news = $model->where('id', $id)->get()->first();
        return view('news.create', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNewsRequest  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request,  $id)
    {
        $attributes  = $request->validated();
        $news = News::find($id);
        $news['image'] = News::verifiedImage($attributes);
        $news->update($attributes);
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
        if ($news->user != Auth::user()) return back();
        $news->delete();
        return redirect()->route('news.index');
    }
}
