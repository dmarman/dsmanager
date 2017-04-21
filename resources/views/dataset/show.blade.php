@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <h2 class="text-capitalize">{{ $dataset->type }} Dataset v{{ $dataset->version }}</h2>
            <p>{{ $dataset->container->description->car }}</p>
            <h3>Files</h3>
            <ul>
                @foreach($dataset->files as $file)
                    <p>{{ $file->client_name }} - <button class="btn btn-default">Download</button></p>
                    {{--<small>Uploaded by {{ $file->user->name }}</small>--}}
                @endforeach
            </ul>

            @if($dataset->channels->count() > 0)
            <h3>Filters</h3>
            <table class="table">
                <thead>
                    <tr>
                    @foreach($dataset->channels as $channel)
                        <th>Channel {{ $channel->channel }}</th>
                    @endforeach
                    </tr>
                </thead>

                <tbody>
                    @foreach($channel->filters as $filter)
                        <tr>
                            @foreach($dataset->channels as $channel)
                            <td>


                                <p>{{ $filter->type }}</p>
                                <p>{{ $filter->frequency }}Hz / {{ $filter->gain }}dB / Q: {{ $filter->q }}</p>
                            </td>
                            @endforeach

                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif

            <h3>Tests</h3>
            @foreach($dataset->tests as $test)
            <h4 class="text-capitalize">{{ $test->type }}</h4>
                <ul>
                @foreach($test->checks as $check)
                    <li>{{ $check->result }} / {{ $check->comment }} / <small>Tested by {{ $check->user['name'] }}</small></li>
                @endforeach
                </ul>

            @endforeach

        </div>
    </div>
    <script>

    </script>
@endsection