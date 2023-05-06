@extends('layouts.app')
@section('style')
    <link href="{{ URL::asset('css/bootstrap-datepicker.min.css'); }}" rel="stylesheet">
@endsection

@extends('layouts.admin-nav')
@section('bread-crumbs')
    <div class="h5">
        List item / New List
    </div>
@endsection
@section('content')
    <div class="container-fluid px-5">
        <div class="card border-0">
            <div class="card-body otta-fg">
                <div class="form-group pb-4">
                    <label for="period">Period</label>
                    @if (Route::currentRouteName() == 'admin.prize.edit')
                        @yield('period')
                    @else
                        <input type="number" class="form-control" id="period" name="period" placeholder="1000">
                    @endif
                </div>
                <div class="form-group pb-4">
                    <label for="firstDigit">First Number</label>
                    @if (Route::currentRouteName() == 'admin.prize.edit')
                        @yield('firstDigit')
                    @else                   
                        <input type="text" class="form-control" id="firstDigit" name="firstDigit" placeholder="1st Digit">
                    @endif
                </div>
                <div class="form-group pb-4">
                    <label for="secondDigit">Second Number</label>
                    @if (Route::currentRouteName() == 'admin.prize.edit')
                        @yield('secondDigit')
                    @else                   
                        <input type="text" class="form-control" id="secondDigit" name="secondDigit" placeholder="2nd Digit">
                    @endif
                </div>
                <div class="form-group pb-4">
                    <label for="thirdDigit">Third Number</label>
                    @if (Route::currentRouteName() == 'admin.prize.edit')
                        @yield('thirdDigit')
                    @else                   
                        <input type="text" class="form-control" id="thirdDigit" name="thirdDigit" placeholder="3rd Digit">
                    @endif
                </div>
                <div class="form-group pb-4">
                    <label for="setDate">Set Date</label>
                    <div class="input-group date" id="setDate" data-provide="datepicker">
                        @if (Route::currentRouteName() == 'admin.prize.edit')
                            @yield('setDate')
                        @else 
                            <input type="text" class="form-control" id="nsetDate">
                        @endif
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </div>
                <div class="btn-wrap py-4 pb-0 d-flex justify-content-end">
                    @if (Route::currentRouteName() == 'admin.prize.edit')
                        @yield('update-btn')
                    @else  
                        <button type="submit" class="btn btn-primary otta-submit">Submit</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script type="application/javascript">
        $(document).ready(function(){

            /** DatePicker Start*/
            $('#setDate').datepicker({
                format: 'yyyy-mm-dd'
            });
            /** DatePicker End*/

            $('.otta-fg input[type="text"]').on('keyup', function(e){
                e.preventDefault();
                let valNum = $(this);
                if(event.which !== 8 && event.which !== 0 && event.which < 48 || event.which > 57){
                    valNum.val('');
                    return false;
                }else{
                    numLimiter(valNum);
                }
            });
            /**Create Start*/
            $('.otta-submit').on('click', function(e){
                e.preventDefault();
                let _token = $('input[name="_token"]').val();
                let first_prize = $('#firstDigit').val();
                let second_prize = $('#secondDigit').val();
                let thrid_prize = $('#thirdDigit').val();
                let period = $('#period').val();
                let set_date = $('#nsetDate').val();
                let url = '/prize_list/store';
                let method = 'POST';
                let data = {
                    '_token': _token,
                    '_method': method,
                    'first_prize': first_prize,
                    'second_prize': second_prize,
                    'thrid_prize': thrid_prize,
                    'consolation_prize_id': '0',
                    'special_prize': '0',
                    'status': '1',
                    'period': period,
                    'set_date': set_date,
                }
                console.log(data)
                
                $.ajax({
                    type: method,
                    url: url,
                    data: data,
                    dataType: 'JSON',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    beforeSend: function () {
                        $('body').addClass('overflow-y-none');
                        $('.loader-wrap').show();
                    },
                    complete: function(){
                        //Hide loader
                        $('body').removeClass('overflow-y-none');
                        $('.loader-wrap').hide();
                    },
                    success:function(res){
                        if(res.status == 'success'){
                            customTooltips( 'success', res.message);
                            window.location.href="/prize_list";
                        }
                    }
                });
            });
            /**Create End*/

            /**Update Start*/
            $('.otta-update').on('click',function(e){
                e.preventDefault();
                let _token = $('input[name="_token"]').val();
                let id = $(this).attr('data-eid');
                let first_prize = $('#firstDigit').val();
                let second_prize = $('#secondDigit').val();
                let thrid_prize = $('#thirdDigit').val();
                let period = $('#period').val();
                let set_date = $('#setDate').val();
                let url = '/prize_list/' + id + '/update';
                let method = 'PUT';
                let data = {
                    '_token': _token,
                    '_method': method,
                    'id': id,
                    'first_prize': first_prize,
                    'second_prize': second_prize,
                    'thrid_prize': thrid_prize,
                    'status': '1',
                    'period': period,
                    'set_date': set_date,
                }
                $.ajax({
                    type: method,
                    url: url,
                    data: data,
                    dataType: 'JSON',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    beforeSend: function () {
                        $('body').addClass('overflow-y-none');
                        $('.loader-wrap').show();
                    },
                    complete: function(){
                        //Hide loader
                        $('body').removeClass('overflow-y-none');
                        $('.loader-wrap').hide();
                    },
                    success:function(res){
                        let status = (res.status === 'success') ? 'success':'danger';
                        customTooltips( status, res.message);
                    }
                });
            })
            /**Update End*/

        });
    </script>
@endsection
