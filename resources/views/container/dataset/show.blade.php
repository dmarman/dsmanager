@extends('layouts.app')

@section('content')
    <section class="hero is-warning">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    {{ ucfirst($dataset->type) }} Dataset v{{ $dataset->version }}
                </h1>
                <h2 class="subtitle">
                    <span>{{ $dataset->container->car->name }}</span>
                    <span>{{ $dataset->container->body->name }}</span>
                    <span>{{ $dataset->container->hand->name }} Hand</span> /
                    <span>{{ $dataset->container->radio->name }} MIB{{ $dataset->container->radio->mib }}</span>
                    <span>{{ $dataset->container->soundsystem->name }}</span> /
                    <span>{{ $dataset->container->amplifier->communication }} {{ $dataset->container->amplifier->channels }} Amplifier</span>
                </h2>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <h3 class="title">Files</h3>

            <div class="columns">
                @if($dataset->files->count() > 0)
                    @foreach($dataset->files as $file)
                        <div class="column has-text-centered">
                            <p>{{ $file->client_name }}</p>
                            <br>
                            <a class="button is-primary">Download {{ strtoupper($file->type) }}</a>
                        </div>
                    @endforeach
                @else
                    <a class="button is-primary">Add files</a>
                @endif
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            @if($dataset->channels->count() > 0)
            <h3 class="title">Filters</h3>
            <table class="table is-striped">
                <thead>
                    <tr>
                        <th></th>
                        @for($i = 1; $i < 7; $i++)
                            <th>Filter {{ $i }}</th>
                        @endfor
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataset->channels as $channel)
                        <tr>
                            <th>
                                Channel {{ $channel->channel }}
                            </th>
                            @foreach($channel->filters as $filter)
                                <td>
                                    <p>{{ $filter->type }}</p>
                                    <p><small>{{ $filter->frequency }}Hz / {{ $filter->gain }}dB / Q: {{ $filter->q }}</small></p>
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </section>

    <section class="section">
        <div class="container">
                <div class="block">
                    <h3 class="title">Tests</h3><a class="button is-primary">Add test case</a>
                </div>
            <div class="columns">
                <div class="column is-half">
                    @foreach($dataset->tests as $test)
                        <h4 class="subtitle">{{ ucfirst($test->type) }}</h4>
                        <div class="box">

                            <div class="{{ $test->type }}-tests">
                                @foreach($test->checks as $check)
                                    <article class="media">
                                        <div class="media-left">
                                            <figure class="image is-64x64">
                                                <img src="http://bulma.io/images/placeholders/128x128.png" alt="Image">
                                            </figure>
                                        </div>
                                        <div class="media-content">
                                            <div class="content">
                                                <p>
                                                    <strong>{{ ucfirst($check->user['name']) }}</strong><small> 31m</small>
                                                    <br>
                                                    {{ $check->comment }}
                                                </p>
                                            </div>
                                        </div>
                                    </article>
                                @endforeach
                            </div>

                            <hr>

                            <article class="media">
                                <div class="media-left">
                                    <figure class="image is-64x64">
                                        <img src="http://bulma.io/images/placeholders/128x128.png" alt="Image">
                                    </figure>
                                </div>

                                <div class="media-content">
                                    <div class="content">
                                        <p class="control">
                                            <strong>{{ ucfirst(Auth::user()->name) }}</strong><small> 31m</small>
                                            <br>
                                        <p class="control">
                                            <textarea name="comment" class="textarea" id="test-{{ $test->id }}" placeholder="New comment"></textarea>
                                        </p>
                                        <a class="button is-primary" onclick="submit('{{ $test->id }}')">Submit</a>
                                        </p>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <script>
        function submit(id){
            axios.post('./../checks', {
                test: id,
                comment: $('#test-' + id + '').val()
            })
            .then(function(response){
                $('.' + response.data.test.type + '-tests').append(
                    '<article class="media">' +
                        '<div class="media-left">' +
                            '<figure class="image is-64x64">' +
                                '<img src="http://bulma.io/images/placeholders/128x128.png" alt="Image">' +
                            '</figure>' +
                        '</div>' +
                        '<div class="media-content">' +
                            '<div class="content">' +
                                '<p><strong>' + response.data.user.name + '</strong><br>' + response.data.comment + '</p>' +
                            '</div>' +
                        '</div>' +
                    '</article>'
                );
            });
        }
    </script>
@endsection