@extends('layout')

@section('content')

@include('statsSidebar')

<div class="col-md-9">

    @include('pagination')
    <ul class="petitionsList">
        @foreach ($petitions as $key => $petition)

            <li class="border-bottom petition" itemprop="owns" itemscope="" itemtype="http://schema.org/Code">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-xs-12 name">
                                <h3>
                                    <a href="/{{ $petition->number }}" itemprop="name codeRepository">N° {{ $petition->number }}</a>
                                </h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 details">
                                <div class="grayOut description">
                                    {{ $petition->description }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 grayOut meta">
                                <span class="status" data-toggle="tooltip" data-placement="bottom" title="{{ date('j.m.Y H:i', strtotime($petition->status_updated_at)) }}">
                                    <i class="fa fa-certificate" aria-hidden="true"></i>
                                    {{ $petition->status }}
                                    &middot;
                                    <relative-time datetime="{{ $petition->status_updated_at }}" title="{{ date('j.m.Y H:i', strtotime($petition->status_updated_at)) }}">{{ date('j. M', strtotime($petition->status_updated_at)) }}</relative-time>
                                </span>
                                <span class="authors" data-toggle="tooltip" data-placement="bottom" title="Auteur(s) de la petition: {{ $petition->authors }}">
                                        <i class="fa fa-users" aria-hidden="true"></i>
                                        {{ $petition->authors }}
                                </span>
                                @if ($petition->signature_count > 1)
                                    <span class="signatures" data-toggle="tooltip" data-placement="bottom" title="Nombre de signatures: {{ $petition->signature_count }}">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        {{ $petition->signature_count }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </li>

        @endforeach
    </ul>

    @include('pagination')

</div>

@stop
