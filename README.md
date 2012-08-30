#Bukas Palad

##Donation and Resources Management System
**Bukas Palad** is self-hosted Donation and Resources Management System designed to help relief/donation centers handle donations given by people and managing resources used to repackage, assign and transport donation packs to areas that need them. It allows for multiple team members to use it at the same time, and helps keep everybody updates by publishing all activity to an update stream.

##Free (as in Beer) and Open-Source
As an open-source web application, relief/donation centers are able to download the application, install it locally and use it with or without the internet.

##Technology
**Bukas Palad** relies on the amazing Twitter Bootstrap (http://twitter.github.com/bootstrap) for the front-end and the awesome Laravel PHP Framework (http://laravel.com) for the backend.
PHP/MySQL powers **Bukas Palad** since it makes it even more easier to install on any computer as opposed to other technologies (e.g. a person can create a portable version of the whole application, complete with XAMPP and the **Bukas Palad** code).

#Setting up Bukas Palad
When setting up the **Bukas Palad** application, make sure to:

1. Create a VirtualHost on your web server and point it to the **public** folder.
2. Edit the **application/config/database.php** file credential to match the local MySQL database
3. Edit the **application/config/settings.php** file to edit the Relief/Donation's Center name and the Group Pin to be used
	- **pin** - the group pin to be used by everyone to log into the system
	- **group_name** - the group name to show on the home page
	- **show_group_pin** - set this to **true** to show the pin on the home page
4. Run **php artisan migrate:install** to enable migrations
5. Run **php artisan migrate** to run the migrations

#Demo
Try out **Bukas Palad** here: http://bukaspalad.appnimbus.com. The group-pin is **1111**

#Contibuting to the Bukas Palad Source
##Setting up your machine with the the Bukas Palad repository and your repository fork

1. Fork the main Bukas Palad repository (https://github.com/webpilipinas/bukaspalad)
2. Fire up your local terminal and clone the **MAIN BUKAS PALAD REPOSITORY** (git clone git://github.com/webpilipinas/bukaspalad.git)
3. Add your **FORKED BUKAS PALAD REPOSITORY** as a remote (git remote add fork git@github.com:**github_username**/bukaspalad.git)

##Making pull-requests

1. Before anything, make sure to update your local copy of the **MAIN BUKAS PALAD REPOSITORY**. (git checkout master; git pull origin master)
2. Once updated with the latest code, create a new branch with a branch name describing what your changes are (git checkout -b bugfix/login-system)
    Possible types:
    - bugfix
    - feature
    - improvement
3. After creating your code in the branch, commit the code. Always make sure to sign-off (-s) on all commits made (git commit -s -m "Commit message")
4. Once you've committed all the changes for this branch, push the branch to your **FORKED BUKAS PALAD REPOSITORY** (git push fork bugfix/login-system)
5. Go back to your **FORKED BUKAS PALAD REPOSITORY** on GitHub and submit a pull-request for that commit.
6. Once your code has been reviewed and tested, it will be merged into the main repository