<?php

namespace App\Http\Controllers\Forapi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\Page;


class TempController extends Controller
{
    public function loadProjectApi($id)
    {
        $template = Template::findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => json_decode($template->content),
            'message' => 'Success load page content'
        ]);
    }

    public function storeProjectApi(Request $request, $id)
    {
        $template = Template::findOrFail($id);
        $template->update(['content' => json_encode($request->input('data'))]);

        return response()->json([
            'success' => true,
            'data' => null,
            'message' => 'Project stored successfully'
        ]);
    }
    
    public function storeProjectPageApi(Request $request, $id)
    {
        $template = Template::findOrFail($id);
        // $template->update(['content' => json_encode($request->input('data'))]);

        return response()->json([
            'success' => true,
            'data' => null,
            'message' => 'Project stored successfully'
        ]);
    }


}