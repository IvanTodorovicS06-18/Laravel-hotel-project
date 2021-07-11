@extends('layouts.ulayout')

@section('title')
    Mainpage
@endsection

@section('content')
<!-- Banner -->
<section id="banner">
    <div class="inner">
        <h1>Hotel Laravel: <span>Spremni da vas ugostimo<br />
					Dobrodosli</span></h1>
        <ul class="actions">
            <li><a href="#" class="button alt">Get Started</a></li>
        </ul>
    </div>
</section>
<h3>    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif</h3>
<!-- One -->
<section id="one">
    <div class="inner">
        <header>
            <h2>Magna Etiam Lorem</h2>
        </header>
        <p>Suspendisse mauris. Fusce accumsan mollis eros. Pellentesque a diam sit amet mi ullamcorper vehicula. Integer adipiscin sem. Nullam quis massa sit amet nibh viverra malesuada. Nunc sem lacus, accumsan quis, faucibus non, congue vel, arcu, erisque hendrerit tellus. Integer sagittis. Vivamus a mauris eget arcu gravida tristique. Nunc iaculis mi in ante.</p>
        <ul class="actions">
            <li><a href="#" class="button alt">Learn More</a></li>
        </ul>
    </div>
</section>

<!-- Two -->
<section id="two">
    <div class="inner">
        <article>
            <div class="content">
                <header>
                    <h3>Pellentesque adipis</h3>
                </header>
                <div class="image fit">
                    <img src="images/pic01.jpg" alt="" />
                </div>
                <p>Cumsan mollis eros. Pellentesque a diam sit amet mi magna ullamcorper vehicula. Integer adipiscin sem. Nullam quis massa sit amet lorem ipsum feugiat tempus.</p>
            </div>
        </article>
        <article class="alt">
            <div class="content">
                <header>
                    <h3>Morbi interdum mol</h3>
                </header>
                <div class="image fit">
                    <img src="images/pic02.jpg" alt="" />
                </div>
                <p>Cumsan mollis eros. Pellentesque a diam sit amet mi magna ullamcorper vehicula. Integer adipiscin sem. Nullam quis massa sit amet lorem ipsum feugiat tempus.</p>
            </div>
        </article>
    </div>
</section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        } );
    </script>
@endsection
