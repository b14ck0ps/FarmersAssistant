<style>
    .center{
        margin: auto;
        width: 600px;
        border: 3px solid #15c8eb;
        padding: 10px;
    }
    span{
        display: inline-block;
        width: 80px;
    }
    body {background-color: rgb(31, 41, 55);}
    </style>

<br>
<br>
<br>

<body>
<div class='center'>
<h1 style="color: white">Create a product</h1>
<form action="/productsubmit" method="post" enctype="multipart/form-data">
@csrf
<span style="color:rgb(248, 248, 248)"><b></b></span> <input type="hidden" name="admin_id" value="{{ auth()->user()->id }}"readonly><br><br>

<span style="color: white"><b>Title</b></span> <input type="text" name="title"><br><br>


<span style="color: white"><b>Description</b></span> <input type="text" name="description">
<br><br>

{{-- <div class="from mb-3">
<label for="">Image</label>
<input type="file" name="image" class="form-control">
</div> --}}

<span style="color: white"><b>Image</b></span> <input type="file" name="image">
<br><br>

<span style="color: white"><b>Quantity</b></span> <input type="text" name="quantity">
<br><br>

<span style="color: white"><b>Price</b></span> <input type="text" name="price">
<br><br>

<button type="submit" class="">Submit</button>

</form>
</div>
</body>
