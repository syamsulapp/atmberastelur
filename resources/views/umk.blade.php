@extends('app')

@section('judul','Atm Beras Dan Telur')

@section('konten')

<section>
    <div class="hero-section hero-style-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="hero-content-wrapper">
                        <br>
                        <!-- <p>Please, purchase full version of the template to get all pages and features.</p> -->
                        <center>
                            <h2 class="col-lg-20">Jumlah Pengambilan : <button class="button button-lg radius-50">
                                    @foreach($get_data_all as $g)
                                    @if($g['status_waktu_pengambilan'] != 'N' )
                                    @if($g['beras'] !=0)
                                    @if($g['beras'] <=3 ) {{ $g['beras'] }}{{ (' liter beras ') }} @endif @endif @if($g['telur_beras'] && $g['telur'] !=0) @if($g['telur_beras'] <=3 && $g['telur'] <=9) {{ $g['telur_beras']}}{{ __(' Liter Beras ') }} {{ __('Dan') }} {{ $g['telur']}}{{ __(' Butir Telur') }} <div class="request-pengambilan" data-flashdata="">
                    </div>
                    @endif
                    @endif
                    @else
                    {{ ('belum waktu pengambilan') }}
                    @endif
                    @if($g['beras'] == 0 && $g['telur_beras'] == 0 && $g['telur'] == 0 )
                    {{ ('tempelkan kartu pada mesin') }}
                    <script>
                        function autoRefreshPage() {
                            window.location = window.location.href;
                        }
                        setInterval('autoRefreshPage()', 1000)
                    </script>
                    @else
                    <script>
                        function autoRefreshPage() {
                            window.location = window.location.href;
                        }
                        setInterval('autoRefreshPage()', 5000)
                    </script>
                    @endif
                    @if($g['beras'] == 100 && $g['telur_beras'] == 100 && $g['telur'] == 100 )
                    <div class="sudah_ambil" data-flashdata="sudah melakukan pengambilan"></div>
                    <script>
                        function autoRefreshPage() {
                            window.location = window.location.href;
                        }
                        setInterval('autoRefreshPage()', 5000)
                    </script>
                    @endif
                    @if($g['telur'] > 0 && $g['telur_beras'] == 0)
                    {{$g['telur']}}{{ ('butir telur') }}
                    <script>
                        function autoRefreshPage() {
                            window.location = window.location.href;
                        }
                        setInterval('autoRefreshPage()', 5000)
                    </script>
                    @elseif($g['telur_beras'] > 0 && $g['telur'] == 0)
                    {{$g['telur_beras']}}{{ ('liter beras') }}
                    <script>
                        function autoRefreshPage() {
                            window.location = window.location.href;
                        }
                        setInterval('autoRefreshPage()', 5000)
                    </script>
                    @endif
                    @endforeach </button></center>
                    </h2>
                </div>
            </div>
            <div class="col-lg-12 align-self-end">
                <div class="hero-image">
                </div>
            </div>
        </div>
    </div>
    <div class="shapes">
        <img src="{{ asset('atmberas/atmberastelur_pattern.png') }}" alt="" class="shape shape-1">
    </div>
    </div>
</section>

@endsection