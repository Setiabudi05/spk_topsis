<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use App\Repositories\KriteriaRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class KriteriaController extends Controller
{
    private $kriteriaRepo, $userRepo;

    public function __construct()
    {
        $this->kriteriaRepo = new KriteriaRepository;
        $this->userRepo = new UserRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.kriteria.index');
    }

    public function data()
    {
        $kriterias = $this->kriteriaRepo->query();

        return DataTables::of($kriterias)->addColumn('action', function ($kriterias) {

            return '
                    <a class="btn btn-warning btn-sm" href="' . route('admin.kriteria.edit', Crypt::encrypt($kriterias->id)) . '">Edit</a> |
                    <button type="button" class="btn btn-danger btn-sm btn-delete-user" data-id="' . $kriterias->id . '" onclick="hapus(' . $kriterias->id . ')">Hapus</button>
                    <form method="POST" id="form-delete-kriteria-' . $kriterias->id . '" action="' . route('admin.kriteria.destroy', Crypt::encrypt($kriterias->id)) . '">
                        <input type="hidden" name="_token" value="' . csrf_token() . '" />
                    </form>';
        })->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kriteria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required|unique:kriterias',
            'nama' => 'required',
            'sys_name' => 'required',
            'bobot' => 'required',
            'jenis' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $validatedData = $validator->validated();

        DB::beginTransaction();
        try {
            $this->kriteriaRepo->create($validatedData);
            DB::commit();
            Alert::success('Kriteria Berhasil Dibuat!');
            return redirect(route('admin.kriteria.index'));
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
            Alert::error("Kriteria Gagal Dibuat!");
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        try {
            $bbt_pendidikan = 5;
            $bbt_sertifikat = 3;
            $bbt_kemampuan = 4;
            $bbt_teknologi = 4;
            $bbt_tools = 4;
            $bbt_infrakstruktur = 4;

            $pmbg_pendidikan = 0;
            $pmbg_sertifikat = 0;
            $pmbg_kemampuan = 0;
            $pmbg_teknologi = 0;
            $pmbg_tools = 0;
            $pmbg_infrakstruktur = 0;

            $normalisasi = [];
            $normalisasi_bbt = [];
            $d_plus = [];
            $d_minus = [];
            $hasil = [];

            $kriteria = Kriteria::all();
            foreach ($kriteria as $k) {
                $pmbg_pendidikan = $pmbg_pendidikan + ($k->pendidikan * $k->pendidikan);
                $pmbg_sertifikat = $pmbg_sertifikat + ($k->sertifikat * $k->sertifikat);
                $pmbg_kemampuan = $pmbg_kemampuan + ($k->kemampuan * $k->kemampuan);
                $pmbg_teknologi = $pmbg_teknologi + ($k->penggunaan_teknologi * $k->penggunaan_teknologi);
                $pmbg_tools = $pmbg_tools + ($k->penggunaan_tools * $k->penggunaan_tools);
                $pmbg_infrakstruktur = $pmbg_infrakstruktur + ($k->infrakstruktur * $k->infrakstruktur);
            }
            $pmbg_pendidikan = sqrt($pmbg_pendidikan);
            $pmbg_sertifikat = sqrt($pmbg_sertifikat);
            $pmbg_kemampuan = sqrt($pmbg_kemampuan);
            $pmbg_teknologi = sqrt($pmbg_teknologi);
            $pmbg_tools = sqrt($pmbg_tools);
            $pmbg_infrakstruktur = sqrt($pmbg_infrakstruktur);


            foreach ($kriteria as $k) {
                $newItem = [ // Modify or format the item here
                    'name' => $k->user->name,
                    'pendidikan' => $k->pendidikan / $pmbg_pendidikan,
                    'sertifikat' => $k->sertifikat / $pmbg_sertifikat,
                    'kemampuan' => $k->kemampuan / $pmbg_kemampuan,
                    'penggunaan_teknologi' => $k->penggunaan_teknologi / $pmbg_teknologi,
                    'penggunaan_tools' => $k->penggunaan_tools / $pmbg_tools,
                    'infrakstruktur' => $k->infrakstruktur / $pmbg_infrakstruktur,
                ];
                array_push($normalisasi, $newItem);
            }

            foreach ($normalisasi as $n) {
                // dd($n->name);
                $newItem = [ // Modify or format the item here
                    'name' => $n['name'],
                    'pendidikan' => $n['pendidikan'] * $bbt_pendidikan,
                    'sertifikat' => $n['sertifikat'] * $bbt_sertifikat,
                    'kemampuan' => $n['kemampuan'] * $bbt_kemampuan,
                    'penggunaan_teknologi' => $n['penggunaan_teknologi'] * $bbt_teknologi,
                    'penggunaan_tools' => $n['penggunaan_tools'] * $bbt_tools,
                    'infrakstruktur' => $n['infrakstruktur'] * $bbt_infrakstruktur,
                ];
                array_push($normalisasi_bbt, $newItem);
            }

            $pendidikan = array_map(function ($obj) {
                return $obj['pendidikan'];
            }, $normalisasi_bbt);
            $sertifikat = array_map(function ($obj) {
                return $obj['sertifikat'];
            }, $normalisasi_bbt);
            $kemampuan = array_map(function ($obj) {
                return $obj['kemampuan'];
            }, $normalisasi_bbt);
            $penggunaan_teknologi = array_map(function ($obj) {
                return $obj['penggunaan_teknologi'];
            }, $normalisasi_bbt);
            $penggunaan_tools = array_map(function ($obj) {
                return $obj['penggunaan_tools'];
            }, $normalisasi_bbt);
            $infrakstruktur = array_map(function ($obj) {
                return $obj['infrakstruktur'];
            }, $normalisasi_bbt);

            $min = [
                'pendidikan' => min($pendidikan),
                'sertifikat' => min($sertifikat),
                'kemampuan' => min($kemampuan),
                'penggunaan_teknologi' => min($penggunaan_teknologi),
                'penggunaan_tools' => min($penggunaan_tools),
                'infrakstruktur' => min($infrakstruktur),
            ];
            $max = [
                'pendidikan' => max($pendidikan),
                'sertifikat' => max($sertifikat),
                'kemampuan' => max($kemampuan),
                'penggunaan_teknologi' => max($penggunaan_teknologi),
                'penggunaan_tools' => max($penggunaan_tools),
                'infrakstruktur' => max($infrakstruktur),
            ];

            foreach ($normalisasi_bbt as $n) {
                // dd($n->name);
                $new_d_plus = [
                    'name' => $n['name'],
                    'd_plus' => sqrt((($max['pendidikan'] - $n['pendidikan']) ** 2) + (($max['sertifikat'] - $n['sertifikat']) ** 2) + (($max['kemampuan'] - $n['kemampuan']) ** 2) + (($max['penggunaan_teknologi'] - $n['penggunaan_teknologi']) ** 2) + (($max['penggunaan_tools'] - $n['penggunaan_tools']) ** 2) + (($max['infrakstruktur'] - $n['infrakstruktur']) ** 2))
                ];
                $new_d_minus = [
                    'name' => $n['name'],
                    'd_minus' => sqrt((($n['pendidikan'] - $min['pendidikan']) ** 2) + (($n['sertifikat'] - $min['sertifikat']) ** 2) + (($n['kemampuan'] - $min['kemampuan']) ** 2) + (($n['penggunaan_teknologi'] - $min['penggunaan_teknologi']) ** 2) + (($n['penggunaan_tools'] - $min['penggunaan_tools']) ** 2) + (($n['infrakstruktur'] - $min['infrakstruktur']) ** 2))
                ];
                array_push($d_plus, $new_d_plus);
                array_push($d_minus, $new_d_minus);
            }

            foreach ($d_minus as $index => $d) {
                $new_hasil = [
                    'name' => $d['name'],
                    'hasil' => $d['d_minus'] / ($d['d_minus'] + $d_plus[$index]['d_plus']),
                ];
                array_push($hasil, $new_hasil);
            }

            $has = array_column($hasil, 'hasil');
            array_multisort($hasil, SORT_DESC, $has);
            $obj = collect($hasil);
            $hasils = $obj->sortByDesc('hasil');
            return view('admin.hasil-kriteria.index', compact('hasils'));
        } catch (\Throwable $th) {
            Alert::error('Gagal Menampilkan Data!');
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $enc_id)
    {
        $kriterias = $this->kriteriaRepo->findOrFail($enc_id);
        return view('admin.kriteria.edit', compact('kriterias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $enc_id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'bobot' => 'required',
            'jenis' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $validatedData = $validator->validated();
        DB::beginTransaction();
        try {
            $this->kriteriaRepo->update($validatedData, $enc_id);
            DB::commit();
            Alert::success('Kriteria Berhasil Diperbarui!');
            return redirect(route('admin.kriteria.index'));
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
            $this->kriteriaRepo->enc_delete($enc_id);
            DB::commit();
            Alert::success('Kriteria Berhasil Dihapus!');
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            Alert::success('Kriteria Gagal Dihapus!');
            return redirect()->back();
        }
    }
}
