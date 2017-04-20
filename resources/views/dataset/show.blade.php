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
            </ul>
       
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


            <h3>Tests</h3>
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



        </div>
    </div>
    <script>

    </script>
@endsection