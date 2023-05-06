@extends('front.index')
@section('front-content')
<section id="drawResults" class="bg-c1 pt-5 bg-img">
    <div class="container">
        @if (!empty($grand_winner))
            <div class="title-wrap">
                <div class="h4 title txt-uppercase bg-d8">Draw result as of</div>
                <div class="h4 title txt-uppercase bg-d8 txt-11">{{date("M d, Y", strtotime($grand_winner->created_at)) }}</div>
            </div>
            <div class="grand-win mb-5">
                <div class="col col-sm-12 col-md-12 col-lg-6 m-auto inner-box">
                    <div class="circle-wrap">
                        <div class="circle bg-main d-flex flex-center">
                            <span>{{$grand_winner->first_prize}}</span>
                        </div>
                        <div class="prize-info">
                            <span class="bg-d8">1st Prize</span>
                        </div>
                    </div>
                    <div class="circle-wrap">
                        <div class="circle bg-main d-flex flex-center">
                            <span>{{$grand_winner->second_prize}}</span>
                        </div>
                        <div class="prize-info">
                            <span class="bg-d8">2nd Prize</span>
                        </div>
                    </div>
                    <div class="circle-wrap">
                        <div class="circle bg-main d-flex flex-center">
                            <span>{{$grand_winner->thrid_prize}}</span>
                        </div>
                        <div class="prize-info">
                            <span class="bg-d8">3rd Prize</span>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="container" id="grandConsulation">
        <div class="d-flex gap-5 justify-content-center">
            <div class="col col-sm-12 col-md-12 col-lg-6">
                <div class="bg-trans inner-box rounded p-5">
                    <div class="title-wrap">
                        <div class="h3 title txt-uppercase">Special Prize</div>
                    </div>
                    <div class="special-prze">
                        @if (!empty($special))
                            <div class="circle-wrap d-flex flex-row flex-wrap gap-3">
                                <div class="circle w-145 bg-c1 d-flex flex-center">
                                    <span>{{$special->first_digit}}</span>
                                </div>
                                <div class="circle w-145 bg-main d-flex flex-center">
                                    <span>{{$special->second_digit}}</span>
                                </div>
                                <div class="circle w-145 bg-c1 d-flex flex-center">
                                    <span>{{$special->thrid_digit}}</span>
                                </div>
                                <div class="circle w-145 bg-main d-flex flex-center">
                                    <span>{{$special->fourth_digit}}</span>
                                </div>
                                <div class="circle w-145 bg-c1 d-flex flex-center">
                                    <span>{{$special->fifth_digit}}</span>
                                </div>
                                <div class="circle w-145 bg-main d-flex flex-center">
                                    <span>{{$special->six_digit}}</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col col-sm-12 col-md-12 col-lg-6">
                <div class="bg-trans inner-box rounded p-5">
                    <div class="title-wrap">
                        <div class="h3 title txt-uppercase">Consulation Prize</div>
                    </div>
                    <div class="consulation-prze">
                        @if (!empty($consolation))
                            <div class="circle-wrap d-flex flex-row flex-wrap gap-3">
                                <div class="circle w-145 bg-c1 d-flex flex-center">
                                    <span>{{$consolation->first_digit}}</span>
                                </div>
                                <div class="circle w-145 bg-main d-flex flex-center">
                                    <span>{{$consolation->second_digit}}</span>
                                </div>
                                <div class="circle w-145 bg-c1 d-flex flex-center">
                                    <span>{{$consolation->thrid_digit}}</span>
                                </div>
                                <div class="circle w-145 bg-main d-flex flex-center">
                                    <span>{{$consolation->fourth_digit}}</span>
                                </div>
                                <div class="circle w-145 bg-c1 d-flex flex-center">
                                    <span>{{$consolation->fifth_digit}}</span>
                                </div>
                                <div class="circle w-145 bg-main d-flex flex-center">
                                    <span>{{$consolation->six_digit}}</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection