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
<h1 style="color: white">Create a plan</h1>
<form action="/plan_submit" method="post">
@csrf
<span style="color:rgb(248, 248, 248)"><b></b></span> <input type="hidden" name="admin_id" value="{{ auth()->user()->id }}"readonly><br><br>

<span style="color: white"><b>Plan Name</b></span> <input type="text" name="planName"><br><br>


<span style="color: white"><b>Description</b></span> <input type="text" name="description">
<br><br>


<span style="color: white"><b>Price</b></span> <input type="text" name="price">
<br><br>

<span style="color: white"><b>Order Discount</b></span> <input type="text" name="orderDiscount">
<br><br>

<button type="submit" class="">Submit</button>
<button type="submit" class=""><a href="/admin/profile">Back to dashboard</a></button>
</form>
</div>
</body>

