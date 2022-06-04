<h3>Pre-installation requirement: </h3>

<ul>
	<li><h5>Operating System:</h5></li>
		-Amazon Linux AMI
	<li><h5>SSH:</h5></li>
		-Putty
	<li><h5>Webserver:</h5></li>
		-Apache 2.4.53
	<li><h5>Database:</h5></li>
		-MariaDB Server 10.2.38
		Extension:
			-PDO
		Database name:
			-criticDB
		Table name:
			-ratings
	<li><h5>Language:</h5></li>
		-PHP 7.2.24
	<li><h5>Server Components and Files:</h5></li>
		<ul>
		<li>Amazon EC2</li>
		<li>Github</li>
			<ul>Website Files:<ul>
				<li>config.php
				<li>connectDB.php
				<li>index.php
				<li>inserForm.php
				<li>queryInsert.php
				<li>queryCreatingRating.php
				<li>queryGet.php
				<li>queryGetAll.php
				<li>queryGetProf.php
				<li>queryGetAllProf.php
				<li>queryGetAdmin.php
				<li>queryGetAllAdmin.php
				<li>updateForm.php
				<li>queryUpdate.php
				<li>index.css
				<li>nomatch.js
				</ul>
			</ul>
		</ul>
	</ul>
	<h3>Installation and Configuration Procedure</h3>
		<ol>
		<li><h5>Create EC2 Instance</h5>
			<ol type="a">
			<li><h6>Create EC2 instance with the following setting:</h6>
				<ul>
				<li>Amazon Machine Image: Amazon Linux 2
				<li>Instance type: t2.micro
				<li>Key pair: Create new key pair by:
					<ul style="list-style-type:square"> 
					<li>Selecting "Create new key pair"
					<li>Enter keyp air name
					<li>Select Key pair type: RSA
					<li>Select Private key file format: .ppk (For use with Putty)
					<li>Select "Create key pair"
					<li>Key will be download to localhost
					</ul> 
				<li>Network settings <br>
					Select existing security group: launch-wizard-2 <br>
					<ul>
						<li>Which have the following rules:
							<ul>
							<li>Inbound rules:<br>
							- Allow inbound HTTP and HTTPS connection from any sources<br>
							- Allow SSH connection from any sources
							<li>Outbound rules:<br>
							- Allow all outbound connection
							</ul>
					</ul>		
					<li>Storage:
						<ul>
						Default: 1 volume - 8 GiB - General purpose SSD (gp2)
						</ul>
					<li>Select "Launch Instance"
					<li>Wait for instance to be created 
					<li>Select "View all instances"
				</ul>	
			</ol>		
		<li><h5>SSH into EC2 instance</h5>
			<ol type="a">
			<li><h6>Open and config Putty session</h6>
				<ul>	
				<li>Go to Connection > SSH > Auth
					<ul style="list-style-type:square">
					<li>Under 'Authentication parameters'
					<li>Browse for EC2 instance's ppk file
					</ul>
				<li>Go to Session
					<ul style="list-style-type:square"> 
					<li>Enter EC2 instances's "Public IPv4 address"
					<li>Under "Saved Sessions", enter Session name and Save
					</ul>
				</ul>	
				 <li><h6>Open SSH connection to EC2 instance</h6>
					 <ul>
					Enter after "log in as:" with "ec2-user"
					</ul>
			</ol>		
		<li><h5>Installing Web Server</h5>
			<ol type="a">
			<li><h6>Update packages with</h6>
				<em>$ sudo yum update -y</em>
			<li><h6>Install Apache web server, MySQL, and PHP software packages</h6>
				 <em>$ sudo yum install -y httpd php mariadb-server php-mysqlnd</em>
			<li><h6>Start the Apache web server with the command:</h6>
				 <ul><em>$ sudo service httpd start</em></ul>
				To config the Apache web server to start on boot
				<ul><em>$ sudo chkconfig httpd on</em></ul>
			<li><h6> Set permission to Apache's document root</h6>
				<ul>
				<li> First add the current user (ec2-user) to the apache group 
				<ul><em>$ sudo usermod -a -G apache ec2-user</em></ul>
				<li> Log out and Log back in for this change to take affect 
				<ul><em>$ exit</em></ul>
				<li> To verify membership in apache group: 
				<ul><em>$groups</em></ul>
				<li> To allow any members of the <b>apache</b> group, current or future, to add, delete and edit files in the Apache document roots: 
				<ul><em>$ sudo chown -R ec2-user:apache /var/www</em></ul>
				<ul><em>$ sudo chmod 2775 /var/www</em></ul>
				<ul><em>$ find /var/www -type d -exec sudo chmod 2775 {} \;</em></ul>
				<ul><em>$ find /var/www -type f -exec sudo chmod 0664 {} \;</em></ul>
				</ul>
			</ol>	
		<li><h5>Secure database server</h5>
			<ol type="a">
			<li><h6> Start MariaDB Server with</h6>
				<em>$ sudo mysql</em>
			<li><h6> Run mysql_secure_installation</h6>
				<em>$ sudo mysql_secure_installation</em>
				<ol type="i">
				<li> Enter current root password. There's no password by default, hit Enter
				<li> Type Y to set a secure root password
				<li> Type Y to remove anonymous user accounts
				<li> Type Y to diable remote root login
				<li> Type Y to remove the test database
				<li> Type Y to reload privilege tables and save your changes
				</ol>
			<li><h6> To start MariaDB server on every boot</h6>
				<ul><em>$ sudo systemctl enable mariadb</em></ul>
			</ol>	
		<li><h5>Create User and Database for website</h5>
			<ol type="a">
			<li><h6> Start MariaDB server</h6> 
				<em> $ sudo mysql -u root -p </em>
				<ul> Enter password </ul>
			<li><h6> Create Database </h6>
				<em>MariaDB > CREATE DATABASE 'criticDB'; </em>
			<li><h6> Create new Database user</h6>
				<em>MariaDB > CREATE USER 'chibinh_admin'@localhost IDENTIFIED BY 'QueAnh@514e'; </em>
			<li><h6> Grant privileges to User</h6>
				<em> MariaDB > GRANT ALL PRIVILEGES ON 'criticDB' TO 'chibinh_admin'@localhost IDENTIFIED BY 'QueAnh@514e'; </em>
			<li><h6> Exit</h6>
			</ol> 
		<li><h5>Intall phpMyAdmin</h5>
			<ol type="a">
			<li><h6> Install required dependancies</h6>
				<em>$ sudo yum install php-mbstring -y</em>
			<li><h6> Restart Apache</h6>
				<em>$ sudo service httpd restart</em>
			<li><h6> Navigate to the Apache document root</h6>
				<em>$ cd /var/www/html</em>
			<li><h6> Download latest version of phpMyAdmin</h6>
				<em>$ wget https://www.phpmyadmin.net/downloads/phpMyAdmin-latest-all-languages.tar.gz</em>
			<li><h6> Create a phpMyAdmin folder to extract content of tarball into</h6>
				<em>$  mkdir phpMyAdmin && tar -xvzf phpMyAdmin-latest-all-languages.tar.gz -C phpMyAdmin --strip-components 1</em>
			<li><h6> Delete tarball</h6>
				<em>$ rm phpMyAdmin-latest-all-languages.tar.gz</em>
			</ol>	
		<li><h5>Clone website files to Document Root</h5>
			<ol type="a">
			<li><h6> Go to document root directory</h6>
				<em>$ cd /var/www/html</em>
			<li><h6> Generate SSH key</h6>
				<em>$ sudo ssh-keygen -t rsa -b 4096 -C chibinh514e@hotmail.com</em>
			<li><h6> Enter the directory to save the keys</h6>
				<em>/home/ec2-user/.ssh/id_rsa</em>
			<li><h6> Enter passphrase and re-confirm</h6>
				<em>P@ssw0rd</em>
			<li><h6> Change permission of .ssh folder to only allow only user to read and write</h6>
				<em>$ chmod 600 /home/user/.ssh/id_rsa</em>
			<li><h6> Use ssh agent to save private passphrase/password credentials</h6>
				<em>$ eval "ssh-agent -s"</em><br>
				<em>$ ssh-add -k /home/user/.ssh/id_rsa</em>
			<li><h6> Copy public key to clipboard</h6>
				<em>$ pbcopy  /home/user/.ssh/id_rsa.pub</em>	
				or make it appear on screen to copy paste 
				<em>$ cat /home/user/.ssh/id_rsa.pub</em>
			<li><h6> Paste this key on to Github account's SSH keys</h6>
					![[gitSshKey 1.png]]
			<li><h6> Add a remote repository</h6>
				<em>$ git remote add origin https://github.com/Gitwill1972/HowYourProf.git</em>
			<li><h6> Change URL to SSH</h6>
				<em>$ git remote set-url git@github.com:Gitwill1972/HowYourProf.git</em>
			<li><h6> Clone repository</h6>
				<em>$ git clone git@github.com:Gitwill1972/HowYourProf.git</em>
			<li><h6> Move all files from cloned directory to /var/www/html</h6>
				<em>$ cp -a ./HowYourProf/. .</em>
			</ol>	 
		</ol>		 
			<h2>Installation completed</h2>
			
		