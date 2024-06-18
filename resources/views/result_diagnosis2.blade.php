@extends('layouts.welcome')
@section('content')
    <div class="container mt-5">
        <h2>Hasil Diagnosis</h2>

        @if ($diagnosedSickness)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Gejala yang dipilih</th>
                    </tr>
                </thead>
                <tbody>

                    @php
                        $indications = [];
                        foreach ($selectedIndications as $item) {
                            $indication = \Illuminate\Support\Facades\DB::table('indications')
                                ->where('code_indication', $item)
                                ->first();
                            if ($indication) {
                                $indications[] = $indication;
                            }
                        }
                        // dd($indications);
                    @endphp

                    @foreach ($indications as $item)
                        <tr>
                            <td>
                                {{ $item->code_indication }}
                            </td>
                            <td>
                                {{ $item->name_indication }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="alert alert-success">
                <h4 class="alert-heading">{{ $diagnosedSickness->name_sickness }}</h4>
                <p class="mb-0">Tingkat Keyakinan: {{ number_format($maxCertainty * 100, 2) }}%</p>
                <hr>
                <p><b>Solusi : </b></p>
                <p>{{ $diagnosedSickness->description }}</p>
            </div>
        @else
            <div class="alert alert-warning">
                <h4 class="alert-heading">Tidak ada diagnosis</h4>
                <p>Tidak ada penyakit yang cocok dengan indikasi yang dipilih.</p>
            </div>
        @endif

        <a href="{{ route('expert.index') }}" class="btn btn-primary mt-3 ">Kembali</a>

    </div>
@endsection
