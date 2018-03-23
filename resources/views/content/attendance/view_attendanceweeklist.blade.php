@extends('layouts.master')
@section('content')
    <table id="weeklist" class="table table-bordered table-striped dataTable" >
        <thead>
        <tr>
            <th>Employee Name</th>

            <button class="add-row">Add Row</button>

        <tr/>
        <tr role="row">
            <th style="display:none">id</th>
            @foreach($sked as $s)
                <input type="hidden" name="scheduleid" value="{{$s['scheduleid']}}"/>
                <th>Week # {{$s['week_number']}}</th>
                <th>Year : {{$s['year_number']}}</th>
                <th>From : <input type="text" id="fromdate" value="{{$s['startdate']}}" contentEditable="false" style="border: none;"/></th>
                <th>To :<input type="text"  id="todate" value="{{$s['enddate']}}" contentEditable="false" style="border: none;"/> </th>
            @endforeach
            <th></th>
        </tr>
        <tr role="row">
            <th>Employee Name</th>
            <th>Option</th>
        </tr>
        </tr>
        </thead>


        <tbody>
        @foreach($data as $d)
        <tr>

            <td>{{$d['partyid']}}</td>
            <td>{{$d['givenname']}} {{$d['familyname']}}</td>
        </tr>
            @endforeach

        </tbody>
    </table>







@stop