@extends('pdf/page')

@section('body')

<table style="width:100%;" border="0">
      <tbody>

      	<tr >
          <td colspan="2" style="text-align:left;">
          	<h2>Summary </h2>
          </td>
          <td colspan="2" style="text-align:right;">
          	<strong>From {{ Format::date($from) }} to {{ Format::date($to) }} </strong>
          </td>
        </tr>
        <tr >
        	<td class="bb" colspan="4"></td>
        </tr>
        <tr >
        	<td  colspan="4" style="height:10px;"></td>
        </tr>
        <tr >
          <td colspan="2" style="text-align:left;">
          	<strong># {{ Format::code($report_id) }}</strong>
          </td>
          <td colspan="2" style="text-align:right;">
          	<strong>{{ $bakery->name }}</strong>
          </td>
        </tr>
        <tr >
          <td colspan="2" style="text-align:left;">
			
          </td>
          <td colspan="2" style="text-align:right;">
          	{{ $bakery->address }}
          </td>
        </tr>
        <tr >
          <td colspan="2" style="text-align:left;">
          	
          </td>
          <td colspan="2" style="text-align:right;">
          	{{ $bakery->phone_number }}
          </td>
        </tr>
        <tr >
          <td colspan="2" style="text-align:left;">
          	
          </td>
          <td colspan="2" style="text-align:right;">
			{{ $bakery->email }}
          </td>
        </tr>
        <tr >
          <td colspan="2" style="text-align:left;">
          	
          </td>
          <td colspan="2" style="text-align:right;">
          	{{ $bakery->register_number }}
          </td>
        </tr>
        <tr >
          <td colspan="2" style="text-align:left;">
          	
          </td>
          <td colspan="2" style="text-align:right;"></td>
        </tr>
        <tr>
        	<td style="height:30px;" ></td>
        	
        </tr>

      </tbody>
    </table>
	<br>
    <table style="width:100%;" class="summary">
    	<tr>
    		<td class="title" colspan="5" style="text-align:center;">
    			<h4>Orders list</h4>
    		</td>
    	</tr>
    	<tr >
    		<td style="text-align:left; width:25%; ">
    				<strong>Order</strong>
    		</td>
    		<td style="width:20%;">
    			<center>
    				<strong>Created at</strong>
    			</center>
    		</td>
    		<td style="width:20%;">
    			<center>
    				<strong>Customer</strong>
    			</center>
    		</td>
    		<td style="text-align:right; width:25%;">
    			<center><strong>Payment</strong></center>
    			
    		</td>
    		<td style="text-align:right; width:25%;">
    			<strong>Amount</strong>
    		</td>
    	</tr>
		<tr><td colspan="5" class="bb"></td></tr>

		@foreach($orders as $order)

    	<tr >
    		<td style="text-align:left; width:25%; ">
    				#{{ Format::code($order->id) }}
    		</td>
    		<td style="width:20%;">
    			<center>
    				<strong>{{ Format::date($order->created_at) }}</strong>
    			</center>
    		</td>
    		<td style="width:20%;">
    			<center>
    				{{ $order->customer->full_name }}
    			</center>
    		</td>
    		<td style="text-align:right; width:25%;">
    			{{ $order->payment }}
    		</td>
    		<td style="text-align:right; width:25%;">
    			{{ $order->amount }}
    		</td>
    	</tr>
		<tr><td colspan="5" class="bb"></td></tr>
		@endforeach

		<tr>
			<td colspan="3"></td>
			<td style="text-align:center;">
				<strong>Total</strong>
			</td>
			<td style="text-align:right;">{{ $total }}</td>
		</tr>

    </table>

	<hr>



@endsection