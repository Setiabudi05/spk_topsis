<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\AlternatifRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Recca0120\Terminal\Console\Commands\Vi;
use Yajra\DataTables\Facades\DataTables;

class AlternatifController extends Controller
{

    private $alternatifRepo;

    public function __construct()
    {
        $this->alternatifRepo = new AlternatifRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.alternatif.index');
    }

    public function data()
    {
        $alternatifs = $this->alternatifRepo->query();

        return DataTables::of($alternatifs)->addColumn('action', function ($alternatifs) {
            // Add custom action buttons (edit, delete, etc.)

            return '
                    <a class="btn btn-warning btn-sm" href="' . route('admin.alternatif.edit', Crypt::encrypt($alternatifs->id)) . '">Edit</a> |
                    <button type="button" class="btn btn-danger btn-sm btn-delete-alternatif" data-id="' . $alternatifs->id . '" onclick="hapus(' . $alternatifs->id . ')">Hapus</button>
                    <form method="POST" id="form-delete-alternatif-' . $alternatifs->id . '" action="' . route('admin.alternatif.destroy', Crypt::encrypt($alternatifs->id)) . '">
                        <input type="hidden" name="_token" value="' . csrf_token() . '" />
                    </form>';
        })->make(true);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.alternatif.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $validatedData = $validator->validated();

        DB::beginTransaction();
        try {
            $this->alternatifRepo->create($validatedData);
            DB::commit();
            Alert::success('Alternatif Berhasil Dibuat!');
            return redirect(route('admin.alternatif.index'));
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
            Alert::error("Alternatif Gagal Dibuat!");
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $enc_id)
    {
        $alternatifs = $this->alternatifRepo->findOrFail($enc_id);
        return view('admin.alternatif.edit', compact('alternatifs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $enc_id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $validatedData = $validator->validated();
        DB::beginTransaction();
        try {
            $this->alternatifRepo->update($validatedData, $enc_id);
            DB::commit();
            Alert::success('Alternatif Berhasil Diperbarui!');
            return redirect(route('admin.alternatif.index'));
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
            Alert::error("Alternatif Gagal Diperbarui!");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $enc_id)
    {
        DB::beginTransaction();
        try {
            $this->alternatifRepo->enc_delete($enc_id);
            DB::commit();
            Alert::success('Kriteria Berhasil Dihapus!');
            return back();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            Alert::success('Kriteria Gagal Dihapus!');
            return back();
        }
    }
}
