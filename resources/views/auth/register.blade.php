<x-guest-layout>
    <div class="p-0 my-auto col-xl-4 col-lg-6 col-md-7">
        <div class="mx-auto authentication-form">

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
            <form action="{{ route('register') }}" method="POST" id="register-form" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="İsim Soyisim" required="" name="name"
                        value="{{ old('name') }}">
                    <i class="ik ik-user"></i>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" required="" name="email"
                        value="{{ old('email') }}">
                    <i class="ik ik-mail"></i>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                    <i class="ik ik-lock"></i>
                </div>
                <div class="form-group">
                    <input type="password" name="password_confirmation" class="form-control"
                        placeholder="Password Confirmation" required="">
                    <i class="ik ik-lock"></i>
                </div>








                <div class="form-group">
                    <input type="text" name="mother_and_father_name" class="form-control"
                        placeholder="Anne ve Baba Adı" value="{{ old('mother_and_father_name') }}">
                    <i class="ik ik-users"></i>
                </div>
                <div class="form-group">



                    <input type="text" name="bol" class="form-control" placeholder="Doğum yeri" required
                        value="{{ old('bol') }}">

                    <i class="ik ik-square"></i>
                </div>
                <div class="form-group">
                    <input type="date" name="dob" class="form-control" placeholder="Doğum Tarihi" required
                        value="{{ old('dob') }}">
                    <i class="ik ik-calendar"></i>
                </div>
                <div class="form-group">
                    <input type="text" name="job" class="form-control" placeholder="Meslek">
                    <i class="ik ik-award"></i>
                </div>
                <div class="form-group">
                    <select name="nationality" id="" class="form-control" required
                        value="{{ old('nationality') }}">
                        <option value="">Seçiniz</option>
                        <option value="turkiye">Türkiye</option>
                        <option value="almanya">Almanya</option>
                        <option value="bae">Birleşik Arap Emirlikleri</option>
                        <option value="suriye">Suriye</option>

                    </select>
                    <i class="ik ik-flag"></i>
                </div>

                <div class="form-group">
                    <textarea name="address" class="form-control" placeholder="Adres" required value="{{ old('address') }}"></textarea>
                    <i class="ik ik-map-pin"></i>
                </div>

                <div class="form-group">
                    <input type="text" id="phone-mask" name="phone" class="form-control"
                        placeholder="+49 (123) 456 789 012" value="{{ old('phone') }}" required>
                    <i class="ik ik-phone"></i>
                </div>
                <div class="form-group">
                    <input type="number" name="fee_amount" class="form-control" placeholder="500" required
                        value="{{ old('fee_amount') }}">
                    <i class="ik ik-thumbs-up"></i>
                </div>
                <div class="form-group">
                    <label for="">İmza</label>
                    <canvas height="100" width="300"
                        style="border:1px dashed #ccc;height:200px; width:100%"></canvas>
                    <p><a href="#" class="clear-button">Temizle</a></p>
                    {{-- <textarea id="signature-pad" class="form-control" placeholder="İmza" name="signature" required></textarea>
                    <i class="ik ik-check-circle"></i> --}}
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

    @push('scripts')
        <script>
            IMask(
                document.getElementById('phone-mask'), {
                    mask: '+{49}(000)000-00-00-00'
                }
            )
        </script>

        <script>
            const canvas = document.querySelector('canvas');
            const form = document.querySelector('#register-form');
            const clearButton = document.querySelector('.clear-button');

            const ctx = canvas.getContext('2d');
            let writingMode = false;

            const getCursorPosition = (event) => {
                positionX = event.clientX - event.target.getBoundingClientRect().x;
                positionY = event.clientY - event.target.getBoundingClientRect().y;
                return [positionX, positionY];
            }

            const handlePointerDown = (event) => {
                writingMode = true;
                ctx.beginPath();
                const [positionX, positionY] = getCursorPosition(event);
                ctx.moveTo(positionX, positionY);
            }
            const handlePointerUp = () => {
                writingMode = false;
            }
            const handlePointerMove = (event) => {
                if (!writingMode) return
                const [positionX, positionY] = getCursorPosition(event);
                ctx.lineTo(positionX, positionY);
                ctx.stroke();
            }









            canvas.addEventListener('pointerdown', handlePointerDown, {
                passive: true
            });
            canvas.addEventListener('pointerup', handlePointerUp, {
                passive: true
            });
            canvas.addEventListener('pointermove', handlePointerMove, {
                passive: true
            });


            ctx.lineWidth = 1;
            ctx.lineJoin = ctx.lineCap = 'round';


            form.addEventListener('submit', (event) => {

                event.preventDefault();
                const imageURL = canvas.toDataURL();
                const image = document.createElement('img');
                image.src = imageURL;
                image.height = canvas.height;
                image.width = canvas.width;
                image.style.display = 'none';


                form.appendChild(image);
                image.name = "image";

                form.submit();

                clearPad();

            })
            const clearPad = () => {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
            }
            clearButton.addEventListener('click', (event) => {
                event.preventDefault();
                clearPad();
            })
        </script>
    @endpush
</x-guest-layout>
