# LoA Module v.1.0

# Leave of Absence (LoA) v.1.0 Module
```
phpVMS Module for pilots to submit a LoA request that is stored in a database 
and an option for staff to view all the LoA requests through the admin panel
This module is released under the Creative Commons Attribution-Noncommercial-Share Alike  3.0 Unported License
You are free to redistribute and alter this work as you wish but you must keep the original 'copyright' information 
on all the places it comes in the original work.
You are not allowed to delete the copyright information and/or gain any profit by adopting or using this module.
 
@author Sava Markovic - airserbiavirtual.com
@copyright Copyright (c) 2012, Sava Markovic
@link http://www.airserbiavirtual.com
@license http://creativecommons.org/licenses/by-nc-sa/3.0/
```


## Installation

- Download the zip package.
- Unzip the package and place the files as structured in your phpVMS installation.
- Use the loa.sql file to create the table necessary for the module to work. You can do this by using phpmyadmin.


## Update from v.0.9
Version 1.0 includes major changes and a new installation is recommended. 
- Delete all the files from admin/modules/loa, admin/templates/loa, core/modules/loa, core/templates/loa
- Drop the loa table 
- Follow the normal installation instructions. 

## Other info
To display a link to the LoA form for your pilots place this code where you want it:
``<a href="<?php echo url('/loa'); ?>">LoA Request</a>``'

##Changelog 

v1.0 presents a stable release of the module fixing many issues and changing the way things are coded to utilize better techniques. 
v.1.0 
- Added version checker - Checks current version to the current one specified on the server.
- Modified Date Choser  - The date is now selected from a dropdown menu as opposed to being typed in.
- Date Format Modified  - The displayed data formats now use the phpVMS DATE_FORMAT variable and the times are now saved as a unix timestamp as opposed to a date string.
- Direct Method Access Prohibited - Added checks to stop load loading of page if the form was not submitted.
- Moved Emailing functions to a separate method in the class
- Pilot Names in the Admin CP now pulled from the pilots table, not the LoA table. Names are no longer stored in the LoA table.

v.0.9
- Initial Version


