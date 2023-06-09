Assume we have :

# 3 Department (HR , Marketing, IT)
# 3 Manager ( manager@hr.com , manager@marketing.com , manager@it.com) => All has password 123456
# 9 Employer (emp@hr1.com , emp@hr2.com , emp@hr3.com , emp@marketing1.com , emp@marketing2.com ,  emp@marketing3.com , emp@it1.com, emp@it2.com , emp@it3.com) => all has password 123456
    # all has no image , you can edit them
# 9 Tasks
	# emp@hr1.com has 1 tasks
	# emp@hr2.com has 2 tasks
	# emp@hr2.com has 0 tasks
	# emp@marketing1.com has 0 tasks
	# emp@marketing2.com has 3 tasks
	# emp@marketing3.com has 0 tasks
	# emp@it1.com, has 1 tasks
	# emp@it1.com, has 1 tasks
	# emp@it1.com, has 1 tasks

All has Pending Status
Please run php artisan db:seed to test these data
____________________________________________________________________________________________

Please follow the following commands to start the project

- Download the Laravel folder
- composer install --ignore-platform-reqs
- CREATE DATABASE 'sayarat'
- php artisan migrate
- php artisan db:seed
- php aritsan serve

____________________________________________________________________________________________


Note : Please check the internet connection to load the needed CDNs
