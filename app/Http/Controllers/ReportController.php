<?php

namespace App\Http\Controllers;

use App\Models\report as ModelsReport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Report;

class ReportController extends Controller
{
    //
    public function store(Request $request)
    {
        // dd($request);
        $spv = $request->spv;
        $shift = $request->shift;
        $bagian = $request->bagian;
        // if ($shift == "Shift 1" && $bagian == "Shift") {
        //     $laporan = $request->laporan;
        //     $laporanNonShift = "";
        //     $laporanUtility = "";
        // } elseif ($shift == "Shift 1" && $bagian == "Non Shift") {
        //     $laporanNonShift = $request->laporan;
        //     $laporan = "";
        //     $laporanUtility = "";
        // } elseif ($shift == "Shift 1" && $bagian == "Utility") {
        //     $laporanUtility = $request->laporan;
        //     $laporan = "";
        //     $laporanUtility = "";
        // } else {
        //     $bagian = "Shift";
        //     $laporan = $request->laporan;
        //     $laporanUtility = "";
        //     $laporanNonShift = "";
        // }
        $laporan = $request->laporan;
        $jobBy = $request->job_by;
        $area = $request->area;
        $gambar = $request->gambar->getClientOriginalName();
        $remark = $request->remark;
        if ($remark == "Done") {
            $pending = "";
        } else {
            $pending = $request->pending;
        }
        $sparepart = $request->sparepart;
        $report = ModelsReport::create([
            "date" => Carbon::now(),
            "spv" => $spv,
            "shift" => $shift,
            "work_section" => $bagian,
            "report" => $laporan,
            "job_by" => $jobBy,
            "area" => $area,
            "image" => $gambar,
            "remark" => $remark,
            "pending_reason" => $pending,
            "sparepart_name" => $sparepart
        ]);
        if ($report) {
            return redirect("/")->with("success", "Input Berhasil");
        }
    }
}
