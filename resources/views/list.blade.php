@include('header')

<div class="row mt-5">
    <div class="col-2"></div>
        <div class="col-8">
            <h2 class="text-xl-center">Lista delle birre</h2>
        </div>
    <div class="col-2"></div>
</div>
<div class="row mt-5">
    <div class="col-12">
        @include('navblock')
    </div>
</div>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Slogan</th>
            <th scope="col">Prima produzione</th>
            <th scope="col">Gradazione</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $key => $array)
        <tr>
            @foreach($array as $key => $value)
                @if($key === 'name')
                    <th scope="row">{{ $value }}</th>
                @endif
                @if($key === 'tagline')
                    <td>{{ $value }}</td>
                @endif
                @if($key === 'first_brewed')
                    <td>{{ $value }}</td>
                @endif
                @if($key === 'abv')
                    <td>{{ $value }}</td>
                @endif
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>

<div class="row mt-2">
    <div class="col-12">
        @include('navblock')
    </div>
</div>

@include('footer')
