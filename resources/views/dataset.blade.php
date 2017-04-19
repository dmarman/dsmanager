@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <ul>
                <li>Dataset v{{ $dataset->version }}</li>

                <li>Files
                    <ul>
                        @foreach($dataset->files as $file)
                            <li>{{ $file->client_name }} - <small>Uploaded by {{ $file->user->name }}</small></li>
                        @endforeach
                    </ul>
                </li>

                <li>Filters
                    <ul>
                        @foreach($dataset->channels as $channel)
                        <li>Channel {{ $channel->channel }}
                            <ul>
                                @foreach($channel->filters as $filter)
                                    <li>{{ $filter->type }}
                                        <ul>
                                            <li>{{ $filter->frequency }}Hz / {{ $filter->gain }}dB / Q: {{ $filter->q }}</li>
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </li>

                <li>Tests
                    <ul>
                        @foreach($dataset->tests as $test)
                        <li>{{ $test->type }}
                            <ul>
                            @foreach($test->checks as $check)
                                <li>{{ $check->result }} / {{ $check->comment }} / <small>Tested by {{ $check->user['name'] }}</small></li>
                            @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </li>

            </ul>
        </div>
    </div>
    <script>

    </script>
@endsection