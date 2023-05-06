@extends('layouts.app')
@extends('layouts.admin-nav')

@section('bread-crumbs')
    <div class="h5">
        Reset Password
    </div>
@endsection

@section('content')
    <div class="container-fluid px-5">
        <div id="ottaToolTips"></div>
        <div class="card border-0">
            <div class="card-body reset-fg m-auto p-5" style="width:800px;">
                <div class="form-group pb-4">
                    <label for="new_password">{{ __('New Password') }}</label>
                    <input type="text" class="form-control wer" id="new_password" name="new_password" required autocomplete="new-password">
                </div>
                <div class="form-group pb-4">
                    <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                    <input type="text" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="btn-wrap py-4 pb-0 d-flex justify-content-end">
                    <button class="btn btn-primary reset-submit">Submit</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="application/javascript">
        $(document).ready(function(){
            const comparePass = (newP,confirm) => {
                let pattern1 = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
                let args = [];
                let status;
                let message = '';
                if(newP != '' && confirm != ''){
                    if(newP==confirm){
                        if(newP.length < 8 || confirm.length < 8){
                            message = 'Your password must be at least 8 characters';
                            status = 'false';
                        }
                        status = 'true';
                    }else{
                        message = 'Confirm password is not same as you new password.';
                        status = 'false';
                    }
                }else{
                    message = 'All Fields Are Required';
                    status = 'false';
                }

                return message;
            }

            $('.reset-submit').on('click', function(e){
                e.preventDefault();
                let newP = document.getElementById('new_password').value;
                let confirm = document.getElementById('password_confirmation').value;
                let validation = comparePass(newP,confirm);
                
                if(validation.length > 0){
                    customTooltips( 'danger', validation);
                }else{
                    let _token = $('input[name="_token"]').val();
                    let method = 'PUT';
                    let url = '/reset/update';
                    let data = {
                        '_token': _token,
                        '_method': method,
                        'password': newP
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
                }
            });
        });
    </script>
@endsection