<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Band Template</title>
    <link rel="shortcut icon" href="../images/fav_icon.png" type="image/x-icon">
    <!-- Bulma Version 0.9.0-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css" />
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js"></script>
</head>

<body>
<nav class="navbar is-dark">
    <div class="navbar-brand">
        <a class="navbar-item" href="https://bulma.io">
            <img src="https://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
        </a>
        <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div id="navbarExampleTransparentExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="https://bulma.io/">
                Home
            </a>
            <a class="navbar-item" href="https://bulma.io/">
                Band
            </a>
            <a class="navbar-item" href="https://bulma.io/">
                Tour
            </a>
            <a class="navbar-item" href="https://bulma.io/">
                Contact
            </a>
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link" href="/documentation/overview/start/">
                    More
                </a>
                <div class="navbar-dropdown is-boxed">
                    <a class="navbar-item" href="/documentation/overview/start/">
                        Mechandise
                    </a>
                    <a class="navbar-item" href="https://bulma.io/documentation/modifiers/syntax/">
                        Extras
                    </a>
                    <a class="navbar-item" href="https://bulma.io/documentation/columns/basics/">
                        Media
                    </a>
                </div>
            </div>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="field">
                    <div class="control">
                        <input class="input" type="text" placeholder="Search . . .">
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
{{--{!! (vh_location('top', true)) !!}--}}

<section class="hero">
    <figure class="image">
        <img src="https://images.pexels.com/photos/167636/pexels-photo-167636.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940">
{{--        {!! get_field($data, 'image', 'default') !!}--}}
    </figure>
</section>

