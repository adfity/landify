<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Template;
use Illuminate\Support\Facades\Storage;

class AddtempController extends Controller
{
    // Menampilkan semua halaman
    public function index()
    {
        $templates = Template::where('user_id', auth()->id())->get(); // Hanya ambil data milik pengguna login
        return view('admin.template.index', compact('templates'));
    }

    // Menampilkan formulir untuk membuat halaman baru
    public function create()
    {
        return view('admin.template.create');
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

        Template::create($requestData);

        return redirect()->route('admin.add-temp')->with('success', 'Template created successfully');
    }

    // Menampilkan halaman tertentu
    public function show($id)
    {
        $template = Template::findOrFail($id);
        return view('admin.template.preview', compact('template'));
    }

    // Menampilkan formulir untuk mengedit halaman
    public function edit($id)
    {
        $template = Template::findOrFail($id);
        return view('admin.template.edit', compact('template'));
    }

    // Memperbarui halaman dalam database
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'type' => 'required|in:Portfolio,Ecommerce,Business,Blog',
            'price' => 'required',
            'custom_price' => 'nullable|numeric|min:1',
            'img1' => 'nullable|image|mimes:jpg,jpeg,png',
            'img2' => 'nullable|image|mimes:jpg,jpeg,png',
            'img3' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        // Cari template berdasarkan ID
        $template = Template::findOrFail($id);

        // Proses setiap file gambar jika ada
        foreach (['img1', 'img2', 'img3'] as $imgField) {
            if ($request->hasFile($imgField)) {
                // Hapus gambar lama jika ada
                if ($template->$imgField) {
                    $oldPath = str_replace('storage/', '', $template->$imgField);
                    if (Storage::disk('public')->exists($oldPath)) {
                        Storage::disk('public')->delete($oldPath);
                    }
                }

                // Simpan file baru ke folder storage/app/public/thumbnail/{imgField}
                $path = $request->file($imgField)->storeAs(
                    "thumbnail/{$imgField}",
                    time() . '.' . $request->file($imgField)->getClientOriginalExtension(),
                    'public'
                );

                // Simpan path ke database (dengan 'storage/' agar kompatibel dengan asset())
                $template->$imgField = 'storage/' . $path;
            }
        }

        // Update data lainnya
        $template->title = $request->title;
        $template->short_description = $request->short_description;
        $template->type = $request->type;
        $template->status = $request->has('status') && $request->status === 'active' ? 'active' : 'deactive';

        // Update harga berdasarkan pilihan
        if ($request->price === 'custom') {
            $template->price = '$' . $request->custom_price;
        } else {
            $template->price = $request->price;
        }

        // Simpan ke database
        $template->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('admin.add-temp')->with('success', 'Template updated successfully');
    }

    // Menghapus halaman dari database
    public function destroy($id)
    {
        $template = Template::findOrFail($id);
        $template->delete();

        return redirect()->route('admin.add-temp')->with('success', 'Template deleted successfully');
    }
}
