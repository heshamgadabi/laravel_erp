<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #ddd;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2;}

tr:hover {background-color: #ddd;}

th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}

.button {
  background-color: #04AA6D;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  float: right;
}
</style>
</head>
<body>

<h1 style="text-align: center;">A Flights Table
 

</h1>

<a href="{{ route('create_flight') }}" class="button">Add Flight</a>


<table>
  <tr>
    <th>Name</th>
    <th>F code</th>
    <th>Date</th>
  </tr>
  @if(@isset($data_flight) and !@empty($data_flight)) 
  @foreach ($data_flight as $flight)

  <tr>
    <td>{{$flight->name}}</td>
    <td>{{$flight->f_code}}</td>
    <td>{{$flight->created_at}}</td>
  </tr>

 
  
  @endforeach

  @endif


  
  
</table>

</body>
</html>


