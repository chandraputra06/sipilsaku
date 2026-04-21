<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Ebook;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalEbooks = Ebook::count();
        $totalCourses = Course::count();
        $totalAdmins = User::where('role', '1')->count();

        return view('pages.admin.dashboard', compact(
            'totalUsers',
            'totalEbooks',
            'totalCourses',
            'totalAdmins'
        ));
    }
}