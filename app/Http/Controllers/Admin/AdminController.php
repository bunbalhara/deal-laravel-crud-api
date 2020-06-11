<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deal;
use App\Models\Location;
use App\Models\LocationTheme;
use App\Models\Specialdate;
use App\Models\Theme;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

        $locationCount = Location::get()->count();
        $themeCount = Theme::get()->count();
        $locationThemeCount = LocationTheme::get()->count();
        $specialDateCount = Specialdate::get()->count();
        $dealCount = Deal::get()->count();

        return view('pages.dashboard',
            compact('locationThemeCount','locationCount','dealCount','themeCount','specialDateCount'));
    }
}
