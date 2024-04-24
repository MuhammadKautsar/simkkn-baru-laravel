<x-guest-layout>
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <x-guest.sidenav-guest />
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-md-6 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-8">
                                <div class="card-header pb-0 text-left bg-transparent text-center">
                                    <h3 class="font-weight-black text-dark display-6">Login Panitia</h3>
                                    <p class="mb-0">Welcome back!</p>
                                    <p class="mb-0">Sign in</p>
                                </div>
                                <div class="text-center">
                                    @if (session('status'))
                                        <div class="mb-4 font-medium text-sm text-green-600">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    @error('message')
                                        <div class="alert alert-danger text-sm" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="card-body">
                                    <form role="form" class="text-start" method="POST" action="sign-in">
                                        @csrf
                                        <label>Login sebagai:</label>
                                        <div class="mb-3">
                                            <select name="user_type" id="user_type" class="form-select">
                                                <option disabled selected>Pilih Tipe User</option>
                                                <option value="admin">Panitia USK</option>
                                                <option value="user">Admin Non USK</option>
                                            </select>
                                        </div>
                                        <label>NIP / Kode PTN</label>
                                        <div class="mb-3">
                                            <input type="number" id="nip" name="nip" class="form-control"
                                                placeholder="Masukkan NIP / Kode PTN"
                                                aria-label="NIP/Kode PTN" aria-describedby="nip-addon">
                                        </div>
                                        <label>Password</label>
                                        <div class="mb-3">
                                            <input type="password" id="password" name="password"
                                                class="form-control" placeholder="Masukkan password" aria-label="Password"
                                                aria-describedby="password-addon">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-dark w-100 mt-4 mb-3">Sign in</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-absolute w-40 top-0 end-0 h-100 d-md-block d-none">
                                <div class="oblique-image position-absolute fixed-top ms-auto h-100 z-index-0 bg-cover ms-n8"
                                    style="background-image:url('../assets/img/image-sign-up.jpg')">
                                    <div
                                        class="blur mt-12 p-4 text-center border border-white border-radius-md position-absolute fixed-bottom m-4">
                                        <h2 class="mt-3 text-dark font-weight-bold">KKN Universitas Syiah Kuala</h2>
                                        <h6 class="text-dark text-sm mt-5">Copyright © 2024 UPT Teknologi Informasi dan Komunikasi</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

</x-guest-layout>
