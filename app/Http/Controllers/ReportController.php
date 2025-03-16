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
        // dd($request->gambar->extension());
        $request->validate([
            "spv" => "required",
            "shift" => "required",
            "laporan" => "required",
            "job_by" => "required",
            "gambar" => "required",
            "remark" => "required",
            "sparepart" => "required"
        ]);


        $destinationPath = "upload";
        $file = $request->file("gambar");
        $spv = $request->spv;
        $shift = $request->shift;
        $bagian = $request->bagian;
        $laporan = $request->laporan;
        $jobBy = $request->job_by;
        $area = $request->area;
        $gambar = $request->gambar->getClientOriginalName();
        $remark = $request->remark;
        $extensi = $request->gambar->extension();
        if ($remark == "Done") {
            $pending = "";
        } else {
            $pending = $request->pending;
        }
        $sparepart = $request->sparepart;
        if ($request->file("gambar")->isValid()) {
            if ($extensi != "jpg" && $extensi != "png") {
                return redirect("/");
            }
        }
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
