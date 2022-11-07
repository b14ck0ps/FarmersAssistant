<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid;
}
.center{
        margin: auto;
        height: 800px;
        width: 750px;
        border: 3px solid #a1f5f5;
        padding: 10px;
    }
    body {
  background-color: #333396;
}
span{
        display: inline-block;
        width: 100px;
        text-align: 3px solid #fdffff;
    }

    .button{
    text-align: center;
width: 600px;
height: 500px;
padding-top: 80px;

}
.button1 {
    background-color: #36ef42;
    margin:auto;
  display:block;

    }

    .button2 {
    background-color: #f44b31;
    margin:auto;
  display:block;

    }
</style>
</head>
<body>;
<div class="center">
<h2><span style="color: #fdffff">All Product</span></h2>

<table>
  <tr>
    <th><span style="color: #fdffff">Title</span></th><br>
    <th><span style="color: #fdffff">Drescription</span></th>
    <th><span style="color: #fdffff">Quantity</span></th>
    <th><span style="color: #fdffff">Price</span></th>
    <th><span style="color: #fdffff">Image</span></th>
    <th><span style="color: #fdffff">Edit</span></th>
    <th><span style="color: #fdffff">Delete</span></th>
  </tr>
  @foreach ($usetable as $usetable)
  <tr>
    <td><span style="color: #fdffff">{{ $usetable['title'] }}</span></td>
    <td><span style="color: #fdffff">{{ $usetable['description'] }}</span></td>
    <td><span style="color: #fdffff">{{ $usetable['quantity'] }}</span></td>
    <td><span style="color: #fdffff">{{ $usetable['price'] }}</span></td>
    <td><span style="color: #fdffff"><image height="40px" width="40px" src="{{ asset('uploads/product/'.$usetable['image']) }}"></span></td>
    <td><button class="button1"><a href="/updateproduct/{{ $usetable['id'] }}">Update</a></button></td>
    <td><button class="button2"><a href="/deleteproduct/{{ $usetable['id'] }}">Delete</a></button></td>
  </tr>
  @endforeach


</table>
<div class="button">
     <button><a href="/admin/profile">Back to Dashboard</a></button>
</div>
</div>
</body>
</html>
