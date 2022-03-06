@extends("layouts.app")

@section("content")
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                <div class="mb-4">
                    <img style="width: auto; height: 32px;" src="{{ asset("img/logo.svg") }}" alt="">
                </div>
                @auth
                    <p>You are already logged in.</p>
                    <a href="{{ route('dashboard.index') }}" class="btn btn-primary">Go to dashboard</a>
                    <!-- TODO: Logout button -->
                @endauth

                @guest
                    <form action="{{ route("login") }}" method="post">
                        @method("post")
                        @csrf
                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" value="{{ old("email") }}" placeholder="Email address" title="Email address" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Password" title="Password" required>
                        </div>
                        @error("email")
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <button class="btn btn-primary" type="submit">Login</button>
                    </form>
                @endguest
            </div>
        </div>
    </div>
@endsection
