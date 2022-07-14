# sengrid-mailer

<h2> Installation <h2>
<p>
  <code>composer require murattcann/sendgrid-mailer</code>
</p>
<hr>
<p>After run below command, run this: 
  <code>php artisan vendor:publish</code>
  <br>
  and type the <b>sendgridmailer-config</b> index number, click enter.
  <br>
  After publish process edit <i>config\sendgrid_credentials.php</i> file like: <br>
  <code>
    return [
        "token" => "your token by sendgrid",
        "from_email" => "from email address",
        "from_name"  => "from name for emails",
        "default_subject" => "Default Email Subject",
    ];
  </code>
</p>
<hr>
<h2>Usage Of This Package</h2>
<p>
    SendgridSender::getInstance()->to("email address to send")->subject("your email sıbject")->send("your email content or html data")
</p>
