@extends('master.dashboard')
@section('content')
<header class="jumbotron my-4">
      <h3 class="display-3">Welcome To Premium Roaster !</h3>
      <p class="lead">SameDay DeferentShit - Best Roasted Bean Ever </p>
          <a href="/store" class="btn btn-primary btn-lg">Shopping Now !</a>
    </header>
    <!-- Page Features -->
    <div class="row text-center">

      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
          <img class="card-img-top" src="{{ Asset('storage\files\espresso.jpg')}}" alt="">
          <div class="card-body">
            <h4 class="card-title">Espresso Base</h4>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
          <img class="card-img-top" src="{{ Asset('storage\files\manual.jpg')}}" alt="">
          <div class="card-body">
            <h4 class="card-title">Manual Brew</h4>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo magni sapiente, tempore debitis beatae culpa natus architecto.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
          <img class="card-img-top" src="{{ Asset('storage\files\cold.jpg')}}" alt="">
          <div class="card-body">
            <h4 class="card-title">Cold Brew</h4>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
          </div>
        </div>
      </div>

      

    </div>
@endsection