<section class="section">
    <div class="container has-text-centered">
        {!! get_field($data, 'title', 'default','template') !!}
        {!! get_field($data, 'description', 'default') !!}

        <div class="columns is-centered" style="padding: 2rem">
{{--            @foreach( get_the_group($data ,'card' ) as $v)--}}
{{--            <div class="column">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-image">--}}
{{--                        <figure class="image is-2by1">--}}
{{--                            <img src="https://images.pexels.com/photos/167635/pexels-photo-167635.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Placeholder image">--}}
{{--                        </figure>--}}
{{--                    </div>--}}
{{--                    <div class="card-content">--}}
{{--                        <div class="media">--}}
{{--                            <div class="media-content">--}}
{{--                                <p class="title is-4">{{$v}}</p>--}}
{{--                                <p class="subtitle is-6">@johnsmith</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="content">--}}
{{--                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris.--}}
{{--                            <a>@bulmaio</a>.--}}
{{--                            <a href="#">#css</a>--}}
{{--                            <a href="#">#responsive</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @endforeach--}}
            <div class="column">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-2by1">
                            <img src="https://images.pexels.com/photos/167635/pexels-photo-167635.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Placeholder image">
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="media">
                            <div class="media-content">
                                <p class="title is-4">John Smith</p>
                                <p class="subtitle is-6">@johnsmith</p>
                            </div>
                        </div>

                        <div class="content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris.
                            <a>@bulmaio</a>.
                            <a href="#">#css</a>
                            <a href="#">#responsive</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-2by1">
                            <img src="https://images.pexels.com/photos/167635/pexels-photo-167635.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Placeholder image">
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="media">
                            <div class="media-content">
                                <p class="title is-4">John Smith</p>
                                <p class="subtitle is-6">@johnsmith</p>
                            </div>
                        </div>

                        <div class="content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris.
                            <a>@bulmaio</a>.
                            <a href="#">#css</a>
                            <a href="#">#responsive</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-2by1">
                            <img src="https://images.pexels.com/photos/167635/pexels-photo-167635.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Placeholder image">
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="media">
                            <div class="media-content">
                                <p class="title is-4">John Smith</p>
                                <p class="subtitle is-6">@johnsmith</p>
                            </div>
                        </div>

                        <div class="content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris.
                            <a>@bulmaio</a>.
                            <a href="#">#css</a>
                            <a href="#">#responsive</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{--@foreach(get_the_group($data ,'card' ) as $v)--}}
{{--          {{$v}}--}}
{{--@endforeach--}}

{{--{!! get_group($data ,'card' ) !!}--}}

<section class="section">
    <div class="container has-text-centered">
        {!! get_field($data, 'heading', 'default') !!}

        <div class="tile is-ancestor">
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <figure class="image">
                        <img src="https://images.pexels.com/photos/374710/pexels-photo-374710.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
                    </figure>
                    <p class="title">New York</p>
                    <p class="subtitle">Fri 27 Nov 2016</p>
                    <a class="button">Buy Tickets</a>
                </article>
            </div>
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <figure class="image">
                        <img src="https://images.pexels.com/photos/374710/pexels-photo-374710.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
                    </figure>
                    <p class="title">New York</p>
                    <p class="subtitle">Fri 27 Nov 2016</p>
                    <a class="button">Buy Tickets</a>
                </article>
            </div>
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <figure class="image">
                        <img src="https://images.pexels.com/photos/374710/pexels-photo-374710.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
                    </figure>
                    <p class="title">New York</p>
                    <p class="subtitle">Fri 27 Nov 2016</p>
                    <a class="button">Buy Tickets</a>
                </article>
            </div>
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <figure class="image">
                        <img src="https://images.pexels.com/photos/374710/pexels-photo-374710.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
                    </figure>
                    <p class="title">New York</p>
                    <p class="subtitle">Fri 27 Nov 2016</p>
                    <a class="button">Buy Tickets</a>
                </article>
            </div>
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <figure class="image">
                        <img src="https://images.pexels.com/photos/374710/pexels-photo-374710.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
                    </figure>
                    <p class="title">New York</p>
                    <p class="subtitle">Fri 27 Nov 2016</p>
                    <a class="button">Buy Tickets</a>
                </article>
            </div>
        </div>

        <div class="tile is-ancestor">
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <figure class="image">
                        <img src="https://images.pexels.com/photos/374710/pexels-photo-374710.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
                    </figure>
                    <p class="title">New York</p>
                    <p class="subtitle">Fri 27 Nov 2016</p>
                    <a class="button">Buy Tickets</a>
                </article>
            </div>
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <figure class="image">
                        <img src="https://images.pexels.com/photos/374710/pexels-photo-374710.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
                    </figure>
                    <p class="title">New York</p>
                    <p class="subtitle">Fri 27 Nov 2016</p>
                    <a class="button">Buy Tickets</a>
                </article>
            </div>
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <figure class="image">
                        <img src="https://images.pexels.com/photos/374710/pexels-photo-374710.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
                    </figure>
                    <p class="title">New York</p>
                    <p class="subtitle">Fri 27 Nov 2016</p>
                    <a class="button">Buy Tickets</a>
                </article>
            </div>
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <figure class="image">
                        <img src="https://images.pexels.com/photos/374710/pexels-photo-374710.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
                    </figure>
                    <p class="title">New York</p>
                    <p class="subtitle">Fri 27 Nov 2016</p>
                    <a class="button">Buy Tickets</a>
                </article>
            </div>
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <figure class="image">
                        <img src="https://images.pexels.com/photos/374710/pexels-photo-374710.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
                    </figure>
                    <p class="title">New York</p>
                    <p class="subtitle">Fri 27 Nov 2016</p>
                    <a class="button">Buy Tickets</a>
                </article>
            </div>
        </div>
    </div>
</section>

{{--@foreach(get_the_group($data ,'tour' ) as $v)--}}
{{--    {{$v}}--}}
{{--@endforeach--}}
{{--{!! get_group($data ,'tour' ) !!}--}}
{{--{!! get_group($data ,'tour' ,'content' ,0 ) !!}--}}

<section class="section">
    <div class="container has-text-centered">
        <h2 class="title">Contact</h2>

        <form>
            <div class="field is-horizontal">
                <div class="field-body">
                    <div class="field">
                        <p class="control has-icons-left">
                            <input class="input" type="text" placeholder="Name">
                            <span class="icon is-small is-left">
                                    <i class="fas fa-user"></i>
                                </span>
                        </p>
                    </div>
                    <div class="field">
                        <p class="control has-icons-left has-icons-right">
                            <input class="input" type="email" placeholder="Email">
                            <span class="icon is-small is-left">
                                    <i class="fas fa-envelope"></i>
                                </span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <textarea class="textarea" placeholder="Message us"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <button class="button is-primary">
                                Send message
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<footer class="footer">
    <div class="container">
        <div class="content has-text-centered">
            <p>
                <a href="">
                    <i class="fab fa-facebook-square fa-2x"></i>
                </a>
                <a href="">
                    <i class="fab fa-twitter-square fa-2x"></i>
                </a>
                <a href="">
                    <i class="fab fa-instagram fa-2x"></i>
                </a>
                <a href="">
                    <i class="fab fa-snapchat fa-2x"></i>
                </a>
            </p>
            <p>
                <a href="https://bulma.io">
                    <img src="https://bulma.io/images/made-with-bulma.png" alt="Made with Bulma" width="128" height="24">
                </a>
            </p>
        </div>
    </div>
</footer>
<script src="../js/bulma.js"></script>
</body>

</html>
