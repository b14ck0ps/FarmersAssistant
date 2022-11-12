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

<h1>Replies Box</h1>

<table border="1">
    @csrf
    <tr>
        <th>ID</th>
        <th>created_at</th>
        <th>tittle</th>
        <th>body</th>
        <th>mails_id</th>
        <th>advisor_id</th>
        <th>Action</th>
    </tr>

    @foreach ($replie as  $q )

    <tr>
        <td>{{$q['id']}}</td>
        <td>{{$q['created_at']}}</td>
        <td>{{$q['tittle']}}</th>
        <td>{{$q['body']}}</td>
        <td>{{$q['mails_id']}}</td>
        <td>{{$q['advisor_id']}}</td>
        <td><a href={{url('edit2/'. $q ->id)}}>Update</a> <a href={{url('delete/'. $q ->id)}}>Delete</a></td>
    </tr>

    @endforeach
</table>
