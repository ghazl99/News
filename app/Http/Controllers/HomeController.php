<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller {
    /**
    * Create a new controller instance.
    *
    * @return void
    */

    public function __construct() {
        //
    }

    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */

    public function index() {
        return view( 'pages.index' );
    }

    public function FormCategory() {
        return \view( 'pages.addcategory' );
    }

    public function storeCategory( Request $request ) {
        //validate
        $val = Validator::make( $request->all(), [ 'name'=> 'required|max:50|unique:categories' ] );
        if ( $val ->fails() ) {
            return redirect()->back()->withErrors( $val )->withInput( $request->all() ) ;
        }
        //Add Category
        Category::create( [
            'name'=>$request->name,
        ] );
        return redirect()->back()->with( [ 'success' => 'saved successfully' ] );
    }

    public function FormTag() {
        return \view( 'pages.addtag' );
    }

    public function storeTag( Request $request ) {
        //validation
        Validator::extend('without_spaces', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });
        $val = Validator::make( $request->all(), [ 'type'=> 'required|max:50|unique:tags|without_spaces' ] );
        if ( $val ->fails() ) {
            return redirect()->back()->withErrors( $val )->withInput( $request->all() ) ;
        }
        //Add Tag
        Tag::create( [
            'type'=>$request->type,
        ] );
        return redirect()->back()->with( [ 'success' => 'saved successfully' ] );
    }

    public function FormPost() {
        
        $categories = Category::get()   ;
        $tags = Tag::get();
        return view( 'pages.addpost', compact( 'categories', 'tags' ) );
    }

    public function StorePost( Request $request ) {
         //validation
        $val = Validator::make( $request->all(), [  'name_category'=>'required',
                                                    'types'=>'required',
                                                    'title'=> 'required|max:100',
                                                    'text'=> 'required|max:300'] );
        if ( $val ->fails() ) {
            return redirect()->back()->withErrors( $val )->withInput( $request->all() ) ;
        }
        //Add Post
        $post = Post::create( [
            'category_id'=>$request->name_category,
            'title'=>$request->title,
            'paragraph'=>$request->text
        ] );
        $Postid = Post::find( $post->id );
        $Postid->tags()->attach( $request->types ) ;
        return redirect()->back()->with( [ 'success' => 'saved successfully' ] );

    }

}