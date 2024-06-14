<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    private $userRepo;

    public function __construct()
    {
        $this->userRepo = new UserRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.user.index');
    }
    public function data()
    {
        $users = $this->userRepo->query();

        return DataTables::of($users)->addColumn('action', function ($users) {
            // Add custom action buttons (edit, delete, etc.)
            if (Auth::user()->id == $users->id) {
                return '
                    <a class="btn btn-warning btn-sm" href="' . route('admin.user.edit', Crypt::encrypt($users->id)) . '">Edit</a> |
                    <button type="button" class="btn btn-danger btn-sm" disabled>Hapus</button>
                    ';
            } else {
                return '
                    <a class="btn btn-warning btn-sm" href="' . route('admin.user.edit', Crypt::encrypt($users->id)) . '">Edit</a> |
                    <button type="button" class="btn btn-danger btn-sm btn-delete-user" data-id="' . $users->id . '" onclick="hapus(' . $users->id . ')">Hapus</button>
                    <form method="POST" id="form-delete-user-' .  Crypt::encrypt($users->id) . '" action="' . route('admin.user.destroy', $users->id) . '">
                        <input type="hidden" name="_token" value="' . csrf_token() . '" />
                    </form>';
            }
        })->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|same:confirm_password',
            'confirm_password' => 'required|min:8|same:password',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $validatedData = $validator->validated();
        // Hash the password before creating the user
        $validatedData['password'] = Hash::make($validatedData['password']);

        DB::beginTransaction();
        try {
            if ($request->verified == true) {
                $validatedData['email_verified_at'] = now();
            }
            $user = $this->userRepo->create($validatedData);
            $user->assignRole($request->role);
            DB::commit();
            Alert::success('User has been created!');
            return redirect(route('admin.user.index'));
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
            Alert::error("User failed to create!");
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $enc_id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $enc_id)
    {
        $roles = Role::all();
        $id = Crypt::decrypt($enc_id);
        $users = $this->userRepo->findOrFail($id);
        return view('admin.user.edit', compact('users', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $enc_id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
        ]);
        if ($request->password) {
            $validator = Validator::make($request->all(), [
                'password' => 'min:8|same:confirm_password',
                'confirm_password' => 'min:8|same:password',
            ]);
        }

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $validatedData = $validator->validated();
        // Hash the password before creating the user
        if ($request->password) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }


        DB::beginTransaction();
        try {
            if ($request->verified == true) {
                $validatedData['email_verified_at'] = now();
            }
            $user = $this->userRepo->update($validatedData, $enc_id);

            $user->syncRoles($request->role);
            DB::commit();
            Alert::success('User Updated!');
            return redirect(route('admin.user.index'));
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::success("User fail to update!");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $enc_id)
    {
        $id = Crypt::decrypt($enc_id);
        DB::beginTransaction();
        try {
            $this->userRepo->delete($id);
            DB::commit();
            Alert::success('Data User Berhasil Dihapus!');
            return redirect(route('admin.user.index'));
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error("Error! Can't delete user");
            return back();
        }
    }
}
