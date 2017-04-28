@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <h2 class="text-capitalize">{{ $dataset->type }} Dataset v{{ $dataset->version }}   <span class="label label-danger">SOP</span></h2>
            <span>{{ $dataset->container->car->name }}</span>
            <span>{{ $dataset->container->body->name }}</span>
            <span>{{ $dataset->container->hand->name }} Hand</span> /
            <span>{{ $dataset->container->radio->name }} MIB{{ $dataset->container->radio->mib }}</span>
            <span>{{ $dataset->container->soundsystem->name }}</span> /
            <span>{{ $dataset->container->amplifier->communication }} {{ $dataset->container->amplifier->channels }} Amplifier</span>
            <h3>Files</h3>
            <ul>
                @foreach($dataset->files as $file)
                    <p>{{ $file->client_name }} - <button class="btn btn-default">Download</button></p>
                    {{--<small>Uploaded by {{ $file->user->name }}</small>--}}
                @endforeach
            </ul>

            @if($dataset->channels->count() > 0)
            <h3>Filters</h3>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th></th>
                        @for($i = 1; $i < 7; $i++)
                            <th class="text-center">Filter {{ $i }}</th>
                        @endfor
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataset->channels as $channel)
                        <tr>
                            <td>
                                <p><strong>Channel {{ $channel->channel }}</strong></p>
                            </td>
                            @foreach($channel->filters as $filter)
                            <td class="text-center">
                                <p>{{ $filter->type }}</p>
                                <p><small>{{ $filter->frequency }}Hz / {{ $filter->gain }}dB / Q: {{ $filter->q }}</small></p>
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