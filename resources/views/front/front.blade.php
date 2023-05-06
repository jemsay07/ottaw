@extends('front.index')
@section('front-content')
    <section id="drawResults" class="bg-c1 pt-5 bg-img">
        <div class="container">
            {{-- {{$current_date_time}} --}}
            @if (empty($grand_winner))
                <div class="h2 bold d-flex justify-content-center mb-5">Sorry, No Value!</div>
            @else
                <div class="title-wrap">
                    <div class="h4 title txt-uppercase bg-d8">Draw result as of</div>
                    <div class="h4 title txt-uppercase bg-d8 txt-11">{{date("M d, Y", strtotime($grand_winner->created_at)) }}</div>
                </div>
                <div class="grand-win mb-5">
                    <div class="col col-sm-12 col-md-12 col-lg-6 m-auto inner-box">
                        <div class="circle-wrap">
                            <div class="circle gslots_item_0 bg-main bg-grand d-flex flex-center">
                                <span>{{$grand_winner->first_prize}}</span>
                            </div>
                            <div class="prize-info">
                                <span class="bg-d8">1st Prize</span>
                            </div>
                        </div>
                        <div class="circle-wrap">
                            <div class="circle gslots_item_1 bg-main bg-grand d-flex flex-center">
                                <span>{{$grand_winner->second_prize}}</span>
                            </div>
                            <div class="prize-info">
                                <span class="bg-d8">2nd Prize</span>
                            </div>
                        </div>
                        <div class="circle-wrap">
                            <div class="circle gslots_item_2 bg-main bg-grand d-flex flex-center">
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
                    <div class="bg-trans inner-box rounded p-5 bs-shadow-1">
                        <div class="title-wrap">
                            <div class="h3 title txt-uppercase">Special Prize</div>
                        </div>
                        <div class="special-prze">
                            {{-- @if (empty($special))
                            <div class="h4 bold d-flex justify-content-center mb-5">Sorry, No Value!</div>
                            @else --}}
                            <div class="circle-wrap d-flex flex-row flex-wrap gap-3">
                                <div class="circle slots_item_0 w-145 bg-cons bg-1 d-flex flex-center">
                                    <span>
                                        @if (empty($special))
                                            0000
                                        @else
                                            {{$special->first_digit}}
                                        @endif
                                    </span>
                                </div>
                                <div class="circle slots_item_1 w-145 bg-cons bg-2 d-flex flex-center">
                                    <span>
                                        @if (empty($special))
                                            0000
                                        @else
                                            {{$special->second_digit}}
                                        @endif
                                    </span>
                                </div>
                                <div class="circle slots_item_2 w-145 bg-cons bg-1 d-flex flex-center">
                                    <span>
                                        @if (empty($special))
                                            0000
                                        @else
                                            {{$special->thrid_digit}}
                                        @endif
                                    </span>
                                </div>
                                <div class="circle slots_item_3 w-145 bg-cons bg-2 d-flex flex-center">
                                    <span>
                                        @if (empty($special))
                                            0000
                                        @else
                                            {{$special->fourth_digit}}
                                        @endif
                                    </span>
                                </div>
                                <div class="circle slots_item_4 w-145 bg-cons bg-1 d-flex flex-center">
                                    <span>
                                        @if (empty($special))
                                            0000
                                        @else
                                            {{$special->fifth_digit}}
                                        @endif
                                    </span>
                                </div>
                                <div class="circle slots_item_5 w-145 bg-cons bg-2 d-flex flex-center">
                                    <span>
                                        @if (empty($special))
                                            0000
                                        @else
                                            {{$special->six_digit}}
                                        @endif
                                    </span>
                                </div>
                            </div>
                            {{-- @endif --}}
                        </div>
                    </div>
                </div>
                <div class="col col-sm-12 col-md-12 col-lg-6">
                    <div class="bg-trans inner-box rounded p-5 bs-shadow-1">
                        <div class="title-wrap">
                            <div class="h3 title txt-uppercase">Consulation Prize</div>
                        </div>
                        <div class="consulation-prze">
                            {{-- @if (empty($consolation))
                                <div class="h4 bold d-flex justify-content-center mb-5">Sorry, No Value!</div>
                            @else --}}
                                <div class="circle-wrap d-flex flex-row flex-wrap gap-3">
                                    <div class="circle slots_item_6 w-145 bg-cons bg-1 d-flex flex-center">
                                        <span>
                                            @if (empty($consolation))
                                                0000
                                            @else
                                                {{$consolation->first_digit}}
                                            @endif
                                        </span>
                                    </div>
                                    <div class="circle slots_item_7 w-145 bg-cons bg-2 d-flex flex-center">
                                        <span>
                                            @if (empty($consolation))
                                                0000
                                            @else
                                                {{$consolation->second_digit}}
                                            @endif
                                        </span>
                                    </div>
                                    <div class="circle slots_item_8 w-145 bg-cons bg-1 d-flex flex-center">
                                        <span>
                                            @if (empty($consolation))
                                                0000
                                            @else
                                                {{$consolation->thrid_digit}}
                                            @endif
                                        </span>
                                    </div>
                                    <div class="circle slots_item_9 w-145 bg-cons bg-2 d-flex flex-center">
                                        <span>
                                            @if (empty($consolation))
                                                0000
                                            @else
                                                {{$consolation->fourth_digit}}
                                            @endif
                                        </span>
                                    </div>
                                    <div class="circle slots_item_10 w-145 bg-cons bg-1 d-flex flex-center">
                                        <span>
                                            @if (empty($consolation))
                                                0000
                                            @else
                                                {{$consolation->fifth_digit}}
                                            @endif
                                        </span>
                                    </div>
                                    <div class="circle slots_item_11 w-145 bg-cons bg-2 d-flex flex-center">
                                        <span>
                                            @if (empty($consolation))
                                                0000
                                            @else
                                                {{$consolation->six_digit}}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            {{-- @endif --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="TableList">
        <div class="container">
            <div class="table-responsive">
                <table class="table bg-white">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Days</th>
                            <th scope="col">Prize 1</th>
                            <th scope="col">Prize 2</th>
                            <th scope="col">Prize 3</th>
                            <th scope="col">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (empty($tbl_prize))
                        SDFSDFSDF
                            <tr>
                                <td colspan="5">
                                    <div class="h2 bold d-flex justify-content-center mb-5">Sorry, No Value!</div>
                                </td>
                            </tr>
                        @else
                            @foreach ($tbl_prize as $tbl_item) 
                                @php
                                    $days = date("N", strtotime($tbl_item->created_at));
                                    $day = '';
                                    switch ($days) {
                                    case '2':
                                        $day = 'Tuesday';
                                        break;
                                    case '3':
                                        $day = 'Wednesday';
                                        break;
                                    case '4':
                                        $day = 'Thursday';
                                        break;
                                    case '5':
                                        $day = 'Friday';
                                        break;
                                    case '6':
                                        $day = 'Saturday';
                                        break;
                                    case '7':
                                        $day = 'Sunday';
                                        break;
                                    default:
                                        $day = 'Monday';
                                        break;
                                    }
                                @endphp
                                <tr>
                                    <td>{{date("Y-m-d", strtotime($tbl_item->created_at)) }}</td>
                                    <td>{{$day}}</td>
                                    <td>{{$tbl_item->first_prize}}</td>
                                    <td>{{$tbl_item->second_prize}}</td>
                                    <td>{{$tbl_item->thrid_prize}}</td>
                                    <td>
                                        <a href="/{{$tbl_item->id}}/result-detail">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection