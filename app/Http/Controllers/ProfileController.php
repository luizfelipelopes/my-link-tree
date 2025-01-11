<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile', [
            'user' => auth()->user()
        ]);
    }

    public function update(ProfileRequest $request)
    {
        $user = auth()->user();

        $data = $request->validated();

        if($file = $request->photo) {
            $data['photo'] = $file->store('photos');
        }

        $user->fill($data)->save();

        return back()
        ->with('message', 'Profile atualizado com sucesso!');
    }
}
