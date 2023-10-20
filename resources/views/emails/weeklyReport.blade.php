Hello..
This mail contains Weekly report of your Team.
<style>
   table, th, td {
        border: 1px solid black;
   }
   table {
       width: 100%;
       border-collapse: collapse;
   }
</style>
<table >
   <thead>
   <tr>
       <th>ID</th>
       <th>Name</th>
       <th>Email</th>
       <th>Monday</th>
       <th>Tuesday</th>
       <th>Wednesday</th>
       <th>Thursday</th>
       <th>Friday</th>
   </tr>
   </thead>
   <tbody>
    

   <tr>
      
       <td>{{$task['e_id']}}</td>
       <td>{{$task['e_name']}}</td>
       <td>{{$task['e_email']}}</td>
       <td>{{$task['t_mon']}}</td>
       <td>{{$task['t_tue']}}</td>
       <td>{{$task['t_wed']}}</td>
       <td>{{$task['t_thu']}}</td>
       <td>{{$task['t_fri']}}</td>
   </tr>  

   </tbody>
</table>