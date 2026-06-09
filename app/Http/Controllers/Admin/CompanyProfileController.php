<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyProfileController extends Controller
{
    public function edit()
    {
        $profile = CompanyProfile::first();
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'about'        => 'required|string',
            'email'        => 'required|email',
            'phone'        => 'required|string|max:20',
            'address'      => 'required|string',
            'logo'         => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $profile = CompanyProfile::first();
        $data = $request->except(['_token', '_method', 'logo']);

        if ($request->hasFile('logo')) {
            
            if ($profile && $profile->logo && Storage::disk('public')->exists($profile->logo)) {
                Storage::disk('public')->delete($profile->logo);
            }
            
            $data['logo'] = $request->file('logo')->store('logo', 'public');
        }

        
        CompanyProfile::updateOrCreate(
            ['id' => 1],
            $data
        );

        return redirect()->route('admin.profile.edit')->with('success', 'Data Company Profile berhasil diperbarui!');
    }
}