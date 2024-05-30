@extends('layouts.welcome')
@section('content')
    <h2>Result Diagnosis</h2>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Diagnosa ID</th>
                <th scope="col">Tingkat Depresi</th>
                <th scope="col">Persentase</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>{{ $diagnosa->diagnosis_id }}</td>
                <td> {{ $diagnosa_dipilih['code_sickness']->code_sickness }} |
                    {{ $diagnosa_dipilih['code_sickness']->name_sickness }}</td>
                <td>{{ $diagnosa_dipilih['value'] * 100 }} %</td>
            </tr>
        </tbody>
    </table>
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="d-flex ">
                {{-- Pakar --}}
                <table class="table table-hover mt-lg-5 border border-primary p-3 mx-3">
                    <thead>
                        <tr>
                            <th scope="col">Pakar</th>
                        </tr>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Gejala</th>
                            <th scope="col">Nilai (MB - MD)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($expert as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ $item->code_indication }} | {{ $item->code_sickness }}
                                </td>
                                <td>{{ $item->mb - $item->md }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- User --}}
                <table class="table table-hover mt-lg-5 border border-danger p-3 mx-3">
                    <thead>
                        <tr>
                            <th scope="col">User</th>
                        </tr>
                        <tr>
                            <th scope="col">Gejala</th>
                            <th scope="col">Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($indication_by_user as $key)
                            <tr>
                                <td>{{ $key[0] }}</td>
                                <td>{{ $key[1] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Tabel Cf Gabungan --}}
                {{-- CF Gabungan --}}
                <table class="table table-hover mt-lg-5 border border-info p-3 mx-3">
                    <thead>
                        <tr>
                            <th scope="col">Hasil</th>
                        </tr>
                        <tr>
                            <th scope="col">Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cf_Combination['cf'] as $key)
                            <tr>
                                <td>{{ $key }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
