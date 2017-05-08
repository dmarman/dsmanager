@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-10 is-offset-1">

                    <h2 class="title">Create Container</h2>

                    <form class="dataset-form" action="{{ url('containers/store') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="columns">
                            <div class="column">
                                <h2 class="subtitle">Car</h2>

                                <div class="field">
                                    <p class="control">
                                        <span class="select is-fullwidth">
                                            <select name="car">
                                                <option value="0" disabled selected>Car</option>
                                                @foreach($cars as $car)
                                                    <option value="{{ $car->id }}">{{ $car->name }}</option>
                                                @endforeach
                                            </select>
                                        </span>
                                    </p>
                                </div>

                                <div class="field">
                                    <p class="control">
                                        <span class="select is-fullwidth">
                                            <select name="body">
                                                <option value="0" disabled selected>Body</option>
                                                    @foreach($bodies as $body)
                                                        <option value="{{ $body->id }}">{{ $body->name }}</option>
                                                    @endforeach
                                            </select>
                                        </span>
                                    </p>
                                </div>

                                <div class="field">
                                    <p class="control">
                                        <span class="select is-fullwidth">
                                            <select name="radio">
                                                <option value="0" disabled selected>Radio</option>
                                                @foreach($radios as $radio)
                                                    <option value="{{ $radio->id }}">{{ $radio->name }}</option>
                                                @endforeach
                                            </select>
                                        </span>
                                    </p>
                                </div>

                            </div>

                            <div class="column">
                                <h2 class="subtitle">Soundsystem</h2>
                                <div class="field">
                                    <p class="control">
                                        <span class="select is-fullwidth">
                                            <select name="soundsystem">
                                                <option value="0" disabled selected>Soundsystem</option>
                                                @foreach($soundsystems as $soundsystem)
                                                    <option value="{{ $soundsystem->id }}">{{ $soundsystem->name }}</option>
                                                @endforeach
                                            </select>
                                        </span>
                                    </p>
                                </div>

                                <div class="field">
                                    <p class="control">
                                        <span class="select is-fullwidth">
                                        <select name="hand">
                                            <option value="0" disabled selected>Hand</option>
                                            @foreach($hands as $hand)
                                                <option value="{{ $hand->id }}">{{ $hand->name }}</option>
                                            @endforeach
                                        </select>
                                        </span>
                                    </p>
                                </div>

                                <div class="field">
                                    <p class="control">
                                        <label class="radio">
                                            <input type="radio" name="amplifier" value="0" checked>
                                            Internal amplifier
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="amplifier" value="1">
                                            External amplifier
                                        </label>
                                    </p>
                                </div>

                            </div>

                            <div class="column">
                                <h2 class="subtitle">SOP</h2>

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
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection