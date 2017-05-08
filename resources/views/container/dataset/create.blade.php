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
                            <form action="{{ url('file') }}" class="dropzone" id="my-awesome-dropzone" style="padding: 150px 20px;">
                                {{ csrf_field() }}
                            </form>
                        </div>

                        <div class="column">
                            <form class="dataset-form" action="{{ url('containers/store') }}" method="POST">
                                {{ csrf_field() }}
                                <h2 class="subtitle">Release</h2>

                                <div class="field">
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
        window.onload = function(){

//            $('.save-btn').click(function(){
//                $('.dataset-form').submit();
//
//            });

            Dropzone.options.myAwesomeDropzone = {
                maxFilesize: 50, // MB
                uploadMultiple: true,
                autoProcessQueue: false,
                //acceptedFiles: '.xml',

                init: function() {
                    console.log('hello');
                },
                success: function(file, response, action) {
                    if (response.success) {
                        this.defaultOptions.success(file);
                        //TODO cannot put feedback
                    } else {
                        this.defaultOptions.error(file, response.errorMessage);

                    }
                }
            };

        };

    </script>
@endsection
