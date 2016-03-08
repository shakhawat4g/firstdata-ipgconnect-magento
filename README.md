# First Data EMEA IPG Connect - Magento Extension


This First Data Europe Middle East Africa (EMEA) Internet Payment Gateway (IPG) Magento extension enables card payments in your Magento powered webshop by redirecting cardholders to First Data secured servers to enter their Credit/Debit card details.

Installation Instructions:

1. Download the zipped file to your machine.
2. Connect to your website directory through FTP/SSH (or however you access your website's files).
3. Navigate to the world-viewable directory where you uploaded all the Magento files. Among these files you should see a "app" directory, you do not have to enter into that directory, 
just copy this downloaded module (which also have /app as root directory) over the Magento /app.
copying over this will not overwrite any existing files in Magento core /app.

4. Login to admin panel of your Magento. 
		>> Go to -> System-> Configuration -> Sales -> Payment Methods
			>> Select 'Yes' under First Data IPG Connect 
				>> Select 'Yes' under "Test Environment" for testing the module or 
					>> Select 'No'  under "Test Environment" if you want to go Live.
		>> Populate your Store ID (if you don't have this, contact fdmsipgconnect@firstdata.com)
		>> Populate your Shared Secret (if you don't have this, contact fdmsipgconnect@firstdata.com)
		>> Click Save Config button


5. All the best with your online business.

Reference:

https://www.firstdatams.co.uk/fdms/en_gb/home/ecommerce/developers.html

Credits:

Developed by Bright Ocansey based on Magento Payment Gateway module specifications.
