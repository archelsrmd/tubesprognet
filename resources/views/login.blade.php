<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    @include('templates.metadata')
    <style>
        .currency {
            text-align: right;
        }
    </style>
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <div class="nk-header nk-header-fixed is-light">
                </div>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <main class="form-signin w-30 m-auto">
                                    <form action="/login" method="post">
                                        @csrf
                                        <h1 class="h3 mb-3 fw-normal text-center">Login</h1>
                                        @if (session()->has('loginError'))
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                {{ session('loginError') }}
                                            </div>
                                        @endif

                                        @if ($errors->any())
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <div class="form-floating">
                                            <label for="floatingInput">Kode Pegawai</label>
                                            <input type="text" class="form-control" name="kode" id="floatingInput"
                                                placeholder="Masukkan Kode Anda" value="{{ old('kode') }}">
                                        </div>
                                            <br>
                                        <button class="w-100 btn btn-primary text-center" type="submit">Login</button>
                                    </form>
                                </main>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                @include('templates.footer')
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    @include('templates.metascript')
    @include('templates.script')
    @stack('script')
</body>

</html>
