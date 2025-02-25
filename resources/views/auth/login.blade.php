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
                    <input type="text" class="form-control" placeholder="Email" required="" name="email">
                    <i class="ik ik-user"></i>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                    <i class="ik ik-lock"></i>
                </div>
                <div class="row">
                    <div class="text-left col">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" name="remember" class="custom-control-input" id="item_checkbox"
                                name="item_checkbox" value="option1">
                            <span class="custom-control-label">&nbsp;Beni hatırla</span>
                        </label>
                    </div>
                    <div class="text-right col">
                        <a href="#">Şifrenizi mi unuttunuz?</a>
                    </div>
                </div>
                <div class="text-center sign-btn">
                    <button type="submit" class="btn btn-theme">Giriş</button>
                </div>
            </form>

            <div class="register">
                <p>Henüz üye degil misiniz? <a href="{{ route('register') }}">Buradan üye olabilirsiniz.</a></p>
            </div>
        </div>
    </div>
</x-guest-layout>
