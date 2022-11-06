<!DOCTYPE html>
<html>
<head>
<style>
.center{
        margin: auto;
        height: 600px;
        width: 600px;
        border: 3px solid #15c8eb;
        padding: 10px;
    }
    span{
        display: inline-block;
        width: 80px;
        text-align: 3px solid #fdffff;
    }

    body {background-color: rgba(147, 244, 11, 0.3);}



body {
  background-color: #333396;
}

</style>
</head>
<body>

<div class="center">
<h1 style="color: #fdffff">Product Update</h1>
<form action="/updateproductsubmit" method="post" enctype="multipart/form-data">
@csrf
    @foreach ($usetable as $usetable)
    <span style="color:rgb(248, 248, 248)"><b></b></span> <input type="hidden" name="id" value="{{ $usetable['id']}}" readonly><br><br>
    <span style="color:rgb(248, 248, 248)"><b>Title</b></span> <input type="text" name="title" value="{{ $usetable['title']}}"><br><br>
    <span style="color:rgb(248, 248, 248)"><b>Drescription</b></span> <input type="text" name="description" value="{{ $usetable['description']}}"><br><br>
    <span style="color:rgb(248, 248, 248)"><b>Quantity</b></span> <input type="text" name="quantity" value="{{ $usetable['quantity']}}"><br><br>
    <span style="color:rgb(248, 248, 248)"><b>Price</b></span> <input type="text" name="price" value="{{ $usetable['price']}}"><br><br>
    <span style="color:rgb(248, 248, 248)"><b>Select Image</b></span> <input type="file" name="image"><image height="40px" width="40px" src="{{ asset('uploads/product/'.$usetable['image']) }}""><br><br>
    @endforeach

    <button type="submit" style="color: #032160">Submit</a></button>
    <button><a href="/admin/profile">Back to Dashboard</a></button>
</div>

</body>
</html>
