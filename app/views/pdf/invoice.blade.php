@extends('pdf/page')

@section('body')

<h2>{{ $data }}</h2>

<table class="table" style="width:100%;" border="1">
      <tbody>
        <tr >
          <td colspan="2" style="text-align:left;">
          	<strong>Billed To: </strong>
          </td>
          <td colspan="2" style="text-align:right;">
          	<strong>Bakery</strong>
          </td>
        </tr>
        <tr >
          <td colspan="2" style="text-align:left;">
			customer
          </td>
          <td colspan="2" style="text-align:right;">
          	bakery address
          </td>
        </tr>
        <tr >
          <td colspan="2" style="text-align:left;">
          	Customer address
          </td>
          <td colspan="2" style="text-align:right;">
          	bakery phone
          </td>
        </tr>
        <tr >
          <td colspan="2" style="text-align:left;">
          	customer email
          </td>
          <td colspan="2" style="text-align:right;">
			bakery email
          </td>
        </tr>
        <tr >
          <td colspan="2" style="text-align:left;">
          	customer phone 
          </td>
          <td colspan="2" style="text-align:right;">
          	bakery register
          </td>
        </tr>
        <tr >
          <td colspan="2" style="text-align:left;">
          	customer register
          </td>
          <td colspan="2" style="text-align:right;"></td>
        </tr>
        <tr>
        	<td style="height:50px;"></td>
        	
        </tr>
        <tr>
        	<td colspan="2" style="text-align:right;">hola</td>
        	<td colspan="2" style="text-align:right;"></td>
        </tr>
      </tbody>
    </table>

@endsection