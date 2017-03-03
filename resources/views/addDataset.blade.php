@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="text-center">Dataset Builder</h1>
            </div>

            <div class="row">
                <div class="col-md-4 col-md-offset-4">

                    <form></form>

                    <label class="radio-inline">
                        <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="0"> Internal amplifier
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="1"> External amplifier
                    </label>

                    <div class="form-group">
                        <input class="form-control week-input input-lg" placeholder="Week">
                    </div>
                    <div class="form-group">
                        <input class="form-control year-input input-lg" placeholder="Year">
                    </div>

                </div>
            </div>

        </div>
    </div>

    <script>
        window.onload = function(){
            axios.get('http://localhost/laravel/dsmanager/public/dataset/form-data')
                .then(function(response){
                    $.each(response.data.data, function(index, element){
                        $('form').append('<div class="form-group ' + index + '-select"></div>');

                        $('.' + index + '-select').append('<select class="form-control input-lg text-center text-capitalize"></select>');
                        $('.' + index + '-select').find('select').append('<option value="" disabled selected>' + index + '</option>');

                        $.each(element, function(childIndex, childElement){
                            $('.' + index + '-select').find('select').append('<option value="' + childElement.id + '">' + childElement.name + '</option>');
                        });

                    });
                });
        };

    </script>








@endsection
