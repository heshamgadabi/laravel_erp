<!DOCTYPE html>
<html>
<style>
form {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

label {display: block;}

input[type=text], select {
  width: 100%;
  padding: 12px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.is-invalid  {
    border-color: red !important;
    background: #abd66b;
}

</style>
<body>

<h2>Create Office</h2>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div style="width: 50%;">
<form action="{{ route('save_office') }}" method="post">
  @csrf
  <label for="fname">Title</label>
  <input type="text" value="{{ old('title') }}" id="fname" name="title" class="@error('title') is-invalid @enderror" placeholder="Your name.." >

  @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

  <label for="lname">Description</label>
  <input type="text" value="{{ old('description') }}" id="lname" name="description" class="@error('description') is-invalid @enderror" placeholder="Your last name..">
  @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  <label for="country">Country</label>
  <select id="country" name="country">
    <option value="australia">Australia</option>
    <option value="canada">Canada</option>
    <option value="usa">USA</option>
  </select>
  
  <input type="submit" value="Submit">
</form>
</div>

</body>
</html>


