<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/az.css')}}">
	</head>
	<body>

		<nav class="navbar">
			v 1.0.a-1&nbsp;
			<a href="{{ url('/user/profile') }}">Settings</a>
            <form action="{{ url('/logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
		</nav>

		<div class="container">

			<div class="col-1">
				<a href="{{ url("/village/$village_id/economy") }}" class="button">
                    Economy buildings</a>
                <a href="{{ url("/village/$village_id/military") }}" class="button">
                    Military buildings</a>
                <a href="{{ url("/village/$village_id/common") }}" class="button">
                    Common buildings</a>
			</div>

			<div class="col-2">
				<div class="main-view">
                    @yield('main-view')
				</div>
				<hr>
				<div class="main-panel">
                    @yield('main-panel')
				</div>
			</div>

			<div class="col-3">
				<div class="section-title">Villages</div>
				<ul>
                    @foreach ($villages as $village)
                        <li>
                            <a class="button" href="{{ url("/village/$village->id") }}">
                                {{ $village->name }}
                            </a>
                        </li>
                    @endforeach
				</ul>
				<div class="section-title">Account</div>
                <ul>
                    <li>
                        <a class="button" href="{{ url('/user/profile') }}">Settings</a>
                    </li>
                </ul>
			</div>

		</div>

		<footer>
			All rights reserved.
		</footer>

	</body>
</html>
