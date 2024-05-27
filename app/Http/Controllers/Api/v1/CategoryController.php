<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Admin\CategoryFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
       $category = Category::all();
       return response()->json([
        'status' => empty($category) ? 'true' : 'false',
        'message' => empty($category) ? 'Data Found' : 'Data not Found',
        'data' => $category,
    ]);
    }
}
