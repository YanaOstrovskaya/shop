<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;
class PortfolioController extends Controller
{
        public function show($slug){
	    	if(!$slug){
    		abort('404');
    	}
    	if(view()->exists('site.portfolio')){
    		//where alias = $alias
    		$portfolio = Portfolio::where('slug', strip_tags($slug))->first();
    			
    		return view('site.portfolio', compact('portfolio'));
    	}
    	else{
    		abort('404');
    	}
    }
}
