<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualan = Penjualan::all();
        return view('penjualan.index',compact('penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penjualan  =  Penjualan::all();
        return view('penjualan.from_create',compact('penjualan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'tanggal_penjualan' => 'required',
                'total_harga' => 'required',
                'pelanggan_id' => 'required',
            ],
            [
                'tanggal_penjualan.required' => 'tanggal penjualan wajib diisi',
                'total_harga.required' => 'total harga wajib diisi',
                'pelanggan_id.required' => 'pelanggan id wajib diisi',
            ],
        );

        $data = [
            'tanggal_penjualan' => $request->tanggal_penjualan,
            'total_harga' => $request->total_harga,
            'pelanggan_id' => $request->pelanggan_id,
        ];

        Penjualan::create($data);
        return redirect()->route('penjualan.index')->with('success', 'Data Berhasil di Simpan!');
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
        $dt = Penjualan::find($id);
        return view('penjualan.from_edit', compact ('dt'));
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
        $request->validate([
            'tanggal_penjualan' => 'required',
            'total_harga' => 'required',
            'pelanggan_id' => 'required',
        ],[
            'tanggal_penjualan.required' => 'tanggal penjualan wajib di isi',
            'total_harga.required' => 'total harga wajib di isi',
            'pelanggan_id.required' => 'pelanggan id wajib di isi',
        ]
    );
    $data = [
        'tanggal_penjualan' => $request->tanggal_penjualan,
        'total_harga' => $request->total_harga,
        'pelanggan_id' => $request->pelanggan_id,
    ];

    Penjualan::where('id', $id)->update($data);
    return redirect()->route('penjualan.index')->with('succes', 'Data berhasil di simpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Penjualan::find($id)->delete();
        return back()->with('succes', 'data berhasil di hapus');
    }

    public function export_pdf()
    {
        $data =Penjualan::orderBy('tanggal_penjualan','asc');
        $data =$data->get();

        // Pass parameters to the export view
        $pdf = PDF::loadview('penjualan.exportpdf', ['data'=>$data]); 
        $pdf->setPaper('a4','portrait');
        $pdf->setOption(['dpi'=>150, 'defaultFont' => 'sans-serif']);
        //set file name
        $filename = date('YmdHis') . 'penjualan';
        //download the pdf file
        return $pdf->download($filename.'.pdf');
    }
}
