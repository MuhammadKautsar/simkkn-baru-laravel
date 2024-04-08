<x-app-layout>

    <main class="main-content max-height-vh-100 h-100">
        <div class="pt-5 pb-6 bg-cover" style="background-image: url('../assets/img/header-blue-purple.jpg')"></div>
        <div class="container my-3 py-3">
            <div class="row mt-n6 mb-6">
                <div class="col-lg-12 col-sm-6">
                    <div class="card blur border border-white mb-4 shadow-xs">
                        <div class="card-body p-4">
                            <p class="text-sm mb-1">Sekarang anda memiliki ... SKS</p>
                            <p class="text-sm mb-1">Anda belum mendaftar kegiatan KKN. Silahkan mendaftar kegiatan KKN yang sedang dibuka dibawah ini.</p>
                            <!-- <h3 class="mb-0 font-weight-bold">$8,093.00</h3> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card shadow-xs border">
                        <div class="card-header border-bottom pb-0">
                            <div class="d-sm-flex align-items-center mb-3">
                                <div>
                                    <!-- <h6 class="font-weight-semibold text-lg mb-0">Daftar Kegiatan KKN Universitas Syiah Kuala</h6> -->
                                    <!-- <p class="text-sm mb-sm-0 mb-2">These are details about the last transactions</p> -->
                                </div>
                                <!-- <div class="ms-auto d-flex">
                                    <button type="button" class="btn btn-sm btn-white mb-0 me-2">
                                        View report
                                    </button>
                                    <button type="button"
                                        class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0">
                                        <span class="btn-inner--icon">
                                            <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" class="d-block me-2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                            </svg>
                                        </span>
                                        <span class="btn-inner--text">Download</span>
                                    </button>
                                </div> -->
                            </div>
                            <div class="pb-3 d-sm-flex align-items-center">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <h6 class="font-weight-semibold text-lg mb-0">Daftar Kegiatan KKN Universitas Syiah Kuala</h6>
                                    <!-- <a href="{{ route('kkn.create') }}" class="btn btn-primary px-3 mb-0">Tambah Kegiatan KKN Baru</a> -->
                                    <!-- <input type="radio" class="btn-check" name="btnradiotable" id="btnradiotable1"
                                        autocomplete="off" checked>
                                    <label class="btn btn-white px-3 mb-0" for="btnradiotable1">All</label>
                                    <input type="radio" class="btn-check" name="btnradiotable" id="btnradiotable2"
                                        autocomplete="off">
                                    <label class="btn btn-white px-3 mb-0" for="btnradiotable2">Monitored</label>
                                    <input type="radio" class="btn-check" name="btnradiotable" id="btnradiotable3"
                                        autocomplete="off">
                                    <label class="btn btn-white px-3 mb-0" for="btnradiotable3">Unmonitored</label> -->
                                </div>
                                <!-- <div class="input-group w-sm-25 ms-auto">
                                    <span class="input-group-text text-body">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z">
                                            </path>
                                        </svg>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Search">
                                </div> -->
                            </div>
                        </div>
                        <div class="card-body px-0 py-0">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center justify-content-center mb-0">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7">Nama KKN</th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Masa Kegiatan</th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Jenis KKN</th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Masa Pendaftaran</th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Tahun Ajaran</th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Semester</th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Kode KKN</th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Minimal SKS</th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Kuota Peserta</th>
                                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kkns as $kkn)
                                        <tr>
                                            <td class="mb-0 text-sm">{{ $kkn->nama_kkn }}</td>
                                            <td class="mb-0 text-sm">{{ $kkn->masa_kegiatan }}</td>
                                            <td class="mb-0 text-sm">{{ $kkn->jenis_kkn }}</td>
                                            <td class="mb-0 text-sm">{{ $kkn->masa_pendaftaran }}</td>
                                            <td class="mb-0 text-sm">{{ $kkn->tahun_ajaran }}</td>
                                            <td class="mb-0 text-sm">{{ $kkn->semester }}</td>
                                            <td class="mb-0 text-sm">{{ $kkn->kode_kkn }}</td>
                                            <td class="mb-0 text-sm">{{ $kkn->minimal_sks }}</td>
                                            <td class="mb-0 text-sm">{{ $kkn->kuota_peserta }}</td>
                                            <td class="align-middle">
                                                <a href="{{ route('daftar') }}" class="btn btn-primary px-3 mb-0">Daftar</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <x-app.footer />
        </div>
    </main>

</x-app-layout>
