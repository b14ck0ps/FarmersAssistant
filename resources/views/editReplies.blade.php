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
<h1>Update Replies Box</h1>
<form action="/edit2" method="Post">
    @csrf
    <input type="hidden"name="id" value="{{$data ['id']}}"> <br> <br>
    <input type="text"name="created_at" value="{{$data ['created_at']}}"> <br> <br>
    <input type="text"name="tittle"value="{{$data ['tittle']}}"> <br> <br>
    <input type="text"name="body"value="{{$data ['body']}}"> <br> <br>
    <input type="text"name="mails_id"value="{{$data ['mails_id']}}"> <br> <br>
    <input type="text"name="advisor_id"value="{{$data ['advisor_id']}}"> <br> <br>
    <button type="submit" >Uptate</button>
</form>
