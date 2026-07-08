@extends('layouts.app')

{{-- Section order follows the shared landing blueprint
     (riviera-residencial/app/docs/landing-page-structure.md):
     identity → project → video band → product → aspiracional → availability/price
     → financing → community amenities → location → interior proof → gallery proof
     → trust → conversion form → final CTA. --}}
@section('content')
    @include('partials.hero')
    @include('partials.esencia')
    @include('partials.cta-video')
    @include('partials.residencias')
    @include('partials.aspiracional')
    @include('partials.disponibilidad')
    @include('partials.financiamiento')
    @include('partials.amenidades')
    @include('partials.ubicacion')
    @include('partials.interiores')
    @include('partials.galeria')
    @include('partials.respaldo')
    @include('partials.contacto')
    @include('partials.cta-final')
@endsection
