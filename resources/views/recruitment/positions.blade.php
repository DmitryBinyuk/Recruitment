<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Positions</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/chosen.min.css')}}">
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/chosen.jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>

</head>
<body>
    <div id="wrapper">
        <div class="container">

            <select name="lorem" id="lor" class="select status_filter">
                <option value="all">Show All</option>
                <option value="open">Opened</option>
                <option value="closed">Closed</option>
            </select>

		<div class="positions_table_wrapper">
		    @if(count($positions)>0)
		    <table border="1" class="positions_table">

			<col width="12.5%" valign="top">
			<col width="12.5%" valign="top">
			<col width="12.5%" valign="top">
			<col width="12.5%" valign="top">
			<col width="12.5%" valign="top">
			<col width="37.5%" valign="top">

			<tr>
			    <th>Job name</th>
			    <th>Created</th>
			    <th>Status</th>
			    <th>Company</th>
			    <th>Recruiter</th>
			    <th>Email</th>
			</tr>
			@foreach ($positions as $position)
			    <tr>
				<td>{{$position->job_name}}</td>
				<td>{{ \Carbon\Carbon::parse($position->job_created)->format('d/m/Y') }}</td>
				<td>{{$position->status}}</td>
				<td>{{$position->company_name}}</td>
				<td>{{$position->name}}</td>
				<td>{{$position->email}}</td>
			    </tr>
			@endforeach

		    </table>
		    @else
			<p class="no_records">There are no positions</p>
		    @endif
		</div>
        </div>
    </div>
</body>
</html>