@include('header')

<div class="row mt-5">
    <div class="col-2"></div>
        <div class="col-8">
            <h2 class="text-xl-center">Interfaccia per Punk API</h2>
        </div>
    <div class="col-2"></div>
</div>
<div class="row mt-lg-5">
    <div class="col-2"></div>
        <div class="col-8 text-center">
            <p class="fw-bold">Benvenuto/a,</p>
            <p>Di seguito il tuo access token personale per accedere alla lista di birre su Punk API:</p>
            <p class="text-danger">{{ $user->getRememberToken() }}</p>
            <p>Puoi utilizzarlo subito cliccando qui:</p>
            <p><a class="btn btn-primary" href="{{ route('callInternalBeers', ['token' => $user->getRememberToken()]) }}">Vai alla lista</a></p>
        </div>
    <div class="col-2"></div>
</div>
<div class="row mt-lg-2">
    <div class=col-2></div>
    <div class="col-8 mt-3 text-center">
    @if($errors->any())
        <h5 class="text-danger border border-danger">{{ $errors->first() }}</h5>
    @endif
    </div>
    <div class=col-2></div>
</div>

@include('footer')
