@extends('core.template')
@section('content')
    @session('success')
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endsession
    <div class="card shadow mb-4" onload="check()">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Submit Laporan</h6>
        </div>
        <div class="card-body">
            <form action="{{ url('/laporan') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-6 pe-0">
                        <label for="spv-select" class="form-label">SPV</label>
                        <select class="form-control" name="spv" id="spv-select-1">
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-6 pe-0">
                        <label for="shift-select" class="form-label">Shift</label>
                        <select class="form-control" name="shift" onchange="BagianCollapse()" id="shift-select">
                            <option value="Shift 1">Shift 1</option>
                            <option value="Shift 2">Shift 2</option>
                            <option value="Shift 3">Shift 3</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3" id="bagian" style="display: block">
                    <label for="bagian-select" class="form-label">Bagian</label>
                    <select class="form-control" name="bagian" id="bagian-select" onchange="nameLaporan()">
                        <option value="Shift">Shift</option>
                        <option value="Non Shift">Non Shift</option>
                        <option value="Utility">Utility</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="laporan" id="label-laporan" class="form-label">Laporan</label>
                    <textarea class="form-control" id="laporan" name="laporan" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="laporan" id="label-area" class="form-label">Area</label>
                    <textarea class="form-control" id="area" name="area" rows="3"></textarea>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6 pe-0">
                        <label for="job-by" id="label-laporan" class="form-label">Job By</label>
                        <select class="form-control" name="job_by" id="job-by">
                            <option value="Shift Activity">Shift Activity</option>
                            <option value="Work Order">Work Order</option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-6 pe-0">
                        <label for="job-by" id="label-laporan" class="form-label">Gambar</label>
                        <div class="custom-file">
                            <input type="file" name="gambar" class="custom-file-input" id="inputFile"
                                oninput="showNamaFile()">
                            <label class="custom-file-label" id="labelNamaFile" for="inputFile">Pilih Gambar</label>
                        </div>
                    </div>
                </div>
                <div class="mb-3" id="remark">
                    <label for="remark-select" class="form-label">Remark</label>
                    <select class="form-control" name="remark" id="remark-select" onchange="showPending()">
                        <option value="Done">Done</option>
                        <option value="Pending">Pending</option>
                    </select>
                </div>
                <div class="mb-3" id="div-pending" style="display: none">
                    <label for="pending" id="label-pending" class="form-label">Penyebab Pending</label>
                    <textarea class="form-control" id="pending" name="pending" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="laporan" id="label-sparepart" class="form-label">Sparepart</label>
                    <textarea class="form-control" id="sparepart" name="sparepart" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>
    </div>
@endsection

<script>
    function check() {
        const shiftSelect = document.getElementById("shift-select")
        const inputLaporan = document.getElementById("laporan")
        const bagianSelect = document.getElementById("bagian-select")
        shiftSelect.value = "Shift 1"
        // inputLaporan.name = "laporan"
        bagianSelect.value = "Shift"
        // inputLaporan.value = ""

    }

    function BagianCollapse() {
        const shiftSelect = document.getElementById("shift-select")
        const divBagian = document.getElementById("bagian")
        const inputLaporan = document.getElementById("laporan")
        const bagianSelect = document.getElementById("bagian-select")
        const labelLaporan = document.getElementById("label-laporan")
        if (shiftSelect.value != "Shift 1") {
            divBagian.style.display = "none"
            labelLaporan.innerHTML = "Laporan"
            inputLaporan.value = ""
        } else {
            bagianSelect.value = "Shift"
            divBagian.style.display = "block"
        }
    }

    function nameLaporan() {
        const bagianSelect = document.getElementById("bagian-select")
        const labelLaporan = document.getElementById("label-laporan")
        const inputLaporan = document.getElementById("laporan")
        if (bagianSelect.value == "Non Shift") {
            labelLaporan.innerHTML = "Laporan Non Shift"
            inputLaporan.value = "";
        }
        if (bagianSelect.value == "Shift") {
            labelLaporan.innerHTML = "Laporan"
            inputLaporan.value = "";
        }
        if (bagianSelect.value == "Utility") {
            labelLaporan.innerHTML = "Laporan Utility"
            inputLaporan.value = "";
        }
    }

    function showNamaFile() {
        const labelNamaFile = document.getElementById("labelNamaFile");
        const fileInput = document.getElementById("inputFile");
        if (fileInput.files.length > 0) {
            const fileName = fileInput.files[0].name;
            labelNamaFile.innerHTML = fileName;
        } else {
            labelNamaFile.innerHTML = "Pilih Gambar";
        }
    }

    function showPending(param) {
        const remarkSelect = document.getElementById("remark-select")
        const divPending = document.getElementById("div-pending")
        const inputPending = document.getElementById("pending")
        if (remarkSelect.value == "Done") {
            divPending.style.display = "none"
            inputPending.value = ""
        } else {
            divPending.style.display = "block"
        }
    }
</script>
