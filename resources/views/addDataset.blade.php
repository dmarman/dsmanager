@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
    <link href="{{ asset('css/addDataset.css') }}" rel="stylesheet">

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

            $('.save-btn').click(function(){
                $('.dataset-form').submit();

            });


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


            axios.get('http://localhost/laravel/dsmanager/public/dataset/form-data')
                .then(function(response){
                    $.each(response.data.data, function(index, element){
                        $('.dataset-form').prepend('<div class="form-group ' + index + '-select"></div>');

                        $('.' + index + '-select').append('<select class="form-control input-lg text-center text-capitalize" name="' + index + '"></select>');
                        $('.' + index + '-select').find('select').append('<option value="" disabled selected>' + index + '</option>');

                        $.each(element, function(childIndex, childElement){
                            $('.' + index + '-select').find('select').append('<option value="' + childElement.id + '">' + childElement.name + '</option>');
                        });

                    });
                });

            //axios.post('http://localhost/laravel/dsmanager/public/dataset-container');

        };

    </script>







@endsection
