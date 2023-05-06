{{-- @extends('layouts.app')
@extends('layouts.admin-nav') --}}
@extends('admin.prize.create')

@section('bread-crumbs')
    <div class="h5">
        List item / Edit
    </div>
@endsection
@section('period')
    <input type="number" class="form-control" id="period" minlength="4" placeholder="1000" value="{{ $list_item->period }}" disabled>
@endsection
@section('firstDigit')
    <input type="number" class="form-control" id="firstDigit" minlength="4" maxlength="4"  placeholder="1st Digit" value="{{ $list_item->first_prize }}">
@endsection

@section('secondDigit')
    <input type="number" class="form-control" id="secondDigit" minlength="4" maxlength="4"  placeholder="2nd Digit" value="{{ $list_item->second_prize }}">
@endsection

@section('thirdDigit')
    <input type="number" class="form-control" id="thirdDigit" minlength="4" maxlength="4"  placeholder="3rd Digit" value="{{ $list_item->first_prize }}">
@endsection

@section('setDate')
    <input type="textx" class="form-control" id="nsetDate" value="{{ $list_item->set_date }}">
@endsection



@section('update-btn')
    <button type="submit" class="btn btn-primary otta-update" data-eid="{{ $list_item->id }}">Update</button>
@endsection