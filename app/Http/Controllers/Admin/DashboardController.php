<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;


class DashboardController extends Controller
{
    public function index()
    {
        $category = Category::count();
        $posts = Post::count();
        $users = User::where('role_as', '0')->count();
        $admins = User::where('role_as', '1')->count();

        return view('admin.dashboard', compact('category', 'posts', 'users', 'admins'));
    }
}
