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
                        <center><h2 class="col-lg-8">Jumlah Pengambilan : <button class="button button-lg radius-50">
                                @foreach($get_data_all as $g)
                                    @if($g['status_waktu_pengambilan'] != 'N' )
                                            @if($g['beras'] !=0)
                                                @if($g['beras'] <=3 )
                                                    {{ $g['beras'] }}{{ (' liter beras ') }}
                                                @endif
                                            @endif
                                            @if($g['telur_beras'] && $g['telur'] !=0)
                                                @if($g['telur_beras'] <=3 && $g['telur'] <=9)
                                                    <div class="flash-data" data-flashdata="{{ $g['telur_beras']}}{{ __(' liter beras ') }} {{ $g['telur']}}{{ __(' butir telur') }}"></div>
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
