@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
  <section class="content-header">
    <h1>Dashboarsadsadd</h1>
  </section>

  <section class="content">
    <div class="box box-primary">
      <div class="box-body">
      <p>Your location: {{ $city }}, {{ $state }}</p>
      </div>
    </div>
  </section>
@endsection
