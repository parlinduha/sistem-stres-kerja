@extends('layouts.welcome')

@section('content')
    <form method='post' enctype='multipart/form-data' id='gform_1' action="{{ route('diagnosis.store') }}" novalidate>
        @csrf
        <div class='gform_body gform-body '>
            <div id='gform_page_1_1' class='gform_page'>
                <div class='gform_page_fields'>
                    <ul id='gform_fields_1' class='gform_fields top_label form_sublabel_below description_above'>
                        <li id="field_1_4"
                            class="gfield gfield_html gfield_html_formatted gfield_no_follows_desc field_sublabel_below field_description_above gfield_visibility_visible"
                            data-js-reload="field_1_4">
                            <span class="mb-5">Pilih Jawaban yang relevan dengan yang anda alami</span>
                            <p><strong>Dalam 2 minggu terakhir</strong>, seberapa sering
                                masalah-masalah berikut ini mengganggu kamu?</p>
                            <p>Tidak semua field harus diisi, jadi pastikan untuk memberikan jawaban
                                yang tepat sesuai dengan pengalamanmu.</p>
                        </li>

                        @foreach ($indications as $item)
                            <li id="field_{{ $loop->iteration }}"
                                class="gfield question gfield_contains_required field_sublabel_below field_description_above gfield_visibility_visible"
                                data-js-reload="field_{{ $loop->iteration }}">
                                <label class='gfield_label'>{{ $loop->iteration }}. Apakah anda
                                    merasa {{ $item->name_indication }}?<span class="gfield_required"><span
                                            class="gfield_required gfield_required_asterisk">*</span></span></label>
                                <div class='ginput_container ginput_container_radio'>
                                    <ul class='gfield_radio' id='input_{{ $loop->iteration }}'>
                                        @foreach ($conditionUsers as $condition)
                                            <li style='font-size: 14px;'
                                                class='gchoice gchoice_{{ $loop->parent->iteration }}_{{ $loop->iteration }}'>
                                                <input name='input_{{ $loop->parent->iteration }}' type='radio'
                                                    value='{{ $condition->value }}'
                                                    id='choice_{{ $loop->parent->iteration }}_{{ $loop->iteration }}'
                                                    onchange="document.getElementById('condition_{{ $item->code_indication }}{{ $loop->parent->iteration }}').value = this.value" />
                                                <label for='choice_{{ $loop->parent->iteration }}_{{ $loop->iteration }}'
                                                    id='label_{{ $loop->parent->iteration }}_{{ $loop->iteration }}'>{{ $condition->condition }}</label>
                                            </li>
                                        @endforeach
                                        <input type="hidden" name="condition[{{ $item->code_indication }}]"
                                            id="condition_{{ $item->code_indication }}{{ $loop->iteration }}"
                                            value="" />
                                    </ul>
                                </div>
                            </li>
                        @endforeach
                        <div class='gform_page_footer top_label'>
                            <button type="submit" class='gform_next_button button'>Submit</button>
                            <a href="{{ route('assessment') }}" class='gform_cancel_button button bg-danger'>Batal</a>
                        </div>

                    </ul>
                </div>
            </div>
        </div>
    </form>
    <style>
        /* Style untuk judul */
        .mb-5 {
            font-size: 20px;
            font-weight: bold;
            color: #333;
        }

        /* Style untuk garis pemisah */
        hr {
            border-top: 1px solid #ccc;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        /* Style untuk langkah-langkah progres */
        .screen-progress-bar {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        .screen-progress-bar li {
            float: left;
            width: 33.33%;
            text-align: center;
            font-size: 14px;
            color: #888;
        }

        .screen-progress-bar li span {
            display: block;
        }

        .step-1 span,
        .step-2 span,
        .step-3 span {
            font-weight: bold;
        }

        .step-1,
        .step-2,
        .step-3 {
            position: relative;
        }

        .step-1::after,
        .step-2::after {
            content: '';
            position: absolute;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            height: 2px;
            background-color: #ccc;
        }

        .step-1::after {
            background-color: #4caf50;
            /* Warna garis progres yang telah diselesaikan */
        }

        .step-2::after {
            background-color: #ccc;
            /* Warna garis progres yang sedang dikerjakan */
        }

        /* Style untuk kotak pertanyaan */
        .gfield_label {
            font-weight: bold;
            font-size: 16px;
            color: #333;
            margin-bottom: 10px;
            display: block;
        }

        .gfield_radio label {
            font-size: 14px;
            color: #555;
        }

        /* Style untuk tombol */
        .gform_next_button,
        .gform_cancel_button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 14px;
            text-align: center;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            background-color: #4caf50;
            /* Warna latar belakang tombol Submit */
            color: #fff;
            transition: background-color 0.3s;
        }

        .gform_next_button:hover,
        .gform_cancel_button:hover {
            background-color: #45a049;
            /* Warna latar belakang tombol Submit saat dihover */
        }
    </style>
@endsection
