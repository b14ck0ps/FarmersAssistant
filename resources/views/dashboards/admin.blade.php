<!DOCTYPE html>
<html>
<head>
<style>
.center{
        margin: auto;
        height: 300px;
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


h2 {
    text-align: center;
  }

  ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: rgb(152, 70, 70);
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #04AA6D;
}
body {
  background-color: #333396;
}

.button{
    text-align: center;
width: 1400px;
height: 500px;
padding-top: 80px;

}

</style>
</head>
<body>

    <h2 style="color:rgb(248, 248, 248)">Admin Dashboard</h2>
    <h4 style="border: 2px solid rgb(0, 187, 255)"></h4>
    <p style="color: #f1f1f1">Welcome {{ Auth::user()->getFullName() }}</p>
    <ul>
        <li><a href="#news"class="active">Taskbar</a></li>
        <li><a href="#">News</a></li>
        <li><a href="/plan_create">Plan Create</a></li>
        <li><a href="#">See All Plans</a></li>
        <li><a href="/product_create">Create Product List</a></li>
        <li><a href="#">Delete Product List</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <br><br>

    <div class="center">
    <span style="color:rgb(248, 248, 248)" style="text-align: center"><b>Profile</b></span><br>
    <span style="color:rgb(248, 248, 248)"><b>Username</b></span> <input type="text" name="username" value="{{ Auth::user()->username}}"readonly><br><br>
    <span style="color:rgb(248, 248, 248)"><b>Email</b></span> <input type="text" name="email" value="{{ Auth::user()->email}}"readonly><br><br>
    <span style="color:rgb(248, 248, 248)"><b>Dob</b></span> <input type="text" name="dob" value="{{ Auth::user()->dob}}"readonly><br><br>
    <span style="color:rgb(248, 248, 248)"><b>Gender</b></span> <input type="text" name="gender" value="{{ Auth::user()->gender}}"readonly><br><br>
    <span style="color:rgb(248, 248, 248)"><b>City</b></span> <input type="text" name="city" value="{{ Auth::user()->city}}"readonly><br><br>
    <span style="color:rgb(248, 248, 248)"><b>Zip-code</b></span> <input type="text" name="postalCode" value="{{ Auth::user()->postalCode}}"readonly><br><br>

    <button><a href="/adminupdate">update</a></button>
</div>

<div class="button">
    <button ><a href="/logout">Logout</a></button>
</div>
<button><a href="product_create">Create Product List</a></button>
</body>
</html>

