@extends('layouts.app')

@section('content')

    <section class="section">
        <div class="container">
            <h2 class="title">{{ $dataset['signalFlow']['name'] }}</h2>

            @if(count($dataset['EQ1']['channels']) > 0)
                <h3 class="title">Filters</h3>
                <table class="table is-striped">
                    <thead>
                    <tr>
                        <th></th>
                        @foreach($dataset['EQ1']['channels'][0]['filters'] as $key => $filter)
                            <th>Filter {{ $key + 1 }}</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dataset['EQ1']['channels'] as $key => $channel)
                        <tr>
                            <th>
                                <p>Channel {{ $key + 1 }}</p>
                                <p><small>{{ $channel['gain'] }}dB {{ $channel['delay'] }}ms</small></p>
                            </th>
                            @foreach((array) $channel['filters'] as $filter)
                                <td>
                                    <p>{{ $filter['type'] }}</p>
                                    <p><small>{{ $filter['frequency']}}Hz / {{ $filter['gain'] }}dB / Q: {{ $filter['quality'] }}</small></p>
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </section>

@endsection