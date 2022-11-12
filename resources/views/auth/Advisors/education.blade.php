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
<h1 style="color: white">Education_Qualification</h1>
<form action="Insertedu" method="post">
@csrf
{{ csrf_field()}}

<span><b>institution</b></span> <input type="text" name="institution"><br>
@if($errors->has('institution'))
<b>{{$errors->first('institution')}}</b>
@endif
<br><br>

<span><b>added_at</b></span> <input type="date" name="added_at">
@if($errors->has('added_at'))
<b>{{$errors->first('added_at')}}</b>
@endif
<br><br>

<span><b>Graduate</b></span>
<textarea id="graduate_at" name="graduate_at" rows="4" cols="20"></textarea>
@if($errors->has('graduate_at'))
<b>{{$errors->first('graduate_at')}}</b>
@endif
<br><br>

<span><b>advisor_id</b></span> <input type="text" name="advisor_id">
@if($errors->has('advisor_id'))
<b>{{$errors->first('advisor_id')}}</b>
@endif
<br><br>


<button type="submit" class="">Submit</button>
<button type="submit" class=""><a href="/show'">Back to dashboard</a></button>
</form>
</div>
</body>
