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

<h1 style="text-align: center;">Offices Table
 

</h1>

<a href="{{ route('bill.create') }}" class="button">Add Bill</a>


<table>
  <tr>
    <th>Name</th>
    <th>F code</th>
    <th>id</th>
    <th>اعدادات</th>
  </tr>
  @if(@isset($bills) and !@empty($bills)) 
  @foreach ($bills as $bill)

  <tr>
    <td>{{$bill->name}}</td>
    <td>{{$bill->total}}</td>
    <td>{{$bill->id}}</td>
    <td> 
       <a href="{{ route('bill.edit', $bill->id) }}">تعديل</a>

        <form action="{{ route('bill.destroy', $bill->id) }}" method="post" style="display: inline-block;">
          @csrf
          @method('DELETE')
          <button type="submit" onclick="return confirm('Are you sure?')"> حذف </button>
        </form> 
      
     
    </td>
  </tr>

 
  
  @endforeach

  @endif


  
  
</table>

{{-- $data_office->links() --}}

</body>
</html>


