@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Dataset v{{ $dataset->version }}</h2>
            <h2>Files</h2>
            <h2>Filters</h2>
                @foreach($dataset->channels as $channel)
                    <h3>Channel {{ $channel->channel }}</h3>
                @endforeach
            <h2>Tests</h2>
        </div>
    </div>
    <script>

    </script>
@endsection