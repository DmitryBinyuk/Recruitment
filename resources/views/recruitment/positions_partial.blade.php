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