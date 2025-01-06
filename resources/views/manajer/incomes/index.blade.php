@extends('manajer.layouts.main')

@section('container')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Riwayat Penghasilan</h4>
                    <a href="" class="btn btn-primary">Tambah Penghasilan</a>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Tab Navigation -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#daily">Penghasilan Harian</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#monthly">Penghasilan Bulanan</a>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content mt-3">
                        <!-- Daily Income Tab -->
                        <div id="daily" class="tab-pane active">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Jumlah</th>
                                            <th>Keterangan</th>
                                            <th>Dibuat Oleh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dailyIncomes as $income)
                                        <tr>
                                            <td>{{ $income->income_date->format('d/m/Y') }}</td>
                                            <td>Rp {{ number_format($income->amount, 0, ',', '.') }}</td>
                                            <td>{{ $income->description }}</td>
                                            <td>{{ $income->user->nama }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $dailyIncomes->links() }}
                            </div>
                        </div>

                        <!-- Monthly Income Tab -->
                        <div id="monthly" class="tab-pane fade">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Periode</th>
                                            <th>Total Penghasilan</th>
                                            <th>Dibuat Oleh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($monthlyIncomes as $income)
                                        <tr>
                                            <td>{{ Carbon\Carbon::create()->month($income->month)->format('F') }} {{ $income->year }}</td>
                                            <td>Rp {{ number_format($income->total_amount, 0, ',', '.') }}</td>
                                            <td>{{ $income->user->nama }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $monthlyIncomes->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
