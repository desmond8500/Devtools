@extends('pdf/layout')

@section('title')
    Description détaillée
@endsection

{{-- @section('header')
    <b>Description détaillée du projet :</b> {{ $projet->name }} <br>
    {!! nl2br($projet->description) !!}
@endsection --}}

@section('content')
    @foreach ($projet->besoins as $besoin)
        @if ($besoin->stickers->count())

            <div class="besoin">
                <div class="besoin_desc">
                    {{ $besoin->name }}
                    <p>{!! nl2br($besoin->description) !!}</p>
                </div>

                @foreach ($besoin->scenarios as $scenario)
                    @if ($loop->first)
                        <div class="scenario">
                            <div class="scenario_title">Scénario nominal</div>
                            <div>
                                @foreach ($scenario->etapes as $key => $etape)
                                    {{ $key+1 }}  {!! nl2br($etape->description) !!} <br>
                                @endforeach
                            </div>
                        </div>

                    @else
                    <div class="scenario">
                        <div class="scenario_title">Scénario alternatif</div>
                        <div>
                            @foreach ($scenario->etapes as $key => $etape)
                                {{ $key+1 }} {!! nl2br($etape->description) !!} <br>
                            @endforeach
                        </div>
                    </div>
                    @endif

                @endforeach


            </div>

        @endif
    @endforeach
@endsection
{{--
@section('footer')
    tres
@endsection --}}
