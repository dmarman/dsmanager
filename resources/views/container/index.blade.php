@extends('layouts.app')

@section('content')

    <section class="section">
        <div class="container">
        <form class="dataset-form" action="{{ url('/search') }}" method="GET">
            <div class="field is-grouped">
                <p class="control is-expanded">
                    <input class="input" type="text" name="q" placeholder="Find a repository">
                </p>
                <p class="control">
                    <button class="button is-info">Search</button>
                </p>
            </div>
        </form>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Car</th>
                        <th>Radio</th>
                        <th>SoundSystem</th>
                        <th>Hand</th>
                        <th>SOP</th>
                        <th>Audio</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#ID</th>
                        <th>Car</th>
                        <th>Radio</th>
                        <th>SoundSystem</th>
                        <th>Hand</th>
                        <th>SOP</th>
                        <th>Audio</th>
                        <th>Phone</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($containers as $container)
                        <tr>
                            <th><a href="{{ url('/containers/' . $container->id) }}">{{ $container->id }}</a></th>
                            <td>{{ $container->car->name }}</td>
                            <td>{{ $container->radio->name }}</td>
                            <td>{{ $container->soundsystem->name }}</td>
                            <td>{{ $container->hand->name }}</td>
                            <td>{{ $container->car->week }}/{{ $container->car->year }}</td>                            
                            <td>
                                @if($container->datasets->count() > 0 )
                                    @foreach($container->datasets as $dataset)
                                        @if($dataset->type == "sound")
                                            <a href="{{ url('/datasets/' . $dataset->id) }}">v{{ $dataset->version }}</a>
                                        @endif
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if($container->datasets->count() > 0 )
                                    @foreach($container->datasets as $dataset)
                                        @if($dataset->type == "phone")
                                            <a href="{{ url('/datasets/' . $dataset->id) }}">v{{ $dataset->version }}</a>
                                        @endif
                                    @endforeach
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
