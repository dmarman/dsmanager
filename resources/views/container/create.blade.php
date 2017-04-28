@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="text-center">Dataset Builder</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form action="{{ url('file') }}" class="dropzone" id="my-awesome-dropzone">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>

        <div class="row dataset-description">
            <div class="col-md-4 col-md-offset-4">
                <form class="dataset-form" action="{{ url('dataset-container') }}" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group-select">
                        <select class="form-control input-lg text-center text-capitalize" name="car">
                            <option value="0" disabled selected>Car</option>
                            <option value="1">Hello</option>
                        </select>
                    </div>

                    <div class="form-group-select">
                        <select class="form-control input-lg text-center text-capitalize" name="body">
                            <option value="0" disabled selected>Body</option>
                        </select>
                    </div>

                    <div class="form-group-select">
                        <select class="form-control input-lg text-center text-capitalize" name="radio">
                            <option value="0" disabled selected>Radio</option>
                            <option value="1">Hello</option>
                        </select>
                    </div>

                    <div class="form-group-select">
                        <select class="form-control input-lg text-center text-capitalize" name="soundsystem">
                            <option value="0" disabled selected>SoundSystem</option>
                            <option value="1">Hello</option>
                        </select>
                    </div>

                    <div class="form-group-select">
                        <select class="form-control input-lg text-center text-capitalize" name="hand">
                            <option value="0" disabled selected>Hand</option>
                            <option value="1">Hello</option>
                        </select>
                    </div>

                    <div class="checkbox">
                        <label class="radio-inline">
                            <input type="radio" id="inlineRadio2" name="amplifier" value="0"> Internal amplifier
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="inlineRadio3" name="amplifier" value="1"> External amplifier
                        </label>
                    </div>
                    <div class="form-group">
                        <input class="form-control week-input input-lg" name="week" placeholder="Week">
                    </div>
                    <div class="form-group">
                        <input class="form-control year-input input-lg" name="year" placeholder="Year">
                    </div>
                    <a class="btn btn-default btn-block btn-lg btn-primary save-btn">Save</a>
                </form>
            </div>
        </div>
    </div>

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