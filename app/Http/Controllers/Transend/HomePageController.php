<?php

namespace App\Http\Controllers\Transend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Models\FirstModule;
use App\Admin\Models\SecondModule;
use App\Admin\Models\ThirdModule;
use App\Admin\Models\Article;
use App\Admin\Models\Contenttype as Content;
use App\Admin\Models\NewsLetter;
use App;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $locale = str_replace('/', '', $request->route()->getPrefix());
        App::setLocale($locale);
        $homeRecentSection = $this->homeRecentSection();
        $trendingArticles = $this->trendingArticles();
        
        $homeLatestSection = $this->homeLatestSection();
        $howToArticles = $this->howToArticles();

        $homePopularSection = $this->homePopularSection();
        
        return view('transend.content.home',compact('homeRecentSection','trendingArticles', 'homeLatestSection' , 'howToArticles','homePopularSection'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function homeRecentSection()
    {
        $firstModules = FirstModule::where('language_id','=','2')->where('status','1')->orderBy('order')->limit(4)->get()->toArray();
        foreach ($firstModules as $key => $value){
            $article = Article::where('status','1')->find($value['article_id']);
            $firstModules[$key]['alias'] = $article->alias;
            $firstModules[$key]['image'] = $article->image;
            $firstModules[$key]['title'] = $article->title;
            $firstModules[$key]['description'] = $article->description;
            $firstModules[$key]['content'] = $article->content['url'];
            $firstModules[$key]['category'] = $article->category['url'];
        }
        return view('contents.first_section',compact('firstModules'));
    }

    public function trendingArticles()
    {
        $trendingArticles =Article::where('status','1')->where('language_id','=','2')->where('feature','1')->take(5)->get();
        return view('contents.first_side_section',compact('trendingArticles'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function homeLatestSection()
    {
        $secondModules = SecondModule::where('language_id','=','2')->where('status','1')->orderBy('order')->get()->toArray();
        foreach ($secondModules as $key => $value){
            $article = Article::where('status','1')->findOrFail($value['article_id']);
                $secondModules[$key]['alias'] = $article->alias;
                $secondModules[$key]['image'] = $article->image;
                $secondModules[$key]['title'] = $article->title;
                $secondModules[$key]['description'] = $article->description;
                $secondModules[$key]['content'] = $article->content['url'];
                $secondModules[$key]['category'] = $article->category['url'];
            
        }
        return view('contents.second_section',compact('secondModules'));
    }

    public function howToArticles()
    {
        $howToArticles = Article::where('status','1')->where('language_id','=','2')->where('published','1')->take(5)->get();
        return view('contents.second_side_section',compact('howToArticles'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function homePopularSection()
    {
        $thirdModules = ThirdModule::where('language_id','=','2')->where('status','1')->orderBy('order')->get()->toArray();
        foreach ($thirdModules as $key => $value){
            $article = Article::where('status','1')->findOrFail($value['article_id']);
            $thirdModules[$key]['article_id'] = $article->id;
            $thirdModules[$key]['alias'] = $article->alias;
            $thirdModules[$key]['image'] = $article->image;
            $thirdModules[$key]['title'] = $article->title;
            $thirdModules[$key]['description'] = $article->description;
            $thirdModules[$key]['category'] = $article->category['url'];
            $thirdModules[$key]['content'] = $article->content['url'];
            $thirdModules[$key]['date'] = date('d F Y', strtotime($article->created_at));
        }
        return view('contents.third_section',compact('thirdModules'));
    }
}
