<style>
    /* CSS untuk styling tabel */
    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        border: 1px solid #dee2e6;
        padding: 8px;
    }

    .table th {
        background-color: #6c757d;
        color: #fff;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('History') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            <div class="bg-white overflow-hidden mt-2 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($diagnoses->isNotEmpty())
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Diagnosis ID</th>
                                    <th scope="col">Hasil Diagnosis</th>
                                    <th scope="col">Condition</th>
                                    <th scope="col">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($diagnoses as $diagnosis)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $diagnosis->diagnosis_id }}</td>
                                        {{-- <td>
                                            @php
                                                $dataDiagnosis = json_decode($diagnosis->data_diagnosis, true);
                                            @endphp
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Value</th>
                                                        <th>Code Sickness</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($dataDiagnosis as $data)
                                                        <tr>
                                                            <td>{{ $data['value'] }}</td>
                                                            <td>{{ $data['code_sickness'] }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </td>
                                        <td>
                                            @php
                                                $conditions = json_decode($diagnosis->condition, true);
                                            @endphp
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Condition</th>
                                                        <th>Value</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($conditions as $condition)
                                                        <tr>
                                                            <td>{{ $condition[0] }}</td>
                                                            <td>{{ $condition[1] }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </td> --}}
                                        <td>{{ $diagnosis->result_value }} atau
                                            {{ round($diagnosis->result_value * 100, 2) }} %</td>
                                        <td> {{ $diagnosis->result_code_sickness }}
                                            {{ $diagnosis->result_name_sickness }} </td>
                                        <td>{{ \Carbon\Carbon::parse($diagnosis->created_at)->translatedFormat('d F Y') }}
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No diagnosis history available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
