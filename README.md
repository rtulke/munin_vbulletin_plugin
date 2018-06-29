# munin_vbulletin_plugin
generate a munin graph from vbulletin forum (total users online, guests, registered online users)


Requirements
------------

* vbulletin, munin


Installation
------------

~~~~
aptitude install munin
~~~~

~~~~
git clone https://github.com/rtulke/munin_vbulletin_plugin.git
~~~~

~~~~
cd munin_vbulletin_plugin/
mv vbuseronline-plugin /usr/share/munin/plugins/vbuseronline
chmod 755 /usr/share/munin/plugins/vbuseronline
ln -s /usr/share/munin/plugins/vbuseronline /etc/munin/plugins/vbuseronline
~~~~


copy the **online1.php** script to your vbulletin website root directory (example: /var/www/mydomain.com/forum/)**

~~~~
cd munin_vbulletin_plugin/
cp online1.php /var/www/mydomain.com/forum/
~~~~

open the munin vbuseronline plugin

~~~~
vim /usr/share/munin/plugins/vbuseronline 
~~~~

and change URLs to your domain... down at the end... like this:

~~~~
guests_online=$(lynx -source http://your-vb-forum.com/online1.php | awk -F ';' '{printf "%1.0f", $1}')
registered_online=$(lynx -source http://your-vb-forum.com/online1.php | awk -F ';' '{printf "%1.0f", $2}')
online_total=$(lynx -source http://your-vb-forum.com/online1.php | awk -F ';' '{printf "%1.0f", $3}')
~~~~

restart munin service

~~~~
/etc/init.d/munin restart
~~~~

The online1.php must be accessible by a web browser, the vbuseronline Script will be connect to this!
