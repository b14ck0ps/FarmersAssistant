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
<h1>Registration</h1>
<form action="/reg" method="post">
@csrf

<span><b>Fisrt Name</b></span> <input type="text" name="fname">

@if($errors->has('fname'))
<b>{{$errors->first('fname')}}</b>
@endif
<br><br>

<span><b>Last Name</b></span> <input type="text" name="lname">
@if($errors->has('lname'))
<b>{{$errors->first('lname')}}</b>
@endif
<br><br>

<span><b>User Name</b></span> <input type="text" name="username">
@if($errors->has('username'))
<b>{{$errors->first('username')}}</b>
@endif
<br><br>

<span><b>Postalcode</b></span> <input type="text" name="postalcode">
@if($errors->has('postalcode'))
<b>{{$errors->first('postalcode')}}</b>
@endif
<br><br>

<span><b>City</b></span> <input type="text" name="city">
@if($errors->has('city'))
<b>{{$errors->first('city')}}</b>
@endif
<br><br>

<span><b>Gender</b></span>
<input type="radio" name="gender" value="Male">Male
<input type="radio" name="gender" value="Female">Female
@if($errors->has('gender'))
<b>{{$errors->first('gender')}}</b>
@endif
<br><br>

<span><b>Date of birth</b></span> <input type="date" name="dob">
@if($errors->has('dob'))
<b>{{$errors->first('dob')}}</b>
@endif
<br><br>



<span><b>Address</b></span>
<textarea id="address" name="address" rows="4" cols="20"></textarea>
@if($errors->has('address'))
<b>{{$errors->first('address')}}</b>
@endif
<br><br>

<span><b>Email</b></span> <input type="email" name="email">
@if($errors->has('email'))
<b>{{$errors->first('email')}}</b>
@endif
<br><br>

<span><b>Phone</b></span> <input type="text" name="phone">
@if($errors->has('phone'))
<b>{{$errors->first('phone')}}</b>
@endif
<br><br>


<span><b>Password</b></span> <input type="password" name="password">
@if($errors->has('password'))
<b>{{$errors->first('password')}}</b>
@endif
<br><br>
<span><b>Confirm Password</b></span> <input type="password" name="password_confirmation">
@if($errors->has('password'))
<b>{{$errors->first('password')}}</b>
@endif
<br><br>
<button type="submit" class="">Submit</button>

</form>
</div>
</body>



