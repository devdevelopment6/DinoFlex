<html><body>
<div id="main_div">
<p>Thank you for contacting Dinoflex. One of our team members will asssit you shortly. </p>
    <table>
        <tbody>
            <tr>
                <td><b>Name:</b></td>
                <td><?php echo  $data["name"];  ?></td>
            </tr>
            <tr>
                <td><b>Subject:</b></td>
                <td><?php echo  $data["subject"];  ?></td>
            </tr>
            <tr>
                <td><b>Email:</b></td>
                <td><?php echo  $data["email"];  ?></td>
            </tr>
            <tr>
                <td><b>Phone:</b></td>
                <td><?php echo  $data["mobile_no"];  ?></td>
            </tr>
            <tr>
                <td><b>Message:</b></td>
                <td><?php echo  $data["message"];  ?></td>
            </tr>

        </tbody>
    </table>
	<br/><br/>
	<a href="<?php echo base_url();?>/home" title="Home"> <img width="180px" src="https://dinoflex.com/frontside/images/Dinoflex-logo.jpg" class="img-responsive logo" alt="Dinofex Logo"> </a>
</div>
</body></html>