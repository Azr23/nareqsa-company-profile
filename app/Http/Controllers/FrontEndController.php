<?php
namespace App\Http\Controllers;
use App\Models\CompanyProfile;
use App\Models\Service;

class FrontEndController extends Controller
{
    public function index()
    {
        $profile = CompanyProfile::first();
        $services = Service::all();
        return view('welcome', compact('profile', 'services'));
    }
}