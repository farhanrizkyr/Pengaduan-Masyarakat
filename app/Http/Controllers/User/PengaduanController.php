<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct() {
        $this->middleware('auth');
      }

    public function index()
    {
        $pengaduans=Pengaduan::where('user_id',auth()->user()->id)->wherein('status',['0','1'])->reorder('created_at', 'desc')->get();
        return view('User.list_pengaduan',compact('pengaduans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('User.buat_pengaduan');

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
        'judul'=>'required',
        'pengaduan'=>'required',
        'gambar'=>'required|mimes:jpg,png,jpeg|max:5120',
        ],
        [
        'judul.required'=>'Wajib Di isi',
        'pengaduan.required'=>'Wajib Di isi',
        'gambar.required'=>'Wajib Di isi',
        'gambar.mimes'=>'Wajib JPG,PNG,JPEG',
        'gambar.max'=>'Maximal 5 MB',
    
       ]);

       if (request()->gambar) {
        $file=request()->file('gambar');
        $filename=time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('Bukti_Laporan'),$filename);
       }
       Pengaduan::create([
       'judul'=>request()->judul,
         'user_id'=>Auth::user()->id,
       'pengaduan'=>request()->pengaduan,
       'gambar'=>$filename,
       ]);

       return redirect('/apps-user/list-laporan-pengaduan')->with('pesan','Data Pengaduan Berhasil Di Buat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data=Pengaduan::find($id);
        return view('User.edit_pengaduan',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        request()->validate([
            'judul'=>'required',
            'pengaduan'=>'required',
            'gambar'=>'mimes:jpg,png,jpeg|max:5120',
            ],
            [
            'judul.required'=>'Wajib Di isi',
            'pengaduan.required'=>'Wajib Di isi',
            'gambar.required'=>'Wajib Di isi',
            'gambar.mimes'=>'Wajib JPG,PNG,JPEG',
            'gambar.max'=>'Maximal 5 MB',
        
           ]);

           if (request()->gambar <> '') {
              $file=request()->file('gambar');
              $filename=time().'. '.$file->getClientOriginalExtension();
              $file->move(public_path('Bukti_Laporan'),$filename);

              Pengaduan::find($id)->update([
                'judul'=>request()->judul,
                  'user_id'=>Auth::user()->id,
                'pengaduan'=>request()->pengaduan,
                'gambar'=>$filename,
                ]);

                if (request()->gambar_lama) {
                    unlink(public_path('Bukti_Laporan').'/'.request()->gambar_lama);
                    }
         
           }

          
           else{
            Pengaduan::find($id)->update([
                'judul'=>request()->judul,
                  'user_id'=>Auth::user()->id,
                'pengaduan'=>request()->pengaduan,

            ]);
           }  

         return redirect('/apps-user/list-laporan-pengaduan')->with('pesan','Data Pengaduan Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $data=Pengaduan::find($id);
       $data->delete();
       if ($data->gambar <> '') {
      unlink(public_path('Bukti_Laporan').'/'.$data->gambar);
       }

       return redirect('/apps-user/list-laporan-pengaduan')->with('pesan','Data Pengaduan Berhasil Di Hapus');
    }
}
