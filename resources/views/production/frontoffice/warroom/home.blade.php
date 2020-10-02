
@extends('frontoffice.layout.warroom')

<div class="row">
    @include('frontoffice.warroom.storm_ex')
    @include('frontoffice.warroom.rainfall')
    @include('frontoffice.warroom.dam')
    @include('frontoffice.warroom.waterlevel')
</div>
<div class="row">
    @include('frontoffice.warroom.rain')
    @include('frontoffice.warroom.ex_cpy')
    @include('frontoffice.warroom.swan')
    @include('frontoffice.warroom.salinity')
</div>
