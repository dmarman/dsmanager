@extends('layouts.app')

@section('content')

    <section class="section">
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>TMA</th>
                        <th>#</th>
                        <th>SOP</th>
                        <th>Name</th>
                        <th>Containers</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cars as $car)
                        <tr>
                            <th><a href="{{ url('/cars/' . $car->id) }}">{{ $car->id }}</a></th>
                            <td>{{ $car->tma }}</td>
                            <td>{{ $car->brand }}</td>
                            <td>{{ $car->week_release }}</td>
                            <td>{{ $car->name }}</td>                            
                            <td><a href="{{ url('/cars/' . $car->id . '/containers') }}">{{ $car->container->count() }}</a></td>                            
                                              
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
