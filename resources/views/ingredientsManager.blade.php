@extends('layouts.app')

@include('layouts._page_header')


@section('content')
    @include('ingredientModals._addGrainModal')
    @include('ingredientModals._addMaltextractModal')
    @include('ingredientModals._addSugarModal')
    @include('ingredientModals._addFermentableModal')
    @include('ingredientModals._addGraintypeModal')
    @include('ingredientModals._addGrainclassModal')
    @include('ingredientModals._addHopModal')
    @include('ingredientModals._addYeastModal')
    @include('ingredientModals._addYeastclassModal')
    @include('ingredientModals._addFiningModal')
    @include('ingredientModals._addWatertreatmentModal')
    @include('ingredientModals._addAcidModal')
    @include('ingredientModals._addSaltModal')
    @include('ingredientModals._addIonModal')
    @include('ingredientModals._addVendorModal')
    {{--
        One tab for each ingredient class:
            * Fermentables
            * Finings
            * Hops
            * Vendors
            * Water treatments
            * Yeasts
    --}}
    @include('ingredientsManager._tabs')
    <div class="tab-content">
        @include('ingredientsManager._fermentables')
        @include('ingredientsManager._hops')
        @include('ingredientsManager._yeasts')
        @include('ingredientsManager._finings')
        @include('ingredientsManager._watertreatments')
        @include('ingredientsManager._vendors')
    </div><!-- tab-content -->

@stop
