PERSONAL REMINDER

Copyright Balázs Panghy (panghyba@gmail.com)
Last modified: 2013-04-29

========================================================================================================
 Requirements
========================================================================================================

- MySQL support on your server/localhost
- PHP (4.1.0 or higher) support on your server/localhost

========================================================================================================
 Installation & Configuration
========================================================================================================

- Copy all files to your webserver (into your public_html directory)
  Your upload folder must be writable! (chmod 777)
- Create your MySQL database/tables (More information in the db_create.txt file)
- All settings (colors, dimensions etc.) can be found in the function/config.php and
  style/main.less files. You can change whatever you want.
  (Default settings are optimized for 1920x1080 resolution)

========================================================================================================
 Modules
========================================================================================================

- Notes
  Allows you to add simple notes with priority to the database. They're listed in descending order by
  priority.

- Dates
  Allows you to add occasions with dates to the database. They're listed in ascending order by date.

- Uploader
  Allows you to upload files to your server. (Directory: www.yoursite.com/upload)
  The upload folder must be writable! (chmod 777)
  Filesize is maximized (2 MB default) on the servers!

========================================================================================================
 Credits & Acknowledgments
========================================================================================================

- Using the LESS dynamic stylesheet language to extend CSS with variables.
  All credit goes for Alexis Sellier & The Core Less Team (http://lesscss.org/)


© 2013 Balázs Panghy <panghyba@gmail.com> All rights reserved!