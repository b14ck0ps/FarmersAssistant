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
<span style="color: #ffffff"><h1>Registration</h1></span>
<form action="/admin/register" method="post">
@csrf

<span><b>Fisrt Name</b></span> <input type="text" name="fname">
@if($errors->has('firstName'))
<span style="color: #eb1515"><b>{{$errors->first('firstName')}}</b></span>
@endif
<br><br>

<span><b>Last Name</b></span> <input type="text" name="lastName">
@if($errors->has('lastName'))
<span style="color: #eb1515"><b>{{$errors->first('lastName')}}</b></span>
@endif
<br><br>

<span style="color: #ffffff"><b>User Name</b></span> <input type="text" name="username">
@if($errors->has('username'))
<span style="color: #eb1515"><b>{{$errors->first('username')}}</b></span>
@endif
<br><br>

<span><b>Zip-Code</b></span> <input type="number" name="postCode">
@if($errors->has('postalCode'))
<b>{{$errors->first('postalCode')}}</b>
@endif
<br><br>

<span style="color: #ffffff"><b>City</b></span> <input type="text" name="city">
@if($errors->has('city'))
<span style="color: #eb1515"><b>{{$errors->first('city')}}</b></span>
@endif
<br><br>

<span style="color: #ffffff"><b>Gender</b></span>
<span style="color: #ffffff"><input type="radio" name="gender" value="Male">Male</span>
<span style="color: #ffffff"><input type="radio" name="gender" value="Female">Female</span>
@if($errors->has('gender'))
<span style="color: #eb1515"><b>{{$errors->first('gender')}}</b></span>
@endif
<br><br>

<span style="color: #ffffff"><b>Date of birth</b></span> <input type="date" name="dob">
@if($errors->has('dob'))
<span style="color: #eb1515"><b>{{$errors->first('dob')}}</b></span>
@endif
<br><br>



<span style="color: #ffffff"><b>Address</b></span>
<textarea id="address" name="address" rows="4" cols="20"></textarea>
@if($errors->has('address'))
<span style="color: #eb1515"><b>{{$errors->first('address')}}</b></span>
@endif
<br><br>

<span style="color: #ffffff"><b>Email</b></span> <input type="email" name="email">
@if($errors->has('email'))
<span style="color: #eb1515"><b>{{$errors->first('email')}}</b></span>
@endif
<br><br>

<span style="color: #ffffff"><b>Phone</b></span> <input type="text" name="phone">
@if($errors->has('phone'))
<span style="color: #eb1515"><b>{{$errors->first('phone')}}</b></span>
@endif
<br><br>


<span style="color: #ffffff"><b>Password</b></span> <input type="password" name="password">
@if($errors->has('password'))
<span style="color: #eb1515"><b>{{$errors->first('password')}}</b></span>
@endif
<br><br>
<span style="color: #ffffff"><b>Confirm Password</b></span> <input type="password" name="password_confirmation">
@if($errors->has('password'))
<span style="color: #eb1515"><b>{{$errors->first('password')}}</b></span>
@endif
<br><br>
<button type="submit" class="">Submit</button>

</form>
</div>
</body>



