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

<a href="{{ route('create_office') }}" class="button">Add Flight</a>


<table>
  <tr>
    <th>Name</th>
    <th>F code</th>
    <th>id</th>
    <th>اعدادات</th>
    <th> تاريخ الحذف</th>
  </tr>
  @if(@isset($data_office) and !@empty($data_office)) 
  @foreach ($data_office as $office)

  <tr>
    <td>{{$office->title}}</td>
    <td>{{$office->description}}</td>
    <td>{{$office->id}}</td>
    <td> 
      <a href="{{ route('edit_office', $office->id) }}">تعديل</a>
    &nbsp;|&nbsp;
    @if(!$office->deleted_at)

      <a href="{{ route('delete_office', $office->id) }}" onclick="return confirm('Are you sure?')"> حذف </a>
      @else
     
      <a href="{{ route('delete_office', $office->id) }}" style="color: red;" onclick="return confirm('Are you sure?')"> استرجاع </a>
      
      @endif
      &nbsp;|&nbsp;
      <a href="{{ route('final_delete_office', $office->id) }}" onclick="return confirm('Are you sure?')"> حذف نهائي </a>
      
    </td>
    <td>
      @if($office->deleted_at)
      {{$office->deleted_at}}
      @else
      لا يوجد تاريخ حذف
      @endif
  </tr>

 
  
  @endforeach

  @endif


  
  
</table>

{{-- $data_office->links() --}}

</body>
</html>


