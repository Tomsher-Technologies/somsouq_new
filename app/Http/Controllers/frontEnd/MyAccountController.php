<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Upload;
use App\Models\User;
use App\Rules\MatchNewPassword;
use App\Rules\MatchOldPassword;
use Artisan;
use Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

final class MyAccountController extends Controller
{
    public function index()
    {
        try {
            $data['posts'] = Post::leftJoin('states', 'states.id', '=', 'posts.state_id')
                ->leftJoin('cities', 'cities.id', '=', 'posts.city_id')
                ->where('posts.created_by', $this->guard()->id())->whereIn('posts.status', ['pending', 'approved', 'sold', 'rejected'])
                ->orderBy('posts.updated_at', 'desc')
                ->get([
                    'posts.id',
                    'posts.title',
                    'posts.description',
                    'posts.status',
                    'states.name as state',
                    'cities.name as city',
                ]);

            $data['wishlists'] = Post::join('wishlists', 'wishlists.post_id', 'posts.id')
                ->leftJoin('categories', 'categories.id', '=', 'posts.category_id')
                ->leftJoin('states', 'states.id', '=', 'posts.state_id')
                ->leftJoin('cities', 'cities.id', '=', 'posts.city_id')
                ->where('posts.status', 'approved')
                ->where('wishlists.user_id', $this->guard()->id())
                ->orderBy('wishlists.id', 'DESC')
                ->get([
                    'posts.id',
                    'posts.category_id',
                    'posts.title',
                    'posts.price',
                    'posts.status',
                    'wishlists.id as list_id',
                    'states.name as state',
                    'cities.name as city'
                ]);

            $data['total_pending'] = Post::where('created_by', $this->guard()->id())->whereIn('status', ['pending'])->count();
            $data['total_approve'] = Post::where('created_by', $this->guard()->id())->whereIn('status', ['approved'])->count();
            $data['total_sold'] = Post::where('created_by', $this->guard()->id())->whereIn('status', ['sold'])->count();
            $data['total_rejected'] = Post::where('created_by', $this->guard()->id())->whereIn('status', ['rejected'])->count();

            return view('frontEnd.account.index', $data);
        }catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function editProfile()
    {
        return view('frontEnd.account.edit-profile');
    }

    public function changePassword()
    {
        return view('frontEnd.account.change-password');
    }

    public function updateProfile(Request $request)
    {
        try {
            $user = User::find($request->user_id);
            $user->name = $request->get('name') ?? "";
            $user->email = $request->get('email') ?? "";
            $user->phone_number = $request->get('phone_number') ?? "";
            $user->w_app_number = $request->get('w_app_number') ?? "";
            $user->state_id = $request->get('state_id') ?? "";
            $user->city_id = $request->get('city_id') ?? "";
            $user->save();

            if ($request->hasFile('profile_img')) {
                $this->fileUpload(file: $request->file('profile_img'));
            }

            return redirect()->back()->with('success', trans('messages.profile_updated'));
        }catch (\Exception $e) {
            return redirect()->back()->with('error', trans('messages.wrong'));
        }
    }

    public function fileUpload($file):void
    {
        $auth_user = $this->guard()->user();
        $upload = Upload::findOrNew($auth_user->image);

        if (!empty($auth_user->image)) {
            if (Storage::disk('public')->exists($upload->file_name)) {
                Storage::disk('public')->delete($upload->file_name);
            }
        }

        $upload->extension = $file->getClientOriginalExtension();
        $upload->file_original_name = explode('.', $file->getClientOriginalName())[0];
        $upload->file_name = $file->store('uploads/all', 'public');
        $upload->user_id = $this->guard()->user()->id;
        $upload->type = explode('/', $file->getClientMimeType())[0];
        $upload->file_size = $file->getSize();
        $upload->save();

        $auth_user->image = $upload->id;
        $auth_user->save();
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
//            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required', 'string', 'min:6', 'same:password_confirmation', new MatchNewPassword],
            'password_confirmation' => ['required','string', 'min:6'],
        ]);
        try {
            $user = $this->guard()->user();
            $user->password = Hash::make($request->get('new_password'));
            $user->save();

            return redirect()->back()->with('success', trans('messages.profile_updated'));
        }catch (\Exception $e){
            return redirect()->back()->with('error', trans('messages.wrong'));
        }
    }

    public function guard()
    {
        return Auth::guard('web');
    }

    public function isProfileUpdated(Request $request)
    {
        try {
            $getUser = $this->guard()->user();
            if (empty($getUser->phone_number) && empty($getUser->w_app_number)) {
                return response()->json([
                    'success' => true,
                    'profile_status'=> false,
                    'url' => route('edit.profile'),
                    'message' => trans('messages.update_your_profile'),
                ]);
            } else {
                return response()->json([
                    'success' => true,
                    'profile_status'=> true,
                    'url' => route('post.create'),
                ]);
            }
        }catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => trans('messages.wrong'),
            ]);
        }
    }
}
