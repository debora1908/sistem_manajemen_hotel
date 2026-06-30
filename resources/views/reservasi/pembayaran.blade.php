@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="card shadow-lg border-0">

        <div class="card-header bg-primary text-white text-center py-4">

            <h2 class="mb-1">🏨 Five Star Horizon Hotel</h2>

            <p class="mb-0">Kuitansi Pembayaran Reservasi Hotel</p>

        </div>

        <div class="card-body">

            <div class="row">

                <!-- Data Tamu -->
                <div class="col-md-6">

                    <h4 class="mb-3 text-primary">
                        Data Tamu
                    </h4>

                    <table class="table table-borderless">

                        <tr>
                            <th width="40%">Nama</th>
                            <td>{{ $reservasi->nama_tamu }}</td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td>{{ $reservasi->email_tamu }}</td>
                        </tr>

                        <tr>
                            <th>Nomor Kamar</th>
                            <td>{{ $reservasi->nomor_kamar }}</td>
                        </tr>

                        <tr>
                            <th>Tipe Kamar</th>
                            <td>{{ $reservasi->tipe_kamar }}</td>
                        </tr>

                    </table>

                </div>

                <!-- Detail Reservasi -->
                <div class="col-md-6">

                    <h4 class="mb-3 text-primary">
                        Detail Reservasi
                    </h4>

                    <table class="table table-borderless">

                        <tr>
                            <th width="40%">Check In</th>
                            <td>{{ $reservasi->tanggal_checkin }}</td>
                        </tr>

                        <tr>
                            <th>Check Out</th>
                            <td>{{ $reservasi->tanggal_checkout }}</td>
                        </tr>

                        <tr>
                            <th>Lama Menginap</th>
                            <td>{{ $lamaMenginap }} Malam</td>
                        </tr>

                        <tr>
                            <th>Harga / Malam</th>
                            <td>
                                Rp {{ number_format($reservasi->harga_per_malam,0,',','.') }}
                            </td>
                        </tr>

                    </table>

                </div>

            </div>

            <hr>

            <!-- Kode Pembayaran -->
            <div class="alert alert-warning text-center">

                <h5>KODE PEMBAYARAN</h5>

                <h2 class="fw-bold text-danger">

                    {{ $kodePembayaran }}

                </h2>

                <small>
                    Simpan kode pembayaran ini sebagai bukti reservasi.
                </small>

            </div>

            <!-- Total -->
            <table class="table table-bordered">

                <tr>

                    <th width="35%">Metode Pembayaran</th>

                    <td>{{ ucfirst($reservasi->metode_pembayaran) }}</td>

                </tr>

                <tr>

                    <th>Status</th>

                    <td>

                        @if($reservasi->status=="Belum Dibayar")

                            <span class="badge bg-warning text-dark">

                                {{ $reservasi->status }}

                            </span>

                        @else

                            <span class="badge bg-success">

                                {{ $reservasi->status }}

                            </span>

                        @endif

                    </td>

                </tr>

                <tr>

                    <th>Total Pembayaran</th>

                    <td>

                        <h3 class="text-success mb-0">

                            Rp {{ number_format($totalBayar,0,',','.') }}

                        </h3>

                    </td>

                </tr>

            </table>

            @if($reservasi->metode_pembayaran=="transfer")

                <div class="alert alert-info">

                    <h4>Transfer Bank</h4>

                    <hr>

                    <p>

                        <strong>Bank :</strong> BRI

                    </p>

                    <p>

                        <strong>No Rekening :</strong>

                        1234-5678-9012

                    </p>

                    <p>

                        <strong>Atas Nama :</strong>

                        Five Star Horizon Hotel

                    </p>

                    <p>

                        Setelah melakukan transfer silakan simpan bukti pembayaran.

                    </p>

                </div>

            @else

                <div class="alert alert-success">

                    <h4>Pembayaran Cash</h4>

                    <hr>

                    <p>

                        Pembayaran dilakukan saat proses Check In di hotel.

                    </p>

                    <p>

                        Mohon datang 15 menit sebelum waktu Check In.

                    </p>

                </div>

            @endif

            <div class="d-flex justify-content-center gap-3 mt-4">

                <button onclick="window.print()"
                        class="btn btn-primary">

                    🖨 Cetak Kuitansi

                </button>

                <a href="{{ route('reservasi.index') }}"
                   class="btn btn-secondary">

                    ← Kembali

                </a>

            </div>

        </div>

        <div class="card-footer text-center text-muted">

            Terima kasih telah melakukan reservasi di
            <strong>Five Star Horizon Hotel</strong>.

        </div>

    </div>

</div>

@endsection