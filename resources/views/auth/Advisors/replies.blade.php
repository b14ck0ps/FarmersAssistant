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
<h1 style="color: white">Replies</h1>
<form action="/reply" method="post">
@csrf
{{ csrf_field()}}

<span><b>created_at</b></span> <input type="date" name="created_at">
@if($errors->has('created_at'))
<b>{{$errors->first('created_at')}}</b>
@endif
<br><br>

<span><b>tittle</b></span> <input type="text" name="tittle"><br>
@if($errors->has('tittle'))
<b>{{$errors->first('tittle')}}</b>
@endif
<br><br>


<span><b>body</b></span> <input type="text" name="body">
@if($errors->has('body'))
<b>{{$errors->first('body')}}</b>
@endif
<br><br>

<span><b>Mails_ID</b></span> <input type="int" name="mails_id">
@if($errors->has('mails_id'))
<b>{{$errors->first('mails_id')}}</b>
@endif
<br><br>

<span><b>Advisor_ID</b></span> <input type="int" name="advisor_id">
@if($errors->has('advisor_id'))
<b>{{$errors->first('advisor_id')}}</b>
@endif
<br><br>


<button type="submit" class="">Submit</button>
<button type="submit" class=""><a href="/show'">Back to dashboard</a></button>
</form>
</div>
</body>
