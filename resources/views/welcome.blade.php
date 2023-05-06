<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ottawa4d</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="../css/app.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="bg-main">
    <main class="ottawada-main">
        <header class="main-header">
            <div class="container d-flex">
                <div class="col col-sm-12 col-md-12 col-lg-4">
                   <img src="/images/bg/imgpsh_fullsize_anim.png" alt="">
                </div>
                <div class="col col-sm-12 col-md-12 col-lg-8">
                    <div class="top">Live Draw Time: GMT -7</div>
                    <div class="inner-text pb-5 pt-3">
                        <h3>Play to win</h3>
                        <span class="desc">if won the lottery, the first thing I would do is...</span>
                    </div>
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                              <a class="nav-link" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#">Result</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#">About us</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#">Contact us</a>
                            </li>
                          </ul>
                        </div>
                      </nav>
                </div>
            </div>
        </header>
        <section id="drawResults" class="bg-c1 pt-5 bg-img">
            <div class="container">
                @if ($grand_winner->count()  > 0)
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
                                @if ($special->count()  > 0)
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
                                @if ($consolation->count()  > 0)
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
        <section id="TableList">
            <div class="container">
                <div class="table-responsive">
                    @if ($tbl_prize->count()  > 0)
                        <table class="table bg-white">                    
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">days</th>
                                <th scope="col">date</th>
                                <th scope="col">period</th>
                                <th scope="col">prize</th>
                                <th scope="col">All prize</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                        <td>{{$day}}</td>
                                        <td>{{date("Y-m-d", strtotime($tbl_item->created_at)) }}</td>
                                        <td>2018</td>
                                        <td>{{$tbl_item->first_prize}}</td>
                                        <td>
                                            <a href="/{{$tbl_item->id}}/result-detail">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </section>
    </main>
</body>
</html>