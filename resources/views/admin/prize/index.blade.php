@extends('layouts.app')
@extends('layouts.admin-nav')

@section('bread-crumbs')
    <div class="h5">
        List All Prize
    </div>
@endsection

@section('content')
    <div class="container-fluid px-5">
        <div id="ottaToolTips"></div>
        <div class="card border-0">
            <div class="card-body">
                {{-- <div class="h6 pb-2">List All Prize</div> --}}
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                          <th scope="col" style="text-align:center">No</th>
                          <th scope="col">Day</th>
                          <th scope="col">Date</th>
                          <th scope="col">Period</th>
                          <th scope="col">1st Prize</th>
                          <th scope="col">2nd Prize</th>
                          <th scope="col">3rd Prize</th>
                          <th scope="col" style="width:10%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      @if ($list->count() > 0 )
                      @php $n = 1; @endphp
                      @foreach ($list as $item)
                        @php
                            $days = date("N", strtotime($item->set_date));
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
                          <tr id="tr-{{$item->id}}">
                            <th scope="row" style="text-align:center">{{$item->id}}</th>
                            <td>{{ $day }}</td>
                            <td>{{date("Y-m-d", strtotime($item->set_date)) }}</td>
                            <td>{{$item->period}}</td>
                            <td>{{$item->first_prize}}</td>
                            <td>{{$item->second_prize}}</td>
                            <td>{{$item->thrid_prize}}</td>
                            <td style="width:10%">
                                <a href="prize_list/{{$item->id}}/edit" class="btn btn-primary list-edit" data-eid="{{$item->id}}">Edit</a>
                                <button class="btn btn-danger list-delete"  data-did="{{$item->id}}">Delete</button>
                            </td>
                          </tr>
                          @php $n++; @endphp
                        @endforeach
                      @endif
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
  <script type="application/javascript">
    $(document).ready(function(){
      $('.list-delete').on('click', function(e){
        e.preventDefault();
        let _token = $('input[name="_token"]').val();
        let id = $(this).attr('data-did');;
        let url = '/prize_list/trash';
        let method = 'PUT';
        let data = {
            '_token': _token,
            '_method': method,
            'id': id,
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
              if(res.status === 'Success'){
                let list = res.list;
                let count = 1;
                let table = $('table.table > tbody');
                customTooltips( 'danger', res.message);
                
                list.forEach(element => {
                  $(this).find('th').text(element.id);
                });

                // table.find('tr').each(function(){
                //   $(this).find('th').text(count);
                //   count++;
                // });
                $('#tr-' + res.id).remove();
              }
            }
        });
      });
    });
  </script>
@endsection