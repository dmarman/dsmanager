@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>

    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-10 is-offset-1">
                <h2 class="title">Add {{ $type }} Dataset v{{ $version }}</h2>
                    <div class="columns">
                        <div class="column">
                            <form action="{{ url('/files/upload') }}" class="dropzone" id="my-awesome-dropzone" style="padding: 150px 20px;">
                                {{ csrf_field() }}
                            </form>                        
                        </div>
                        
                        <div class="column">
                            <form class="dataset-form" action="{{ url('datasets') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="version" value="{{ $version }}">
                                <input type="hidden" name="type" value="{{ $type }}">
                                <input type="hidden" name="container" value="{{ $container->id }}">
                                
                                <div class="content">
                                    <h2>Project</h2>
                                    <p>
                                        <span class="tag is-dark">+{{ $container->car->tma }}</span>
                                        <span class="tag is-dark">+{{ $container->radio->pr }}</span>
                                        <span class="tag is-dark">+{{ $container->soundsystem->pr }}</span>
                                        <span class="tag is-dark">+{{ $container->hand->pr }}</span>   
                                    </p>
                                    <p>{{ $container->car->brand }}{{ $container->car->platform }}{{ $container->car->generation }}{{ $container->car->bodywork }} {{ $container->hand->name }} {{ $container->soundsystem->name }} {{ $container->radio->name }} {{ $container->amplifier->name }}<p>
                                    <div class="message-container"></div>                                                        
                                </div>
                                
                                <div class="field">
                                    <label class="label">Description</label>
                                    <p class="control">
                                        <textarea class="textarea" placeholder="Description" name="description"></textarea>
                                    </p>
                                </div>
                                
                                <div class="field">
                                    <label class="label">Status</label>
                                    <div class="control">
                                        <div class="select">
                                            <select>
                                                <option>Initial</option>
                                                <option>Fine</option>
                                                <option>Final</option>                                        
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="field">
                                    <label class="label">Release</label>                                
                                    <p class="control">
                                        <input name="week" class="input" type="text" placeholder="Week">
                                    </p>
                                </div>

                                <div class="field">
                                    <p class="control">
                                        <input name="year" class="input" type="text" placeholder="Year">
                                    </p>
                                </div>

                                <div class="field is-grouped">
                                    <p class="control">
                                        <button class="button is-primary">Submit</button>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
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
                    $('.message-container').append(
                            '<article class="message is-info">' +
                                '<div class="message-header"><strong>' + response.file.type.toUpperCase() + '</strong> file added</div>' +
                                '<div class="message-body">' + response.file.client_name + '</div>' +
                            '</article>'
                    );

                    $('.dataset-form').append(
                            '<input type="hidden" name="' + response.file.type + '" value="' + response.file.id + '">'
                    );
                }

            }
        };

    </script>
@endsection
