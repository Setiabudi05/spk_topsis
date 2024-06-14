<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\KriteriaRepository;
use App\Repositories\SubKriteriaRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class SubKriteriaController extends Controller
{
    private $kriteriaRepo, $subKriteriaRepo;

    public function __construct()
    {
        $this->kriteriaRepo = new KriteriaRepository;
        $this->subKriteriaRepo = new SubKriteriaRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.subkriteria.index');
    }

    public function data()
    {
        $sub_kriterias = $this->subKriteriaRepo->query();

        return DataTables::of($sub_kriterias)->addColumn('kriteria', function ($kriterias) {
            return '(' . $kriterias->kriteria->kode . ') ' . $kriterias->kriteria->nama . ''; // Access user name through the relationship
        })->addColumn('action', function ($sub_kriterias) {
            // Add custom action buttons (edit, delete, etc.)

            return '
                    <a class="btn btn-warning btn-sm" href="' . route('admin.subkriteria.edit', Crypt::encrypt($sub_kriterias->id)) . '">Edit</a> |
                    <button type="button" class="btn btn-danger btn-sm btn-delete-user" data-id="' . $sub_kriterias->id . '" onclick="hapus(' . $sub_kriterias->id . ')">Hapus</button>
                    <form method="POST" id="form-delete-sub-kriteria-' . $sub_kriterias->id . '" action="' . route('admin.subkriteria.destroy', Crypt::encrypt($sub_kriterias->id)) . '">
                        <input type="hidden" name="_token" value="' . csrf_token() . '" />
                    </form>';
        })->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kriterias = $this->kriteriaRepo->all();
        return view('admin.subkriteria.create', compact('kriterias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kriteria_id' => 'required',
            'nama' => 'required',
            'nilai' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $validatedData = $validator->validated();

        DB::beginTransaction();
        try {
            $this->subKriteriaRepo->create($validatedData);
            DB::commit();
            Alert::success('Sub Kriteria Berhasil Dibuat!');
            return redirect(route('admin.subkriteria.index'));
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
            Alert::error("Sub Kriteria Gagal Dibuat!");
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $enc_id)
    {
        $subkriterias = $this->subKriteriaRepo->findOrFail($enc_id);
        return view('admin.subkriteria.edit', compact('subkriterias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $enc_id)
    {
        $validator = Validator::make($request->all(), [
            // 'kriteria_id' => 'required',
            'nama' => 'required',
            'nilai' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $validatedData = $validator->validated();
        DB::beginTransaction();
        try {
            $this->subKriteriaRepo->update($validatedData, $enc_id);
            DB::commit();
            Alert::success('Kriteria Berhasil Diperbarui!');
            return redirect(route('admin.subkriteria.index'));
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
            Alert::error("Kriteria Gagal Diperbarui!");
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
            $this->subKriteriaRepo->enc_delete($enc_id);
            DB::commit();
            Alert::success('User Kriteria has been deleted!');
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            Alert::success('User Kriteria failed to delete!');
            return redirect()->back();
        }
    }
}
