@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <h2 class="text-capitalize">{{ $dataset->type }} Dataset v{{ $dataset->version }}   <span class="label label-danger">SOP</span></h2>
            <span>{{ $dataset->container->description->car->name }}</span>
            <span>{{ $dataset->container->description->body->name }}</span>
            <span>{{ $dataset->container->description->hand->name }} Hand</span> /
            <span>{{ $dataset->container->description->radio->name }} MIB{{ $dataset->container->description->radio->mib }}</span>
            <span>{{ $dataset->container->description->soundsystem->name }}</span> /
            <span>{{ $dataset->container->description->amplifier->communication }} {{ $dataset->container->description->amplifier->channels }} Amplifier</span>
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