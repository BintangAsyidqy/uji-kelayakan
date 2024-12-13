<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('report.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('report.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        // Menyimpan data keluhan
        $report = new Report();
        $report->provinsi = $request->provinsi;
        $report->kota = $request->kota;
        $report->kecamatan = $request->kecamatan;
        $report->kelurahan = $request->kelurahan;
        $report->type = $request->type;
        $report->keluhan = $request->keluhan;

        // Menyimpan foto jika ada
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('uploads', 'public');
            $report->foto = $path;
        }

        // Menyimpan data keluhan
        $report->save();

        // Menampilkan alert sukses
        session()->flash('success', 'Keluhan Anda telah berhasil dikirim!');

        // Redirect ke halaman laporan atau halaman lain yang sesuai
        return redirect()->route('report.article'); // redirect ke form create setelah sukses
    }


    public function article()
    {
        return view('report.article');
    }

    public function showArticle()
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }
}
