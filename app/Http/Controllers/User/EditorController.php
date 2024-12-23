<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Page;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class EditorController extends Controller
{
    // Menampilkan semua halaman
    public function index() {
        $pages = Page::where('user_id', auth()->id())
                     ->orderBy('updated_at', 'desc') // Mengurutkan berdasarkan updated_at terbaru
                     ->get();
        
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
        // Validasi input
        $request->validate([
            'title' => 'required',
            'short_description' => 'required',
        ]);
    
        // Ambil isi default.json
        $jsonFilePath = storage_path('app/public/default.json');
        $jsonContent = file_get_contents($jsonFilePath);
    
        // Menggabungkan data request dengan nilai default
        $requestData = $request->all();
        $requestData['content'] = $jsonContent; // Isi konten dari default.json
        $requestData['user_id'] = Auth::user()->id;
        $requestData['status'] = $request->input('status', 'unpublish'); // Set default 'unpublish'
    
        // Menyimpan data ke database dan mendapatkan instance model
        $page = Page::create($requestData);
    
        // Redirect ke halaman editor dengan pesan sukses
        return redirect()->route('user.edit_page', ['id' => $page->id])
                        ->with('success', 'Page created successfully');
    }
    


    // Menampilkan halaman tertentu
    public function show($id)
    {
        $page = Page::findOrFail($id);
        return view('user.edit.page', compact('page'));
    }

    public function preview($id)
    {
        $page = Page::findOrFail($id);
        return view('user.edit.preview', compact('page'));
    }

    public function publish($id, $slug)
    {
        $page = Page::findOrFail($id); // Ambil data berdasarkan ID
        return view('user.edit.publish', compact('page')); // Kirim data ke view 'user.edit.preview'
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
    
        // Jika ada file gambar yang diupload
        if ($request->hasFile('img1')) {
            // Hapus gambar lama dari storage jika ada
            if ($page->img1 && Storage::exists($page->img1)) {
                Storage::delete($page->img1);
            }
    
            // Ambil file gambar yang diupload
            $image = $request->file('img1');
    
            // Generate nama file yang unik
            $filename = 'thumbnail_' . time() . '.' . $image->getClientOriginalExtension();
    
            // Simpan file gambar di folder storage/app/public/thumbnail/img1
            $path = $image->storeAs('public/thumbnail/img1', $filename);
    
            // Update kolom img1 dengan path gambar yang baru
            $page->img1 = $path; // Simpan path relatif
        }
    
        // Update kolom lainnya
        $page->title = $request->title;
        $page->short_description = $request->short_description;
    
        // Jika slug diisi, update. Jika tidak, biarkan nilai slug sebelumnya.
        if ($request->filled('slug')) {
            $page->slug = $request->slug;
        }
    
        // Update status
        $page->status = $request->has('status') && $request->status === 'publish' ? 'publish' : 'unpublish';
    
        $page->save();
    
        // Redirect dengan pesan sukses
        return redirect()->route('user.editor')->with('success', 'Page "' . $page->title . '" has been updated successfully.');
    }
    
    

    // Menghapus halaman dari database
    public function destroy($id)
    {
        // Cari halaman berdasarkan ID
        $page = Page::findOrFail($id);
    
        // Hapus file gambar dari storage jika ada
        if ($page->img1 && Storage::exists($page->img1)) {
            Storage::delete($page->img1);
        }
    
        // Hapus data dari database
        $page->delete();
    
        // Redirect dengan pesan sukses
        return redirect()->route('user.editor')->with('success', 'Page "' . $page->title . '" has been deleted successfully.');
    }
    

    public function timeIndex(Request $request)
{
    $filter = $request->get('filter');
    $query = Page::query();

    if ($filter === 'today') {
        $query->whereDate('updated_at', Carbon::today());
    } elseif ($filter === 'this-week') {
        $query->whereBetween('updated_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
    } elseif ($filter === 'this-month') {
        $query->whereMonth('updated_at', Carbon::now()->month)
              ->whereYear('updated_at', Carbon::now()->year);
    }

    $pages = $query->get();

    // Debugging: log the query and results
    Log::info("Filter: $filter, Pages: " . $pages->count());

    return view('user.edit.index', compact('pages'));
}

}
