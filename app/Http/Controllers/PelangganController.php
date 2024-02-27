<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('pelanggan.index',compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.from_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate(
            [
                'nama_pelanggan' => 'required',
                'alamat' => 'required',
                'nomor_telepon' => 'required',
            ],
            [
                'mana_pelanggan.required' => 'judul wajib diisi',
                'alamat.required' => 'penulis wajib diisi',
                'nomor_telepon.required' => 'penerbit wajib diisi',
            ],
        );

        $data = [
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon,
        ];

        Pelanggan::create($data);
        return redirect('pelanggan')->with('success', 'Data Berhasil di Simpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dt = Pelanggan::find($id);
        return view('pelanggan.from_edit',compact('dt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'nama_pelanggan' => 'required',
                'alamat' => 'required',
                'nomor_telepon' => 'required',
            ],
            [
                'nama_pelanggan.required' => 'judul wajib diisi',
                'alamat.required' => 'penulis wajib diisi',
                'nomor_telepon.required' => 'penerbit wajib diisi',
            ],
        );

        $data = [
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon,
        ];

        Pelanggan::where('id', $id)->update($data);
        return redirect('pelanggan')->with('success', 'Data Berhasil di Edit!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pelanggan::find($id)->delete();
        return back()->with('success','Data berhasil di hapus');
    }
    public function export_pdf()
    {
        $data =Pelanggan::orderBy('nama_pelanggan','asc');
        $data =$data->get();

        // Pass parameters to the export view
        $pdf = PDF::loadview('pelanggan.exportpdf', ['data'=>$data]);
        $pdf->setPaper('a4','portrait');
        $pdf->setOption(['dpi'=>150, 'defaultFont' => 'sans-serif']);
        //set file name
        $filename = date('YmdHis') . 'pelanggan';
        //download the pdf file
        return $pdf->download($filename.'.pdf');
    }
}
