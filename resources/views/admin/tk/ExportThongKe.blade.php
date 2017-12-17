<!DOCTYPE html>
<html>
<head>
	<title>Export Thống Kê</title>
</head>
<body>
	<table>
		<tr>
			<th colspan="4">{{$title}}</th>
		</tr>
		<tr>
			<td>{{$type}}</td>
			@foreach($noun as $n)
			<td>{{$n}}</td>
			@endforeach
		</tr>
		
		
		<tr>
			<td>{{$label}}</td>
			@foreach($val as $v)
			@if(empty($v) == TRUE)
				<td>0</td>
			@else
				<td>{{$v}}</td>
			@endif			

			@endforeach
		</tr>
		
	</table>
</body>
</html>