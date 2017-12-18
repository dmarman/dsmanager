@extends('layouts.app')

@section('content')
    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column">
                        <h2 class="title">
                            {{ $container->car->name }} / {{ $container->hand->name }}
                        </h2>
                        <h3 class="subtitle">
                            {{ $container->radio->name }} {{ $container->soundsystem->name }}
                        </h3>
                        <span class="tag is-light">+{{ $container->car->tma }}</span>
                        <span class="tag is-light">+{{ $container->radio->pr }}</span>
                        <span class="tag is-light">+{{ $container->soundsystem->pr }}</span>
                        <span class="tag is-light">+{{ $container->hand->pr }}</span>                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>

    </section>
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <h5 class="title">Audio
                        <a class="button is-info" href="{{ url('/datasets/create?container=' . $container->id . '&type=sound') }}">
                            <span>New version</span>
                        </a>
                    </h5>
                    <hr>
                    @if($container->datasets->count() > 0 )
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Version</th>
                                    <th>Release</th>
                                    <th>Created</th>
                                    <th>Files</th>    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($container->datasets as $dataset)
                                    @if($dataset->type == "sound")
                                        <tr>
                                            <td><a href="{{ url('/datasets/' . $dataset->id) }}">v{{ $dataset->version }}</a></td>    
                                            <td>{{ $dataset->week_release }}/{{ $dataset->year_release }}</td>
                                            <td>{{ $dataset->created_at->format('jS \\of F Y') }}</td>
                                            <td>{{ $dataset->files->count() }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                    <br>
                    <br>
                    <br>
                </div>

                <div class="column">
                    <h5 class="title">Phone
                        <a class="button is-info" href="{{ url('/datasets/create?container=' . $container->id . '&type=phone') }}">
                            <span>New version</span>
                        </a>
                    </h5>
                    <hr>
                    @if($container->datasets->count() > 0 )
                        @foreach($container->datasets as $dataset)
                            @if($dataset->type == "phone")
                                <a href="{{ url('/datasets/' . $dataset->id) }}">v{{ $dataset->version }}</a>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
