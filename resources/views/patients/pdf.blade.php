<h1>Hospital Management System</h1>
<table>
    <tr>
        <th>First Name</th>
        <td>: {{$patient->first_name}}</td>
    </tr>
    <tr>
        <th>Last Name</th>
        <td>: {{$patient->last_name}}</td>
    </tr>
    <tr>
        <th>Doctor</th>
        <td>: Dr. {{($patient->Doctor)->first_name}} {{($patient->Doctor)->last_name}}</td>
        <th>&nbsp;&nbsp; Specialize</th>
        <td>: {{($patient->Doctor)->specialization}}</td>
        <th>&nbsp;&nbsp; Contact No</th>
        <td>: {{($patient->Doctor)->contact_number}}</td>
    </tr>
    <tr>
        <th>Admit Date</th>
        <td>: {{$patient->admit_date}}</td>
    </tr>
    <tr>
        <th>Discharge Date</th>
        <td>: {{$patient->discharge_date}}</td>
    </tr>
</table>
</body>

</html>