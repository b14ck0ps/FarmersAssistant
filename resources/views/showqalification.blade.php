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

<h1>Education Qualification show</h1>

<table border="1">
    @csrf
    <tr>
        <th>ID</th>
        <th>Institaion</th>
        <th>Graduate</th>
        <th>Added</th>
        <th>Advisor ID</th>
        <th>Action</th>
    </tr>

    @foreach ($qualifications as  $q )

    <tr>
        <td>{{$q['id']}}</td>
        <td>{{$q['institution']}}</td>
        <td>{{$q['graduate_at']}}</th>
        <td>{{$q['added_at']}}</td>
        <td>{{$q['advisor_id']}}</td>
        <td><a href={{url('edit/'. $q ->id)}}>Update</a> <a href={{url('delete/'. $q ->id)}}>Delete</a></td>
    </tr>

    @endforeach
</table>
