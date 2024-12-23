<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Page;

class TemplateController extends Controller
{
    public function index()
    {
        $template = Template::where('status', 'active')->get();
        return view('user.template.index', compact('template')); 
    }

    public function show($id)
    {
        $template = Template::findOrFail($id);
        return view('user.template.show', compact('template'));
    }

    public function preview($id)
    {
        $template = Template::findOrFail($id);
        return view('user.template.preview', compact('template'));
    }

    public function use($id)
    {
        $template = Template::findOrFail($id);
        return view('user.template.use', compact('template'));
    }

    public function store(Request $request, $id)
    {
        $template = Template::findOrFail($id);

        // Validasi: hanya template dengan harga "Free" yang bisa diproses
        if ($template->price !== 'Free') {
            return redirect()->back()->with('error', 'Silahkan lakukan pembayaran untuk menggunakan template ini.');
        }

        // Buat data baru di tabel pages
        $page = Page::create([
            'title' => $template->type,
            'short_description' => $template->short_description,
            'content' => $template->content,
            'status' => 'unpublish',
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('user.edit_page', ['id' => $page->id])->with('success', 'Page created successfully');
    }



}
