@extends('layout')

@section('content')



<div class="container">


  <h2>Orders List</h2>
  <p>
    {{ Form::open(['route' => 'report/generate/save', 'method' => 'POST', 'role' => 'form', 'class' => 'navbar-form navbar-left']) }}
        
      <div class="form-group">
        {{ Field::date('from') }}
      </div>
      <div class="form-group">
        {{ Field::date('to') }}
      </div>
      <div class="form-group">
          {{ Field::select('payment', ['all' => 'all', 'paid' => 'paid', 'pending payment' => 'pending payment' ]) }}
      </div>
      <button type="submit" class="btn btn-success">Save</button>
    {{ Form::close() }}
  </p>
  <table class="table table-striped table-bordered">
    <thead>
    <tr>
      <th>Id</th>
      <th>From</th>
      <th>To</th>
      <th>Payment</th>
      <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($list as $report)
      <tr>
        <td>
          <strong>
            #{{ Format::code($report->id) }}
          </strong>
        </td>
        <td>{{ Format::date($report->from) }}</td>
        <td>{{ Format::date($report->to) }}</td>
        <td>{{ $report->payment }}</td>
        <td>
          <div class="btn-group" role="group">
            <a href="{{ route('report/generate/confirm', [$report->id]) }}" class="btn btn-xs btn-danger">
            delete
            </a>
            <a href="{{ route('report/generate/print', [$report->from, $report->to, $report->id, $report->payment]) }}" class="btn btn-xs btn-info">
            print
            </a>
          </div>
        </td>
      </tr>
    @endforeach

    </tbody>
  </table>



  {{ $list->links() }}



</div>
@stop