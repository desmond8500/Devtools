@extends('pdf/layout1')

@section('title')
    Description détaillée
@endsection

@section('page-header')
    <h2>{{ $projet->name }}</h2>
    {!! nl2br($projet->description) !!}
@endsection

@section('content')
    @foreach ($projet->besoins as $besoin)
        @if ($besoin->stickers->count())

            <div class="besoin">
                <div class="besoin_desc">
                    <b class="besoin_title">{{ strtoupper($besoin->name) }}</b>
                    <p>{!! nl2br($besoin->description) !!}</p>
                </div>

                @foreach ($besoin->scenarios as $scenario)
                    @if ($loop->first)
                        <div class="scenario">
                            <div class="scenario_title">Scénario nominal</div>
                            <div>
                                @foreach ($scenario->etapes as $key => $etape)
                                    <div class="etape"><b>{{ $key+1 }}</b> {!! nl2br($etape->description) !!}</div>
                                @endforeach
                            </div>
                        </div>
                    @else
                    <div class="scenario">
                        <div class="scenario_title">Scénario alternatif Etape {{ $scenario->type }}</div>
                        <div>
                            @foreach ($scenario->etapes as $key => $etape)
                                <div class="etape"><b>{{ $key+1 }}</b> {!! nl2br($etape->description) !!}</div>
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
