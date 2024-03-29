<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Category;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $query = Post::published();

        if(request('month')) {
            $query->whereMonth(request('month'));
        }

        if(request('year')) {
            $query->whereYear(request('year'));
        }

		$posts = $query->paginate();

    	return view('pages.home', compact('posts'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function archive()
    {
        /*$archive =  Post::selectRaw('year(published_at) year')
                ->selectRaw('monthname(published_at) month')
                ->selectRaw('count(*) posts')
                ->groupBy('year', 'month')
                ->orderBy('published_at')
                ->get();*/

        return view('pages.archive', [
            'authors' => User::latest()->take(4)->get(),
            'categories' => Category::take(7)->get(),
            'posts' => Post::latest('published_at')->take(5)->get(),
            'archive' => []
        ]);
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
