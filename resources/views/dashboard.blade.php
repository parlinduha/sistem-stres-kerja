<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'pdfHtml5'
            ]
        });
    });
</script>
<style>
    .dt-button.buttons-pdf {
        background-color: #3c74cf !important;
        color: white !important;
        padding-left: 25px;
        padding-right: 25px;
        padding-top: 7px;
        padding-bottom: 7px;
        border-radius: 50px;
    }

    /* Add hover effect */
    .dt-button.buttons-pdf:hover {
        background-color: #3664b2 !important;
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
            <div class="bg-white overflow-hidden mt-2 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($diagnoses->isNotEmpty())
                        <table id="myTable" class="table table-bordered table-striped">
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
