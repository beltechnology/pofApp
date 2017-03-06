<table>
 <tbody>
  <tr>
   <td>Created At</td>
   <td>Name</td>
   <td>Email</td>
  </tr>
  @foreach($users as $user)
  <tr>
   <td>{{formatDate($user['created_at'])}}</td>
   <td>{{$user['schoolName']}}</td>
   <td>{{$user['principalName']}}</td>
  </tr>
  @endforeach
 </tbody>
</table>