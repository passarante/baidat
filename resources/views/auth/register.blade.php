<x-guest-layout>
    <div class="p-0 my-auto col-xl-4 col-lg-6 col-md-7">
        <div class="mx-auto authentication-form">
            <div class="logo-centered">
                <a href="../index.html"><img src="{{ asset('theme/src/img/brand.svg') }}" alt=""></a>
            </div>
            <h3>Baidat</h3>
            <p>Bağış ve Aidat Yönetimine Hoşgeldiniz!</p>
            <div class="my-2">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif
            </div>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="İsim Soyisim" required="" name="email">
                    <i class="ik ik-user"></i>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Email" required="" name="email">
                    <i class="ik ik-user"></i>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                    <i class="ik ik-lock"></i>
                </div>

                <div class="text-center sign-btn">
                    <button type="submit" class="btn btn-theme">Üye Ol</button>
                </div>
            </form>

            <div class="register">
                <p>Zaten üye misiniz? <a href="{{ route('login') }}">Buradan giriş yapabilirsiniz.</a></p>
            </div>
        </div>
    </div>
</x-guest-layout>
