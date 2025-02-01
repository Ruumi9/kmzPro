@extends('core.template')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Submit Laporan</h6>
        </div>
        <div class="card-body">
            <form action="{{ url('/laporan') }}" method="POST">
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
                        <select class="form-control" name="shift" onchange="collapse()" id="shift-select">
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
                    <label for="job-by" id="label-laporan" class="form-label">Job By</label>
                    <select class="form-control" name="job_by" id="job-by">
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>
    </div>
@endsection

<script>
    function collapse() {
        const shiftSelect = document.getElementById("shift-select")
        const divBagian = document.getElementById("bagian")
        const inputLaporan = document.getElementById("laporan")
        const bagianSelect = document.getElementById("bagian-select")
        const labelLaporan = document.getElementById("label-laporan")
        if (shiftSelect.value != "Shift 1") {
            divBagian.style.display = "none"
            inputLaporan.name = "laporan"
            labelLaporan.innerHTML = "Laporan"
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
            inputLaporan.name = "non_shift"
        }
        if (bagianSelect.value == "Shift") {
            labelLaporan.innerHTML = "Laporan Shift"
            inputLaporan.name = "laporan"
        }
        if (bagianSelect.value == "Utility") {
            labelLaporan.innerHTML = "Laporan Utility"
            inputLaporan.name = "utility"
        }
    }
</script>
