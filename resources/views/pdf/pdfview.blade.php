<!DOCTYPE html>
<html>
<head>
	<title>User list - PDF</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<a href="{{ route('generate_pdf',['download'=>'pdf']) }}">Download PDF</a>
	<table class="table">
		<thead>
			<th>Name</th>
			<th>Email</th>
			<th>phone no</th>
			<th>city</th>
			<th>state</th>
			<th>zipcode</th>
		</thead>
		<tbody>
			@foreach ($users as $key => $value)
			<tr>
				<td>{{ $value->name }}</td>
				<td>{{ $value->email }}</td>
				<td>{{ $value->phone_no }}</td>
				<td>{{ $value->city }}</td>
				<td>{{ $value->state }}</td>
				<td>{{ $value->zip_code }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
</body>
</html>