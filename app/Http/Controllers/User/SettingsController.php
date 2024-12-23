<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Page;


class SettingsController extends Controller
{
    public function index()
    {
        $pages = Page::where('user_id', auth()->id())
                        ->orderBy('updated_at', 'desc') // Mengurutkan berdasarkan updated_at terbaru
                        ->get();
        return view('user.setting.index', compact('pages'));
    }
    //SEO
    public function SEOindex()
    {
        $pages = Page::where('user_id', auth()->id())
                        ->orderBy('updated_at', 'desc') // Mengurutkan berdasarkan updated_at terbaru
                        ->get();
        return view('user.setting.seo.index', compact('pages'));
    }

    public function portfolio()
    {
        return view('user.setting.seo.portfolio');  // Menampilkan halaman settings
    }
    //DOMAIN
    public function DOMAINindex()
    {
        return view('user.setting.domain.index');  // Menampilkan halaman settings

    }
    public function marketing()
    {

        return view('user.setting.domain.marketing'); 
    }
    public function google()
    {

        return view('user.setting.domain.google'); 
    }
}
