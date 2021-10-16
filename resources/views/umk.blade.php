@extends('app')

@section('judul','Atm Beras Dan Telur')

@section('konten')

    <div class="hero-section hero-style-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero-content-wrapper">
                        <h2>DEWAN MESJID INDONESIA PROVINSI SULAWESI TENGGARA</h2>
                        <br>
                        <!-- <p>Please, purchase full version of the template to get all pages and features.</p> -->
                        <h2>Jumlah Pengambilan : <button class="button button-lg radius-50">
                                @foreach($get_data_all as $g)
                                    @if($g['status_waktu_pengambilan'] != 'N' )
                                            @if($g['beras'] !=0)
                                                @if($g['beras'] <=3 )
                                                    {{ $g['beras'] }}{{ (' liter beras ') }}
                                                @endif
                                            @endif
                                            @if($g['telur_beras'] && $g['telur'] !=0)
                                                @if($g['telur_beras'] <=3 && $g['telur'] <=9)
                                                        {{ $g['telur_beras']}}{{ __(' liter beras ') }} {{ $g['telur']}}{{ __(' butir telur') }}
                                                @endif
                                            @endif
                                    @else
                                        {{ ('belum waktu pengambilan') }}
                                    @endif
                                    @if($g['beras'] == 0 && $g['telur_beras'] == 0 && $g['telur'] == 0 )
                                        {{ ('tempelkan kartu pada mesin') }}
                                    @endif
                                    @if($g['beras'] == 100 && $g['telur_beras'] == 100 && $g['telur'] == 100 )
                                        {{ ('sudah melakukan pengambilan') }}
                                    @endif
                                @endforeach </button>
                        </h2>
                    </div>
                </div>
                <div class="col-lg-6 align-self-end">
                    <div class="hero-image">
                        <img src="{{ asset('assets/lukmanab_2.png') }}" alt="lukmanab" height="600" width="800">
                    <!-- <img src="{{ asset('atmberas/assets/img/hero/hero-1/hero-img.svg') }}" alt="lukmanab" height="750" width="900"> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="shapes">
            <img src="{{ asset('atmberas/assets/img/hero/hero-1/shape-1.svg') }}" alt="" class="shape shape-1">
            <img src="{{ asset('atmberas/assets/img/hero/hero-1/shape-4.svg') }}" alt="" class="shape shape-4">
        </div>
    </div>
    </section>

@endsection
