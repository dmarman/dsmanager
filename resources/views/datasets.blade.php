@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Type</th>
                <th>Version</th>
                <th>Files</th>
                <th>Tests</th>
            </tr>
            </thead>
            <tbody class="container-table">
            </tbody>
        </table>
    </div>
</div>
    <script>
        axios.get('./containers').then((response) => {
            $.each(response.data, function(i, container){
                $('.container-table').append(
                        '<tr>' +
                        '<td>' + container.id + '</td>' +
                        '<td>' + container.description.car.name + '</td>' +
                        '<td>' + container.description.body.name + '</td>' +
                        '<td>' + container.description.radio.name + '</td>' +
                        '<td>' + container.description.soundsystem.name + '</td>' +
                        '<td>' + container.description.hand.name + '</td>' +
                        '<td>' + container.description.week + '/' + String(container.description.year).slice(2, 4) + '</td>' +
                        '<td>' +
                            '<div class="dropdown">' +
                                '<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'
                                    + container.datasets.length +
                                    ' <span class="caret"></span>' +
                                '</button>' +
                                '<ul class="dropdown-menu dropdown-container-' + container.id + '" aria-labelledby="dropdownMenu1">' +
                                '<li><a>View all</a></li>' +
                                '<li role="separator" class="divider"></li>' +
                                '</ul>' +
                            '</div>' +
                        '</td>' +
                        '</tr>'
                );

                $.each(container.datasets, function(i, dataset){
                    $('.dropdown-container-' + container.id).append('<li><a href="#">' + dataset.type + ' v' + dataset.version + '</a></li>');
                });

            });
        });
    </script>
@endsection

