<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Jadwal_baru;
use App\Models\pendaftar;
use App\Models\Poli;
use Illuminate\Http\Request;

class  PasienController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $data = Dokter::where('nama_dokter', 'LIKE', '%' . $searchTerm . '%')->get();
        } else {
            $data = Dokter::all();
        }
        return view('admin.datadokter', compact('data'));
    }


    public function tambahdata()
    {
        $data = Poli::all();
        return view('/admin/tambahdata' , compact('data'));
    }

    public function insertdata(Request $request)
    {
        // dd($request->all());
        $data2 = Poli::all();
        $this->validate($request,[
                'nama_dokter'=>'required|max:30|',
                'jeniskelamin'=>'required',
                'poli'=>'required',
                'foto'=>'required',
        ]);
        $data = Dokter::create($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotodokter/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('dokter')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function tampilkandata($id)
    {
        $data = Dokter::find($id);
        $data2 = Poli::all();
        // dd($data);
        return view('/admin/editdokter', compact('data','data2'));
    }

    public function updatedata(Request $request, $id)
    {
        $data = Dokter::find($id);
        $data->update($request->all());
        return redirect()->route('dokter')->with('success', 'Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $data = Dokter::find($id);
        $data->delete();
        return redirect()->route('dokter')->with('success', 'Data Berhasil Di Hapus');
    }

    public function jadwal(Request $request)
    {
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $datadokter = Jadwal_baru::whereHas('dokter', function ($query) use ($searchTerm) {
                $query->where('nama_dokter', 'LIKE', '%' . $searchTerm . '%');
            })->get();
        } else {
            $datadokter = Jadwal_baru::all(); 
        }
        return view('/admin/datajadwal', compact('datadokter'));
            // $data = Dokter::all();
            // $datadokter = Jadwal_baru::all();
            // // dd($data);
        }

        public function jadwal_dr(Request $request)
    {
        $data = Dokter::all();
        if ($request->has('searching')) {
            $searchTerm = $request->input('searching');
            $datadokter = Jadwal_baru::whereHas('dokter', function ($query) use ($searchTerm) {
                $query->where('nama_dokter', 'LIKE', '%' . $searchTerm . '%');
            })->get();
        } else {
            $datadokter = Jadwal_baru::all();
        }
        return view('admin/jadwal_dr', compact('datadokter' ,));
            // $data = Dokter::all();
            // $datadokter = Jadwal_baru::all();
            // // dd($data);
        }
    
        public function deletejadwal($id_jadwal)
        {
            // Temukan data dokter berdasarkan id_jadwal
            $dokter = Jadwal_baru::find($id_jadwal);
            if ($dokter) {
                // Hapus data dokter jika ditemukan
                $dokter->delete();
                return redirect()->route('jadwal_dr')->with('success', 'Data Berhasil Di Hapus');
            } else {
                return redirect()->route('jadwal_dr')->with('error', 'Data dokter tidak ditemukan');
            }
        }


        public function dr()
        {
            $datadokter = Dokter::all();
            $jadwalBaru = Jadwal_baru::all();
        
            // Mengambil dokter yang belum memiliki jadwal
            $datadokter = $datadokter->reject(function ($dokter) use ($jadwalBaru) {
                return $jadwalBaru->contains('id_dokter', $dokter->id_dokter);
            });
        
            return view('/admin/jadwal', compact('datadokter', 'jadwalBaru'));
        }
        

    public function tambahjadwal(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'id_dr'=>'required',
    ]);
        $data = Jadwal_baru::create($request->all());
        return redirect()->route('jadwal_dr')->with('success', 'Jadwal Berhasil Di Buat');
    }

    public function insertjadwal(Request $request)
    {
        dd($request->all());
        // Jadwal_baru::create($request->all());
        // return redirect()->route('insertjadwal')->with('success', 'Jadwal Berhasil Di Tambahkan');
    }

    public function tampildata($id)
    {
        $data = Jadwal_baru::find($id);
        // dd($data);
        return view('/admin/editjadwal', compact('data'));
    }

    public function updatejadwal (Request $request, $id)
    {
        $data = Jadwal_baru::find($id);
        $data->update($request->all());
        return redirect()->route('jadwal_dr')->with('success', 'Jadwal Dokter Berhasil Di Update');
    }

    public function pasien(Request $request)
{
    // Mendapatkan data poli untuk opsi pencarian
    // dd($request->all());
    $dokters = Dokter::all();

    $polis = Poli::all();
    
    // Inisialisasi query builder untuk model Pendaftar
    $query = pendaftar::query();

    // Menerapkan filter berdasarkan poli
    if ($request->has('poli')) {
        $query->where('id_poli', $request->poli);
    }

    // Menerapkan filter berdasarkan dokter
    if ($request->has('dokter')) {
        $query->where('id_dr', $request->dokter);
    }

    // Menerapkan filter berdasarkan tanggal pendaftaran
    if ($request->has('tanggal_daftar')) {
        $query->whereDate('tanggal_daftar', $request->tanggal_daftar);
    }
    // Mengambil data pasien berdasarkan filter
    $data = $query->get();

    return view('admin.pasien', compact('data', 'polis','dokters'));
}



    public function formpasien(Request $request)
    {
        $datadokter = Dokter::all();
        $po = poli::all();
        $data = pendaftar::all();
        $ja = Jadwal_baru::all();
    return view('user/formpasien', compact('datadokter','data','po','ja'));
    }

    // Controller (misalnya, FormPasienController)
    public function bypoli($poli)
    {
        try {
            $dokterByPoli = Dokter::where('poli', $poli)->get();
    
            if ($dokterByPoli->isEmpty()) {
                return response()->json(['message' => 'Tidak ada data dokter untuk poli ini'], 404);
            }
    
            return response()->json($dokterByPoli);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }
    
    public function tampilpasien($id_pasien)
    {
        $data = pendaftar::find($id_pasien);
        $po = poli::all();
        // dd($data);
        return view('/admin/editpasien', compact('data','po'));
    }

    public function updatepasien (Request $request, $id_pasien)
    {
        $data = pendaftar::find($id_pasien);
        $data->update($request->all());
        return redirect()->route('pasien')->with('success', 'Jadwal Dokter Berhasil Di Update');
    }

    public function insert_form(Request $request)
    {
        $this->validate($request,[
            'nama'=>'required',
            'tanggal_lahir'=>'required',  
            'nik'=>'required|min:10||max:30|',
            'id_poli'=>'required',
            'id_dr'=>'required',
            'penanggung'=>'required',
            'jenis_kelamin'=>'required',
            'no_hp'=>'required',
            'alamat'=>'required',
            'foto_kk'=>'required',
        ]);
        $data = pendaftar::create($request->all());
        // Proses upload foto Kartu Keluarga
        if ($request->hasFile('foto_kk')) {
            $request->file('foto_kk')->move('fotopasien/', $request->file('foto_kk')->getClientOriginalName());
            $data->foto_kk = $request->file('foto_kk')->getClientOriginalName();
        }

        if ($request->hasFile('foto_ktp')) {
            $request->file('foto_ktp')->move('fotopasien/', $request->file('foto_ktp')->getClientOriginalName());
            $data->foto_ktp = $request->file('foto_ktp')->getClientOriginalName();
        }
    
        // // Proses upload foto Kartu BPJS/Asuransi
        if ($request->hasFile('foto_kartu')) {
            $request->file('foto_kartu')->move('fotopasien/', $request->file('foto_kartu')->getClientOriginalName());
            $data->foto_kartu = $request->file('foto_kartu')->getClientOriginalName();
        }

    
        // Save the changes to the database
        $data->save();
    
        // Redirect to the 'home' route with a success message
        return redirect()->route('home')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function delete_pasien($id_pasien)
        {
            // Temukan data dokter berdasarkan id_jadwal
            $pasien = pendaftar::find($id_pasien);
            if ($pasien) {
                // Hapus data pasie$pasien jika ditemukan
                $pasien->delete();
                return redirect()->route('pasien')->with('success', 'Data Berhasil Di Hapus');
            } else {
                return redirect()->route('pasien')->with('error', 'Data dokter tidak ditemukan');
            }
        }

    
    public function datapoli()
        {
            $data = Poli::all();   
            return view('/admin/datapoli',compact('data'));
        }

    public function tambahpoli()
        {
            return view('/admin/tambahpoli');
        }

        public function insert_poli(Request $request)
        {
            $this->validate($request,[
                'nama'=>'required',
        ]);
            $data = Poli::create($request->all());
            
            return redirect()->route('datapoli')->with('success', 'Data Berhasil Ditambahkan');
        }

    public function delete_poli($id_poli)
        {
            // Temukan data dokter berdasarkan id_jadwal
            $poli = Poli::find($id_poli);
            if ($poli) {
                // Hapus data pasie$poli jika ditemukan
                $poli->delete();
                return redirect()->route('datapoli')->with('success', 'Data Berhasil Di Hapus');
            } else {
                return redirect()->route('datapoli')->with('error', 'Data dokter tidak ditemukan');
            }
        }

    public function tampilpoli($id_poli)
        {
            $data = Poli::find($id_poli);
            // dd($data);
            return view('/admin/editpoli', compact('data'));
        }
        
    public function updatepoli (Request $request, $id_poli)
        {
            $data = Poli::find($id_poli);
            $data->update($request->all());
            return redirect()->route('datapoli')->with('success', 'Jadwal Dokter Berhasil Di Update');
        }

    // Pada PendaftarController.php
    public function prosesDaftar(Request $request)
    {
        try {
            // Proses penyimpanan data ke tabel pendaftar
            $data = Pendaftar::create($request->all());
    
            // Proses upload foto Kartu Keluarga, KTP, dan Kartu BPJS/Asuransi
            foreach (['foto_kk', 'foto_ktp', 'foto_kartu'] as $fileType) {
                if ($request->hasFile($fileType)) {
                    $file = $request->file($fileType);
                    $fileName = $fileType . '_' . time() . '.' . $file->getClientOriginalExtension();
                    $file->move('fotopasien/', $fileName);
                    $data->$fileType = $fileName;
                }
            }
    
            // Ambil informasi dokter dan poli
            $dokter = Dokter::find($request->id_dr);
            $poli = Poli::find($request->id_poli);
    
            // Tentukan nomor antrean berdasarkan dokter dan tanggal pendaftaran
            $tanggalDaftar = $request->tanggal_daftar;
            $nomorAntrean = Pendaftar::where('id_dr', $request->id_dr)
                ->whereDate('tanggal_daftar', $tanggalDaftar)
                ->count();
            // Nomor antrean dimulai dari 1 jika tidak ada pendaftar sebelumnya
            $nomorAntrean = $nomorAntrean > 0 ? $nomorAntrean : 1;

    
            // Update kolom antrean dengan nilai yang baru dihitung
            $data->update(['antrean' => $nomorAntrean]);
    
            return response()->json([
                'antrean' => $nomorAntrean,
                'nama' => $request->nama,
                'poli' => $poli->nama, // Ambil nama poli dari relasi
                'dokter' => $dokter->nama_dokter, // Ambil nama dokter dari relasi
                'tanggalDaftar' => $request->tanggal_daftar, // Ambil nama dokter dari relasi
            ]);
        } catch (\Exception $e) {
            // Tangani kesalahan, misalnya:
            return response()->json(['error' => 'Gagal memproses pendaftaran.']);
        }
    }
    
    
    public function getDoctorSchedule($id)
{
    try {
        // Gantilah 'Jadwal' dengan nama model jadwal dokter yang sesuai
        $jadwal = Jadwal_baru::where('id_dr', $id)->first();

        // Periksa apakah jadwal dokter ditemukan
        if ($jadwal) {
            // Sesuaikan dengan struktur data jadwal dokter pada model Anda
            return response()->json([
                'nama_dokter' => $jadwal->dokter->nama_dokter,
                'senin_awal' => $jadwal->senin_awal,
                'senin_akhir' => $jadwal->senin_akhir,
                'selasa_awal' => $jadwal->selasa_awal,
                'selasa_akhir' => $jadwal->selasa_akhir,
                'rabu_awal' => $jadwal->rabu_awal,
                'rabu_akhir' => $jadwal->rabu_akhir,
                'kamis_awal' => $jadwal->kamis_awal,
                'kamis_akhir' => $jadwal->kamis_akhir,
                'jumat_awal' => $jadwal->jumat_awal,
                'jumat_akhir' => $jadwal->jumat_akhir,
                'sabtu_awal' => $jadwal->sabtu_awal,
                'sabtu_akhir' => $jadwal->sabtu_akhir,
                'minggu_awal' => $jadwal->minggu_awal,
                'minggu_akhir' => $jadwal->minggu_akhir,
                // Tambahkan atribut lainnya sesuai kebutuhan
            ]);
        } else {
            // Jika jadwal dokter tidak ditemukan, kirim respons 404
            return response()->json(['error' => 'Jadwal dokter tidak ditemukan'], 404);
        }
    } catch (\Exception $e) {
        // Catat kesalahan
        \Log::error('Error in getDoctorSchedule: ' . $e->getMessage());

        // Mengembalikan respons kesalahan
        return response()->json(['error' => 'Internal Server Error'], 500);
    }
}

    public function cariPasien(Request $request)
    {
        // Mendapatkan data dari input form
        $nikCari = $request->input('search');

        // Melakukan pencarian berdasarkan NIK
        $data = Pendaftar::where('nik', $nikCari)->get();

        // Mengirim data hasil pencarian ke view
        return view('user/caripasien', compact('data'));
    }
}
    

