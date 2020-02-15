<?php

namespace App\Http\Controllers\Transend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;
use Auth;
use MetaTag;
use App\Admin\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Lang;

use App\Admin\Traits\Parameter;
use App\Admin\Traits\LanguageSet;
use App\Admin\Repositories\Interfaces\ArticleRepositoryInterface;
use App\Admin\Repositories\Interfaces\ContentRepositoryInterface;
use App\Admin\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Admin\Repositories\Interfaces\LanguageRepositoryInterface;
// use Jenssegers\Agent\Agent;


class CategoryPageController extends Controller
{
    use Parameter, LanguageSet;

    protected $article, $content, $category, $language;
    
    public function __construct(ArticleRepositoryInterface $article,
        ContentRepositoryInterface $content,
        CategoryRepositoryInterface $category,
        LanguageRepositoryInterface $language
        )
    {
        $this->article   = $article;
        $this->content   = $content;
        $this->category  = $category;
        $this->language = $language;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $agent = new Agent();
        // $device = $agent->isMobile();
        $parameters = $this->getParameters();
        $contentName = isset($parameters['content'])?$parameters['content']:null;
        $categoryName = isset($parameters['category'])?$parameters['category']:null;
        $alias = $this->setLanguage();
        $contentID  = $this->content->IdByContentTypeName($contentName);
        $languageID = $this->language->IdByLanguageAlias($alias);
        $categoryID = $this->category->IdByCategoryName($categoryName);
        $howToArticles = $this->howToArticles();
        // $categoryContent = $this->categoryContent();
        // $categorySideSection = $this->categorySideContent();
            if($categoryID){
                $articles = $this->article->getByLanguage($languageID)->getByContent($contentID)->getByCategory($categoryID)->get();
                return view('transend.content.category_content',compact('howToArticles','categorySection', 'categorySideSection','single'));
            }
        $articles = $this->article->getByContent($contentID)->getByLanguage($languageID)->get();
        return view('transend.content.category_content',compact('howToArticles','trendingArticles','categorySection', 'categorySideSection','single'));

        
    }

    // public function categoryContent($content, $language, $category=null, $count=8, $single =0)
    // {
    //     $articles = Article::where('status','1')->where('content_id','=',$content[0]->id)->where('language_id','=',$language[0]->id)->with('author','content','category','language','comments')->paginate($count);
    //     return view('contents.category_section',compact('articles', 'single'));
    // }

    // public function categorySideContent()
    // {
    //     $trendingArticles = $this->trendingArticles();
    //     return view('contents.category_side_section',compact('trendingArticles'));
    // }


    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Request $request)
    // {
    //     $parameters = $request->route()->parameters();
    //     $single = 1;
    //     foreach ($parameters as $key => $value) {
    //         $$key = $value;
    //     }
    //     $locale = str_replace('/', '', $request->route()->getPrefix());
    //     $alias = str_replace(" ","-",$alias);
    //     $language = Language::where('alias',$locale)->get();
    //     $content = Content::where('status','1')->where('url', '=', $content)->get();
    //     if(count($content)==0){
    //         return abort(404);
    //     }
    //     if($category != ''){
    //         $category = Category::where('status','1')->where('url', '=', $category)->get();
    //         if(count($category)==0){
    //             return abort(404);   
    //         }    
    //     }
    //     if(count($content)>0){
    //         if($category !='' && count($category)>0){
    //             $articles = Article::where('status','1')->where('category_id','=',$category[0]->id)->where('content_id','=',$content[0]->id)->where('language_id',$language[0]->id)->with('author','content','category','language')->findOrFail($id);
    //         }
    //     }
    //     $howToArticles = $this->howToArticles();
    //     $categorySideSection = $this->categorySideContent();
    //     if(Str::lower($articles->alias) == Str::lower($alias)){
    //         $categorySection = $this->categoryContent($content, $language, $category, 1, $single);
    //         return view('transend.content.category_content',compact('howToArticles','categorySection', 'categorySideSection'));
    //     }else{
    //         return redirect()->route('single-article',[$category, $subcategory, $articles->alias, $id]);
    //     }
    // }

    // public function trendingArticles($id=null){
    //     $locale = App::getLocale();
    //     $language = Language::where('alias',$locale)->get();
    //     $trendingArticles = Article::where('status','1')->where('language_id','=',$language[0]->id)->where('recent','1')->where('id','!=',$id)->take(5)->get();
    //     return view('contents.first_side_section',compact('trendingArticles'));
    // }

    // public function howToArticles($id=null){
    //     $locale = App::getLocale();
    //     $language = Language::where('alias',$locale)->get();
    //     $howToArticles = Article::where('status','1')->where('language_id','=',$language[0]->id)->where('feature','1')->where('id','!=',$id)->take(5)->get();
    //     return view('contents.second_side_section',compact('howToArticles'));
    // }

    // public function about(){
    //     $locale = App::getLocale();
    //     return view('transend.about');
    // }

    // public function contact(){
    //     $locale = App::getLocale();
    //     return view('transend.contact');
    // }

    // public function addComment(Request $request){
    //     $data = $request->all();
    //     unset($data['_token']);
    //     if(isset(Auth::user()->id)){
    //         $data['user_id'] = Auth::user()->id;
    //         $data['status'] = 1;
    //         $created = Comment::create($data);
    //         if(empty($created)){
    //             return redirect()->back()->withError(['comment'=>'Some Error occur in adding the comment']);
    //         }
    //     }else{
    //         return redirect()->back()->withError(['comment'=> 'Please login First to Add Comment']);
    //     }
    //     return redirect()->back();
    // }
}
