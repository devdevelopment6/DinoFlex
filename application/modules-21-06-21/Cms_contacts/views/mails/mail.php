

<div id="main_div">
    <table style="margin:0 auto;width:70%;">
        <thead>
            <th style="width:35%;text-align: left;">Field</th>
            <th style="width:65%;text-align: left;">Value</th>
        </thead>
        <tbody>
            <tr>
                <td>Name</td>
                <td><?php echo  $data["name"];  ?></td>
            </tr>
            <tr>
                <td>Subject</td>
                <td><?php echo  $data["subject"];  ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo  $data["email"];  ?></td>
            </tr>
            <tr>
                <td>Mobile No.</td>
                <td><?php echo  $data["mobile_no"];  ?></td>
            </tr>
            <tr>
                <td>Message</td>
                <td><?php echo  $data["message"];  ?></td>
            </tr>
            <tr>
                <td>Date</td>
                <td><?php echo  $data["created_date"];  ?></td>
            </tr>

        </tbody>
    </table>
</div>
