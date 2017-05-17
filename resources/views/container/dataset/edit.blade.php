@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>

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
                    @if(isset($dataset->container->amplifier))
                        <span>{{ $dataset->container->amplifier->communication }} {{ $dataset->container->amplifier->channels }} Amplifier</span>
                    @endif
                </h2>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <h3 class="title">Files</h3>

            <form action="{{ url('/files/upload?dataset=' . $dataset->id) }}" class="dropzone" id="my-awesome-dropzone" style="padding: 150px 20px;">
                {{ csrf_field() }}
            </form>

            <br>

            <div class="columns file-container">
                @foreach($dataset->files as $file)
                    <div class="column has-text-centered file-{{ $file->id}}">
                        <p>{{ $file->client_name }}</p>
                        <br>
                        @if($file->type == "dsm")
                            <a class="button is-outlined" href="{{ url('/dsm/' . $file->id) }}">View</a>
                        @endif
                        <a class="button is-primary" href="{{ url('/files/' . $file->id . '/download') }}">Download {{ strtoupper($file->type) }}</a>
                        <a class="button is-outlined" onclick="deleteFile({{ $file->id }})">Delete</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @if($dataset->channels->count() > 0)
        <section class="section">
            <div class="container">
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
                                <p>Channel {{ $channel->channel }}</p>
                                <p><small>{{ $channel->gain }}dB {{ $channel->delay }}ms</small></p>
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
            </div>
        </section>
    @endif

    <section class="section">
        <div class="container">
            <div class="block">
                <h3 class="title">Tests</h3>
            </div>
            <div class="columns">
                <div class="column is-half">
                    @foreach($dataset->tests as $test)
                        <h4 class="subtitle">{{ ucfirst($test->type) }}</h4>
                        <div class="box">

                            <div class="{{ $test->type }}-tests">
                                @if($test->checks->count() == 0)
                                    <p>No comments yet checks</p>
                                @endif
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

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <script>
        Dropzone.options.myAwesomeDropzone = {
            maxFilesize: 50, // MB
            parallelUploads: 1,
            addRemoveLinks: true,

            init: function() {
                //
            },
            success: function(file, response, action) {
                if(response.status == 'ok'){
                    console.log(response);
                    $('.file-container').append(
                        '<div class="column has-text-centered">' +
                            '<p>' + response.file.client_name + '</p>' +
                            '<br>' +
                            
                                '<a class="button is-outlined" href="../../dsm/' + response.file.client_name + '">View</a>' +
                          
                            '<a class="button is-primary" href="../../files/' + response + '/download">Download File type</a>' + 
                            '<a class="button is-outlined">Delete</a>' +
                        '</div>'
                    );
                }

            }
        };

        function deleteFile(id){
            axios.delete('../../files/' + id);
            $('.file-' + id).remove();
        }
    </script>
@endsection