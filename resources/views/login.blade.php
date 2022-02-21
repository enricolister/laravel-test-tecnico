@include('header')

<div class="row mt-5">
    <div class="col-lg-4 col-md-3"></div>
    <form class="col-lg-4 col-md-6" action="/" method="post">

            <h3>Effettua il login per continuare:</h3>
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" name="username" class="form-control" id="username-login-input">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" class="form-control" id="password-login-input">
            </div>
            <div class="m-b-3">
                <button type="submit" class="btn btn-dark float-end">Entra</button>
            </div>
            @if($errors->any())
                <div class="mt-3">
                    <h6 class="text-danger">{{ $errors->first() }}</h6>
                </div>
            @endif

    </form>

    <div class="col-lg-4 col-md-3"></div>
  </div>

  @include('footer')
