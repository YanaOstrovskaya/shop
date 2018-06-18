<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Portfolio;
use App\People;
use DB;
use Mail;
use App\Filter;
class IndexController extends Controller
{
    public function execute(Request $request){

    	$pages = Page::all();
        $portfolios = Portfolio::all();
    	$peoples = People::take(3)->get();

        $tags = DB::table('portfolios')
            ->join('filters', 'filters.id', '=', 'portfolios.filter_id')
            ->distinct()->pluck('filters.name');

    	$menu = [];
        
    	foreach ($pages as $page) {
    		$item = ['title'=>$page->name, 'alias'=>$page->alias];
    		array_push($menu, $item);
    	}


    	$item = ['title'=>'Shop','alias'=>'Shop'];
    	array_push($menu, $item);

    	$item = ['title'=>'Team','alias'=>'team'];
    	array_push($menu, $item);

    	$item = ['title'=>'Contact','alias'=>'contact'];
    	array_push($menu, $item);

    		return view('site.index', array(
    			'menu'=>$menu,
    			'pages'=>$pages,
    			'portfolios'=>$portfolios,
    			'peoples'=>$peoples,
               'tags'=>$tags
    		));
    }
}
