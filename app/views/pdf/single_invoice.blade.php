@extends('pdf/page')

@section('body')

<table style="width:100%;" border="0">
      <tbody>

      	<tr >
          <td colspan="2" style="text-align:left;">
          	<h2>Delivery/Invoice Docket </h2>
          </td>
          <td colspan="2" style="text-align:right;">
          	<h2># {{ Format::code($data->id) }}</h2>
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
          	<strong>Billed To: </strong>
          </td>
          <td colspan="2" style="text-align:right;">
          	<strong>{{ $bakery->name }}</strong>
          </td>
        </tr>
        <tr >
          <td colspan="2" style="text-align:left;">
			{{ $data->customer->full_name }}
          </td>
          <td colspan="2" style="text-align:right;">
          	{{ $bakery->address }}
          </td>
        </tr>
        <tr >
          <td colspan="2" style="text-align:left;">
          	{{ $data->customer->invoice_address }}
          </td>
          <td colspan="2" style="text-align:right;">
          	{{ $bakery->phone_number }}
          </td>
        </tr>
        <tr >
          <td colspan="2" style="text-align:left;">
          	{{ $data->customer->email }}
          </td>
          <td colspan="2" style="text-align:right;">
			{{ $bakery->email }}
          </td>
        </tr>
        <tr >
          <td colspan="2" style="text-align:left;">
          	{{ $data->customer->phone_number }}
          </td>
          <td colspan="2" style="text-align:right;">
          	{{ $bakery->register_number }}
          </td>
        </tr>
        <tr >
          <td colspan="2" style="text-align:left;">
          	{{$data->customer->register_number }}
          </td>
          <td colspan="2" style="text-align:right;"></td>
        </tr>
        <tr>
        	<td style="height:30px;" ></td>
        	
        </tr>
        <tr >
          <td colspan="2" style="text-align:left;">
          	<strong>Shipped to:</strong>
          </td>
          <td colspan="2" style="text-align:right;">
          	<strong>Order date:</strong>
          </td>
        </tr>
        <tr >
          <td colspan="2" style="text-align:left;">
          	{{ $data->delivery_address }}
          </td>
          <td colspan="2" style="text-align:right;">
          	{{ $data->created_at }}
          </td>
        </tr>

                               
        <tr>
        	<td colspan="2" style="text-align:left;">
				Delivery date: {{ Format::date($data->delivery_date) }}
        	</td>
        	<td colspan="2" style="text-align:right;">
          @if($data->number)
           Purchase Order Number : {{ $data->number  }} 
           @endif
          </td>
        </tr>
      </tbody>
    </table>
	<br>
    <table style="width:100%;" class="summary">
    	<tr>
    		<td class="title" colspan="4" style="text-align:center;">
    			<h4>Order Summary</h4>
    		</td>
    	</tr>
    	<tr >
    		<td style="text-align:left; width:35%; ">
    				<strong>Item</strong>
    		</td>
    		<td style="width:20%;">
    			<center>
    				<strong>Price</strong>
    			</center>
    		</td>
    		<td style="width:20%;">
    			<center>
    				<strong>Quantity</strong>
    			</center>
    		</td>
    		<td style="text-align:right; width:25%;">
    			<strong>Total</strong>
    		</td>
    	</tr>
		<tr><td colspan="4" class="bb"></td></tr>

  @section('')
    {{ $sales = 0 }}
  @endsection
	@foreach($data->detail as $detail)
  @if($detail->type == 'sale')
    @section('')
      {{$sales = $sales + $detail->total_price}}
    @endsection
      	<tr>
      		<td style="text-align:left; width:35%; ">
      			{{ $detail->product->name }}
      		</td>
      		<td style="width:20%;">
      				<center> {{ $detail->single_price }} </center>
      		</td>
      		<td style="width:20%;">
      				<center>{{ $detail->quantity }}</center>
      		</td>
      		<td style="text-align:right; width:25%;">
      			{{ $detail->total_price }}
      		</td>
      	</tr>
  		<tr><td colspan="4" class="bb"></td></tr>
  @endif
  @endforeach

    @section('')
      {{ $return = 0 }}
    @endsection
    @foreach($data->detail as $detail)
    @if($detail->type == 'devolution')
      @section('')
        {{$return = $return + $detail->total_price}}
      @endsection
          <tr style="color:red;">
            <td style="text-align:left; width:35%; ">
              {{ $detail->product->name }}
            </td>
            <td style="width:20%;">
                <center> {{ $detail->single_price }} </center>
            </td>
            <td style="width:20%;">
                <center>{{ $detail->quantity }}</center>
            </td>
            <td style="text-align:right; width:25%;">
              {{ $detail->total_price }}
            </td>
          </tr>
        <tr><td colspan="4" class="bb"></td></tr>
    @endif
    @endforeach

    <tr>
      <td colspan="2"></td>
      <td style="text-align:center;">
        <strong>sub-Total</strong>
      </td>
      <td style="text-align:right;">{{ $sales + $return }}</td>
    </tr>

    <tr>
      <td colspan="2"></td>
      <td style="text-align:center;">
        <strong>Returned</strong>
      </td>
      <td style="text-align:right;">-{{ $return }}</td>
    </tr>

    <tr>
      <td colspan="2"></td>
      <td style="text-align:center;">
        <strong>sub-Total</strong>
      </td>
      <td style="text-align:right;">{{ $sales - $return }}</td>
    </tr>

    <tr>
      <td colspan="2"></td>
      <td style="text-align:center;">
        <strong>Vat @</strong>
      </td>
      <td style="text-align:right;"> 0 %</td>
    </tr>

    <tr>
      <td colspan="2"></td>
      <td style="text-align:center;">
        <strong>Total</strong>
      </td>
      <td style="text-align:right;">{{ $data->amount }} </td>
    </tr>

    </table>

	<hr>



@endsection