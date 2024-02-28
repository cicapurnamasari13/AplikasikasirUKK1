<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::all();
        return view('produk.index',compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Produk::all();
        return view('produk.from_create',compact('produk'));
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
                'nama_produk' => 'required',
                'harga' => 'required',
                'stok' => 'required',
            ],
            [
                'mana_produk.required' => 'nama_produk wajib diisi',
                'harga.required' => 'harga wajib diisi',
                'stok.required' => 'stok wajib diisi',
            ],
        );

        $data = [
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ];

        Produk::create($data);
        return redirect('produk')->with('success', 'Data Berhasil di Simpan!');
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
        $dt = Produk::find($id);
        return view('produk.from_edit', compact ('dt'));
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
            'nama_produk' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ],[
            'nama_produk.required' => 'Nama produk wajib di isi',
            'harga.required' => 'Harga wajib di isi',
            'stok.required' => 'Harga wajib di isi',
        ]
    );
    $data = [
        'nama_produk' => $request->nama_produk,
        'harga' => $request->harga,
        'stok' => $request->stok,
    ];

    Produk::where('id', $id)->update($data);
    return redirect()->route('produk.index')->with('succes', 'Data berhasil di simpan');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produk::find($id)->delete();
        return back()->with('success','Data berhasil di hapus');
    }
    public function export_pdf()
    {
        $data =Produk::orderBy('nama_produk','asc');
        $data =$data->get();

        // Pass parameters to the export view
        $pdf = PDF::loadview('produk.exportpdf', ['data'=>$data]); 
        $pdf->setPaper('a4','portrait');
        $pdf->setOption(['dpi'=>150, 'defaultFont' => 'sans-serif']);
        //set file name
        $filename = date('YmdHis') . 'produk';
        //download the pdf file
        return $pdf->download($filename.'.pdf');
    }
}
