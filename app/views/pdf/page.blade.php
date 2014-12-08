<html>
<head>
	{{ header('Content-type: application/pdf') }}
	<link href="{{ asset('../bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

	  <style type="text/css">
	    .bb{
	     border-bottom: 1px solid #ddd !important;
	    }

	    .summary{
	    	border: 0.2px solid #ddd !important;
	    	
	    }
	    h4{
	    	margin: 8px;
	    }
	    .title{
	    	background-color: #f5f5f5;
	    	border-bottom: 1px solid #ddd !important;	
	    }
	    tr.bbt td {
		  border-bottom:1pt solid black;
		}
		body {
		  font-family: "sans-serif", serif;
		  font-size: 15px;
		}     
		hr {
		  page-break-after: always;
		  border: 0;
		  margin: 0;
		  padding: 0;
		}
	  </style>
	

</head>

<body>

@yield('body')


</body>
</html>
