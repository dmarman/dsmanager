@extends('layouts.app')

@section('content')
    <section class="hero is-warning">
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column">
                        <h1 class="title">
                            {{ ucfirst($dataset->type) }} Dataset v{{ $dataset->version }} - {{ ucfirst($dataset->status) }} Tuning 
                        </h1>
                        <a href="{{ url('/containers/' . $dataset->container->id) }}">
                            <h2 class="subtitle">
                                <span>{{ $dataset->container->car->name }}</span>
                                <span>{{ $dataset->container->hand->name }}</span> /
                                <span>{{ $dataset->container->radio->name }} {{ $dataset->container->radio->family }}</span>
                                <span>{{ $dataset->container->soundsystem->name }}</span> /
                                @if(isset($dataset->container->amplifier))
                                    <span>{{ $dataset->container->amplifier->name }}</span>
                                @endif
                            </h2>
                        </a>
                    </div>
                    <div class="column has-text-right">
                        <a class="button is-primary is-outlined is-inverted" href="{{ url('/datasets/' . $dataset->id . '/edit') }}">Edit</a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <h3 class="title">Files</h3>

            <div class="columns">
                <div class="column">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Type</th>   
                                <th>Name</th>
                                <th>Size</th>
                                <th>Uploaded on</th>
                                <th>By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach($dataset->files as $file)
                                    @if($file->type != 'image')
                                        <tr>
                                            <th>{{ strtoupper($file->type) }}</th>                                        
                                            <td>{{ $file->client_name }}</td>
                                            <td>{{ round($file->size/1000) }} KB</td>
                                            <td>{{ $file->created_at->format('jS \\of F Y') }}</td>
                                            <td>{{ ucfirst($file->user->name) }}</td>
                                            <td><a href="{{ url('/files/' . $file->id . '/download') }}">Download {{ strtoupper($file->type) }}</a></td>                                        
                                        </tr>
                                    @endif        
                                @endforeach
                            
                        </tbody>
                    </table>
                </div>
                           
            </div>
        </div>

        @if($dataset->channels->count() > 0)
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
        @endif

        <div class="container">
            <div class="block">
                <h3 class="title">Description</h3>
                <p>{{ $dataset->description }}</p>
            </div>
            <div class="block">
                <h3 class="title">Tests</h3>
            </div>
            
            <div class="columns">
                @foreach($dataset->files as $file)
                    @if($file->type == 'image')
                        <div class="column">    
                            <img class="image" src="{{ url('image/' . $file->id) }}">                        
                        </div>    
                    @endif
                @endforeach
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
            }).then(function(response){
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
            $('#test-' + id + '').val('');
        }
    </script>
@endsection