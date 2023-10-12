<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\{ User };
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\{ ProfileRequest, TeacherProfileRequest, StudentProfileRequest, PasswordRequest };

class ProfileController extends Controller
{
    public function index()
    {
        return view('common.profile');
    }

    public function instructor()
    {
        return view('profile.instructor');
    }

    public function profile($id)
    {
        $data = User::find($id);

        return view('profile.index', [
            'data' => $data
        ]);
    }

    public function completeProfile()
    {
        return view('complete-profile.index', []);
    }

    public function changePassword()
    {
        return view('common.change-password', []);
    }

    public function update(ProfileRequest $request)
    {
        $user = User::find(auth()->user()->id);

        
        tap($user)->update($request->except(['department', 'date_of_appointment']));

        if ((int) $user->role_id === 2) {
            $user->teacherProfile()->update($request->only(['department', 'date_of_appointment']));
        }

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Updated Successfully.',
            'success' => true,
        ], 200);
    }

    public function updateProfilePhoto(Request $request)
    {
        $file = $request->file('profile_photo');
        $filePath = 'files/avatar/' . auth()->user()->id;
        $fileName = $file->getClientOriginalName();
        
        $file->storeAs($filePath, $fileName, 'public');
        $fileUrl = 'storage/' . $filePath . '/' . $fileName;

        auth()->user()->update(['photo' => $fileUrl]);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Updated Successfully.',
            'success' => true,
        ], 200);

        // $s3 = Storage::disk('s3');
        // $fileUrl = $s3->url($s3->put('files/avatar/'.auth()->user()->id, $request->profile_photo, 'public'));
        // auth()->user()->update(['photo' => $fileUrl]);

        // return response()->json([
        //     'redirect_url' => redirect()->back()->getTargetUrl(),
        //     'message' => 'Updated Successfully.',
        //     'success' => true,
        // ], 200);
    }

    public function updatePassword(PasswordRequest $request)
    {
        $request->merge([
            'password' => Hash::make($request->password),
        ]);

        auth()->user()->update($request->except(['password_confirmation']));

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Updated Successfully.',
            'success' => true,
        ], 200);
    }
}
