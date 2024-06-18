@extends('layouts.welcome')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2>{{ $education->title }}</h2>
            @php
                $imagePath = asset($education->image);
                if (!file_exists(public_path($education->image))) {
                    $imagePath = asset('storage/' . $education->image);
                }
            @endphp
            <img src="{{ $imagePath }}" width="600" alt="">
            {{-- <p>
                {{ $education->description }}
            </p> --}}
                    <p id="detailModalDescription"><?php echo html_entity_decode($education->description); ?></p>
            <p>
                <strong>Author:</strong> {{ $education->author }}
            </p>
            <p>
                <strong>Published at:</strong> {{ $education->created_at->format('d M Y') }}
            </p>
        </div>
    </div>
@endsection
