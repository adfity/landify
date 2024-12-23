<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\Page;

class DashboardController extends Controller
{
    public function userDashboard()
    {
        $nama = Auth::user()->name;
        return view('user.index', compact('nama'));
    }
    
    public function adminDashboard()
    {
        $nama = Auth::user()->name;
        return view('dashboard.admin', compact('nama'));
    }
    public function index() {
        $pages = Page::all();
        
        return view('user.edit.index', compact('pages'));
    }
    

    // Menampilkan formulir untuk membuat halaman baru
    public function create()
    {
        return view('user.edit.create');
    }

    // Menyimpan halaman baru ke dalam database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'short_description' => 'required'
        ]);
        $jsonFilePath = storage_path('app/public/default.json');
        $jsonContent = file_get_contents($jsonFilePath);

        $requestData = $request->all();
        $requestData['content'] = $jsonContent;
        $requestData['user_id'] = Auth::user()->id;

        Page::create($requestData);

        return redirect()->route('user.editor')->with('success', 'Page created successfully');
    }

    // Menampilkan halaman tertentu
    public function show($id)
    {
        $page = Page::findOrFail($id);
        return view('user.edit.preview', compact('page'));
    }

    // Menampilkan formulir untuk mengedit halaman
    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('user.edit.edit', compact('page'));
    }

    // Memperbarui halaman dalam database
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'img1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validasi file gambar
        ]);
    
        // Cari halaman berdasarkan ID
        $page = Page::findOrFail($id);
    
        // Jika ada file gambar yang diupload dan gambar lama ada
        if ($request->hasFile('img1')) {
            // Hapus gambar lama dari storage jika ada
            if ($page->img1) {
                $oldImagePath = public_path($page->img1);
                if (file_exists($oldImagePath)) {
                    // Hapus file gambar lama
                    unlink($oldImagePath);
                }
            }
    
            // Ambil file gambar yang diupload
            $image = $request->file('img1');
            
            // Generate nama file yang unik
            $filename = 'thumbnail_' . time() . '.' . $image->getClientOriginalExtension();
            
            // Simpan file gambar di folder public/thumbnail/img1
            $path = $image->storeAs('public/thumbnail/img1', $filename);
    
            // Update kolom img1 dengan path gambar yang baru
            $page->img1 = 'storage/thumbnail/img1/' . $filename;
        }
    
        // Update kolom lainnya
        $page->title = $request->title;
        $page->short_description = $request->short_description;
        $page->save();
    
        // Redirect dengan pesan sukses
        return redirect()->route('user.editor')->with('success', 'Page updated successfully');
    }

    // Menghapus halaman dari database
    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();

        return redirect()->route('user.editor')->with('success', 'Page deleted successfully');
    }


    //TEMPLATES
    public function template_index()
    {
        $template = Template::where('status', 'active')->get();
        return view('template.index', compact('template')); 
    }

    public function template_show($id)
    {
        $template = Template::findOrFail($id);
        return view('template.show', compact('template'));
    }

}
