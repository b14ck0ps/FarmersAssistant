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
<h1 style="color: #fdffff">Update</h1>
<form action="/startupdate" method="post">
@csrf
    <span style="color:rgb(248, 248, 248)" style="text-align: center"><b>Profile</b></span><br>
    <span style="color:rgb(248, 248, 248)"><b></b></span> <input type="hidden" name="id" value="{{ Auth::user()->id}}"><br><br>
    <span style="color:rgb(248, 248, 248)"><b>firstName</b></span> <input type="text" name="fname" value="{{ Auth::user()->firstName}}"><br><br>
    <span style="color:rgb(248, 248, 248)"><b>lastName</b></span> <input type="text" name="lname" value="{{ Auth::user()->lastName}}"><br><br>
    <span style="color:rgb(248, 248, 248)"><b>UserName</b></span> <input type="text" name="username" value="{{ Auth::user()->username}}"><br><br>
    <span style="color:rgb(248, 248, 248)"><b>Email</b></span> <input type="text" name="email" value="{{ Auth::user()->email}}"readonly><br><br>
    <span style="color:rgb(248, 248, 248)"><b>Password</b></span> <input type="text" name="password" value="{{ Auth::user()->password}}"><br><br>
    <span style="color:rgb(248, 248, 248)"><b>Dob</b></span> <input type="text" name="dob" value="{{ Auth::user()->dob}}"><br><br>
    <span style="color:rgb(248, 248, 248)"><b>Gender</b></span> <input type="text" name="gender" value="{{ Auth::user()->gender}}"><br><br>
    <span style="color:rgb(248, 248, 248)"><b>City</b></span> <input type="text" name="city" value="{{ Auth::user()->city}}"><br><br>
    <span style="color:rgb(248, 248, 248)"><b>PostalCode</b></span> <input type="text" name="postalcode" value="{{ Auth::user()->postalcode}}"><br><br>
    <span style="color:rgb(248, 248, 248)"><b>Address</b></span> <input type="text" name="address" value="{{ Auth::user()->address}}"><br><br>
    <span style="color:rgb(248, 248, 248)"><b>Phone</b></span> <input type="text" name="phone" value="{{ Auth::user()->phone}}"><br><br>
    <button type="submit" style="color: #032160">Submit</a></button>
    <button><a href="//show">Back to Dashboard</a></button>
</div>
</body>
</html>

